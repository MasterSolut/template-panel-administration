@extends('PanelAdministration::layouts.app')

@push('page-css')
<!-- Select2 css-->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Utilisateur</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
		<li class="breadcrumb-item active">Utilisateurs</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#add_user" data-toggle="modal" class="btn btn-primary float-right mt-2">Ajouter un utilisateur</a>
</div>

@endpush

@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class=" table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr style="boder:1px solid black;">
								<th>Nom</th>
								<th>Email</th>
								<th>Role</th>
								<th>Date de création</th>
								<th class="text-center action-btn">Actions</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>
									<h2 class="table-avatar">
										
										
										
										
									</h2>
								</td>
								<td>
									
								</td>
							
								<td>
									
								</td>
								
								<td></td>

								<td class="text-center">
									<div class="actions">
										<a data-id="" data-name="" data-email="" class="btn btn-warning btn-sm" id="edit-user" data-toggle="modal" href="javascript:void(0)">
											<i class="fe fe-pencil"></i> Modifier
										</a>
										<a data-id="" href="javascript:void(0);" class="btn btn-danger btn-smt" data-toggle="modal">
											<i class="fe fe-trash"></i> Supprimer
										</a>
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

<!-- Add Modal -->
<div class="modal fade" id="add_user" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ajouter un utilisateur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="">
					@csrf
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>Nom complet</label>
								<input type="text" name="name" class="form-control" placeholder="John Doe">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Role</label>
								<div class="form-group">
									<select class="select2 form-select form-control" name="role">
										
											<option value=""></option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="avatar">
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Mot de passe</label>
										<input type="password" name="password" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Confirmer le mot de passe</label>
										<input type="password" name="password_confirmation" class="form-control">
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sauvegarder</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_user" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modifier utilisateur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" action="">
					@csrf
					@method("PUT")
					<div class="row form-row">
						<input type="hidden" name="id" id="edit_id">
						<div class="col-12">
							<div class="form-group">
								<label>Nom complet</label>
								<input type="text" name="name" class="form-control edit_name" placeholder="John Doe">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control edit_email" id="email">
							</div>
						</div>
						@can('update-role')
						<div class="col-12">
							<div class="form-group">
								<label>Role</label>
								<div class="form-group">
									<select class="select2 form-select form-control edit_role" name="role">
										
											<option value=""></option>
										
									</select>
								</div>
							</div>
						</div>
						@endcan
						<div class="col-12">
							<div class="form-group">
								<label for="avatar">Image utilisateur</label>
								<input type="file" name="avatar" id="avatar">
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Mot de passe</label>
										<input type="password" name="password" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Confirmer le mot de passe</label>
										<input type="password" name="password_confirmation" class="form-control">
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sauvegarder</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->

<!-- /Delete Modal -->
@endsection


@push('page-js')
<!-- Select2 js-->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

	<script>
		$(document).ready(function() {
			$('#datatable-export').on('click','.editbtn',function (){
				event.preventDefault();
				jQuery.noConflict();
				$('#edit_user').modal('show');
				var id = $(this).data('id');
				var name = $(this).data('name');
				var email = $(this).data('email');
				var role = $(this).data('role');
				$('#edit_id').val(id);
				$('.edit_name').val(name);
				$('.edit_email').val(email);
				$('.edit_role').val(role);
			});
			//


		});
	</script>
@endpush
