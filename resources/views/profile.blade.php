@extends('PanelAdministration::layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col">
	<h3 class="page-title" style="margin-left: 15px">Profil</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
		<li class="breadcrumb-item active">Profil</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="profile-header">
			<div class="row align-items-center">
				<div class="col-auto profile-image">
					<a href="#">
						<img class="rounded-circle" alt="User Image" src="">
					</a>
				</div>
				<div class="col ml-md-n2 profile-user-info">
					<h4 class="user-name mb-0"></h4>
					<h6 class="text-muted" ></h6>
					<div style="margin-left: 15px">TimeZone <h5>{{date_default_timezone_get()}}</h5>
                    Date et Heure: <h5>{{date('d M,Y h:i:s a', time())}}</h5></div>
				</div>

			</div>
		</div>
		<div class="profile-menu">
			<ul class="nav nav-tabs nav-tabs-solid">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#per_details_tab">A propos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#password_tab">Mot de passe</a>
				</li>
			</ul>
		</div>
		<div class="tab-content profile-tab-cont">

			<!-- Personal Details Tab -->
			<div class="tab-pane fade show active" id="per_details_tab">

				<!-- Personal Details -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title d-flex justify-content-between">
									<span>Détails personnels </span>
									<a class="edit-link" data-toggle="modal" href="#edit_personal_details" style="margin-left: 15px"><i class="fa fa-edit mr-1"></i>Modifier</a>
								</h5>
								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Nom: </p>
									<p class="col-sm-10">{{ Auth::user()->name }} </p>
								</div>

								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3" >Email: </p>
									<p class="col-sm-10"> {{ Auth::user()->email }}</p>
								</div>

								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mv-0 mb-sm-3">Role Utilisateur</p>
									<p class="col-sm-10"></p>
								</div>

							</div>
						</div>

						<!-- Edit Details Modal -->
						<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Détails personnels </h5>
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
														<input class="form-control" name="name" type="text" value="" placeholder="Full Name">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<label>email</label>
														<input class="form-control" name="email" type="text" value="" placeholder="Email">
													</div>
												</div>
												
												<div class="col-12">
													<div class="form-group">
														<label>Role</label>
														<select class="form-control select edit_role" name="role">
															
																<option value=""></option>
															
														</select>
													</div>
												</div>
												
												<div class="col-12">
													<div class="form-group">
														<label>Image utilisateur</label>
														<input type="file" value="" class="form-control" name="avatar">
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

					</div>


				</div>
				<!-- /Personal Details -->

			</div>
			<!-- /Personal Details Tab -->

			<!-- Change Password Tab -->
			<div id="password_tab" class="tab-pane fade">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Modifier le mot de passe</h5>
						<div class="row">
							<div class="col-md-10 col-lg-6">
								<form method="POST" action="">
									@csrf
									@method("PUT")
									<div class="form-group">
										<label>Ancien mot de passe</label>
										<input type="password" name="old_password" class="form-control">
									</div>
									<div class="form-group">
										<label>Nouveau mot de passe</label>
										<input type="password" name="password" class="form-control">
									</div>
									<div class="form-group">
										<label>Confirmer le mot de passe</label>
										<input type="password" name="password_confirmation" class="form-control">
									</div>
									<button class="btn btn-primary" type="submit">Sauvegarder</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Change Password Tab -->

		</div>
	</div>
</div>
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush


