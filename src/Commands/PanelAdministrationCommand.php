<?php

namespace Paneladministration\PanelAdministration\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;
use Paneladministration\PanelAdministration\PanelAdministrationServiceProvider;
use Paneladministration\PanelAdministration\Seed;
use Symfony\Component\Console\Input\InputOption;

class PanelAdministrationCommand extends Command
{
    /**
     * The name and signature of the console command.

     *

     * @var string
     */
    protected $signature = 'panel:install';

    /**
     * The console command description.

     *

     * @var string
     */
    protected $description = 'Installer les ressources panel';
    /**
     * Create a new command instance.

     *

     * @return void
     */

    /**
     * Execute the console command.

     *

     * @return void
     */
    protected $composer;

    /**
     * Seed Folder name.
     *
     * @var string
     */
    protected $seedFolder;

    public function __construct(Composer $composer)
    {
        parent::__construct();

        $this->composer = $composer;
        $this->composer->setWorkingPath(base_path());
        $this->seedFolder = Seed::getFolderName();
    }

    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Force the operation to run when in production', null],
        ];
    }

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd().'/composer.phar')) {
            return '"'.PHP_BINARY.'" '.getcwd().'/composer.phar';
        }

        return 'composer';
    }

    public function fire(Filesystem $filesystem)
    {
        return $this->handle($filesystem);
    }

    /**
     * Execute the console command.
     *
     *
     * @return void
     */
    public function handle(Filesystem $filesystem)
    {
        $this->info('Publishing the Panel assets, database, and config files');

        // Publish only relevant resources on install
        $tags = ['seeds'];

        $this->call('vendor:publish', ['--provider' => PanelAdministrationServiceProvider::class, '--tag' => $tags]);

        $this->info('Migrating the database tables into your application');
        $this->call('migrate', ['--force' => $this->option('force')]);

        $this->info('Adding Panel routes to routes/web.php');
        $routes_contents = $filesystem->get(base_path('routes/web.php'));
        if (strpos($routes_contents, 'PanelAdministration::routes()') === false) {
            $filesystem->append(
                base_path('routes/web.php'),
                PHP_EOL.PHP_EOL."Route::group(['prefix' => 'admin'], function () {".PHP_EOL.'    PanelAdministration::routes();'.PHP_EOL.'});'.PHP_EOL
            );
        }

        $publishablePath = dirname(__DIR__).'/../publishable';

        $this->call('vendor:publish', ['--provider' => PanelAdministrationServiceProvider::class, '--tag' => ['config', 'PanelAdministration_avatar']]);

        $this->addNamespaceIfNeeded(
            collect($filesystem->files("{$publishablePath}/database/seeds/")),
            $filesystem
        );

        $this->info('Dumping the autoloaded files and reloading all new files');
        $this->composer->dumpAutoloads();
        require_once base_path('vendor/autoload.php');

        $this->info('Seeding data into the database');
        $this->call('db:seed', ['--class' => 'PanelAdministrationDatabaseSeeder']);

        $this->info('Adding the storage symlink to your public folder');
        $this->call('storage:link');

        $this->info('Successfully installed Panel Administration! Enjoy');
    }

    private function addNamespaceIfNeeded($seeds, Filesystem $filesystem)
    {
        if ($this->seedFolder != 'seeders') {
            return;
        }

        $seeds->each(function ($file) use ($filesystem) {
            $path = database_path('seeders').'/'.$file->getFilename();
            $stub = str_replace(
                ["<?php\n\nuse", '<?php'.PHP_EOL.PHP_EOL.'use'],
                '<?php'.PHP_EOL.PHP_EOL.'namespace Database\\Seeders;'.PHP_EOL.PHP_EOL.'use',
                $filesystem->get($path)
            );

            $filesystem->put($path, $stub);
        });
    }

    /**
     * Register the Horizon service provider in the application configuration file.
     *
     * @return void
     */
}
