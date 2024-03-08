@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title" style="margin-left: 15px">Rapports</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
		<li class="breadcrumb-item active">Rapports</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#generate_report" data-toggle="modal" class="btn btn-primary float-right mt-2">Generer des rapports</a>
</div>
@endpush


@section('content')
	
<div>
	
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
					<h6 class="text-muted">Total Cash</h6>
					<div class="progress progress-sm">
						<div class="progress-bar bg-primary w-50"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	
			
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="datatable-export" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Numéro matricule</th>
									<th>Nom de l'agent</th>
									<th>Montants collectés</th>
									<th>Date</th>
									<th class="action-btn">Action</th>
								</tr>
							</thead>
							<tbody>

								
										<tr>
											<td>
												<h2 class="table-avatar">
													
												</h2>
											</td>
											<td></td>
											<td></td>
											<td></td>
											<td>
												<div class="actions">
													<a class="btn btn-warning btn-sm" href="">
														Editer
													</a>
													<a data-id="" href="javascript:void(0);" class="btn btn-danger btn-sm" data-toggle="modal">
														 Supprimer
													</a>
												</div>
											</td>
										</tr>
									
							</tbody>
						</table>
					</div>
				</div>
			</div>
		

<!-- Generate Modal -->
<div class="modal fade" id="generate_report" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Generer un Rapport</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="">
					@csrf
					<div class="row form-row">
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>De</label>
										<input type="date" name="from_date" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>A</label>
										<input type="date" name="to_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Resource</label>
								<select class="form-control select" name="resource"> 
									<option value="products">Nom</option>
									<option value="purchases">Montants</option>
									<option value="sales">Date</option>
								</select>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sauvegarder</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Generate Modal -->
@endsection


@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush



