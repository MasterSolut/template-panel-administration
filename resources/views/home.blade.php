@extends('PanelAdministration::layouts.app')
@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Bienvenu {{ Auth::user()->name }} </h1>
    </div>
	
	<div class="row">
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-primary border-primary">
							<i class="fe fe-money"></i>
						</span>
						<div class="dash-count">
							<h3></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						<h6 class="text-muted">Revenu journalier</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-primary w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-success">
							<i class="fe fe-credit-card"></i>
						</span>
						<div class="dash-count">
							<h3></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Nombre de clients</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-success w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-danger border-danger">
							<i class="fe fe-folder"></i>
						</span>
						<div class="dash-count">
							<h3></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Nouveaux adhérants</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-danger w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-warning border-warning">
							<i class="fe fe-users"></i>
						</span>
						<div class="dash-count">
							<h3></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Utilisateurs</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-warning w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		
			<div class="card card-table">
				<div class="card-header">
					<h4 class="card-title ">Collecte du jour</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nom de l'agent</th>
                                    <th>Matricule</th>
									<th>Somme collecté</th>
									<th>Client</th>
                                    <th>Date</th>
                                    <th class="text-end">Actions</th>
								</tr>
							</thead>
							<tbody>
								
                                    <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                 <td>
                                  <div class="d-flex gap-2 w-100 justify" >
                                     <a href="" class="btn btn-warning btn-sm">Editer</a>
                                     <form action="" method="post">
                                      @csrf
                                 @method("delete")
                                             <button class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                  </div>
                                  </td>
                             </tr>
                           								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>

		
		
	</div>
	<div class="row">
		<div class="col-md-12">
		
			<!-- Latest Customers -->
			
			<!-- /Latest Customers -->
			
		</div>
	</div>
@endsection
