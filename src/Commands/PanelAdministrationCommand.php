<?php

namespace Paneladministration\PanelAdministration\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;
use Paneladministration\PanelAdministration\PanelAdministrationDummyServiceProvider;
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
            ['with-dummy', null, InputOption::VALUE_NONE, 'Install with dummy data', null],
        ];
    }

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return '"' . PHP_BINARY . '" ' . getcwd() . '/composer.phar';
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
     * @param \Illuminate\Filesystem\Filesystem $filesystem
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


        $this->info('Attempting to set Voyager User model as parent to App\User');
        if (file_exists(app_path('User.php')) || file_exists(app_path('Models/User.php'))) {
            $userPath = file_exists(app_path('User.php')) ? app_path('User.php') : app_path('Models/User.php');

            $str = file_get_contents($userPath);

            if ($str !== false) {
                $str = str_replace('extends Authenticatable', "extends \PanelAdministration\PanelAdministration\Models\User", $str);

                file_put_contents($userPath, $str);
            }
        } else {
            $this->warn('Unable to locate "User.php" in app or app/Models.  Did you move this file?');
            $this->warn('You will need to update this manually.  Change "extends Authenticatable" to "extends \PanelAdministration\PanelAdministration\Models\User" in your User model');
        }

        $this->info('Adding Panel routes to routes/web.php');
        $routes_contents = $filesystem->get(base_path('routes/web.php'));
        if (false === strpos($routes_contents, 'PanelAdministration::routes()')) {
            $filesystem->append(
                base_path('routes/web.php'),
                PHP_EOL . PHP_EOL . "Route::group(['prefix' => 'admin'], function () {" . PHP_EOL . "    PanelAdministration::routes();" . PHP_EOL . "});" . PHP_EOL
            );
        }

        $publishablePath = dirname(__DIR__) . '/../publishable';

        if ($this->option('with-dummy')) {
            $this->info('Publishing dummy content');
            $tags = ['dummy_seeds', 'dummy_content', 'dummy_config', 'dummy_migrations'];
            $this->call('vendor:publish', ['--provider' => PanelAdministrationDummyServiceProvider::class, '--tag' => $tags]);

            $this->addNamespaceIfNeeded(
                collect($filesystem->files("{$publishablePath}/database/dummy_seeds/")),
                $filesystem
            );
        } else {
            $this->call('vendor:publish', ['--provider' => PanelAdministrationServiceProvider::class, '--tag' => ['config', 'PanelAdministration_avatar']]);
        }

        $this->addNamespaceIfNeeded(
            collect($filesystem->files("{$publishablePath}/database/seeds/")),
            $filesystem
        );

        $this->info('Dumping the autoloaded files and reloading all new files');
        $this->composer->dumpAutoloads();
        require_once base_path('vendor/autoload.php');

        $this->info('Seeding data into the database');
        $this->call('db:seed', ['--class' => 'VoyagerDatabaseSeeder', '--force' => $this->option('force')]);

        if ($this->option('with-dummy')) {
            $this->info('Migrating dummy tables');
            $this->call('migrate');

            $this->info('Seeding dummy data');
            $this->call('db:seed', ['--class' => 'PanelAdministrationDummyDatabaseSeeder', '--force' => $this->option('force')]);
        }

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
            $path = database_path('seeders') . '/' . $file->getFilename();
            $stub = str_replace(
                ["<?php\n\nuse", "<?php" . PHP_EOL . PHP_EOL . "use"],
                "<?php" . PHP_EOL . PHP_EOL . "namespace Database\\Seeders;" . PHP_EOL . PHP_EOL . "use",
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
