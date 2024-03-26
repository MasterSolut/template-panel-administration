<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<!-- <img src="{{ asset('../resources/assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"> -->
				@if(Auth::check())
				<img src="" class="img-circle elevation-2" alt="User Image">
				@else
				<p></p>
				@endif
			</div>
			<div class="info">
				<p> @if(Auth::check())
					{{Auth::user()->login_users}}

					@endif</p>
					<a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
				</div>
			</div>
			
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
				@if(Auth::check())
			  <?php 
			     $id = Auth::user()->id_users;
			            $droits = DB::table('droits')->where('id_users', '=', $id)->get();
			            $menus = DB::table('menus')->select('id_menus','libelle_menus', 'titre_menus','lien_menus')->where('visible_menus', '=', '1')->get();
			            $sous_menus = DB::table('sous_menus')->where('visible_sous_menus', '=', '1')->get();
			   ?>        
			    @foreach($menus as $menu)
			    <li class="nav-item">
				    <a href="#" class="nav-link active">
	            		<i class="nav-icon fas {{$menu->libelle_menus}}"></i> <p>{{($menu->titre_menus)}}
	            		
	            			<i class="right fas fa-angle-left"></i>
	            		</p>
	            	</a>   
			        @foreach($sous_menus as $sous_menu)
			          @if($sous_menu->id_menus == $menu->id_menus)
			            @foreach($droits as $droit)
			              @if($droit->id_sous_menus == $sous_menu->id_sous_menus)
			            	<ul class="nav nav-treeview">
			            	<li class="nav-item"><a href="{{URL::To($sous_menu->lien_sous_menus)}}" class="nav-link"><i class="far {{ $sous_menu->libelle_sous_menus }} text-aqua"></i> <span>{{ $sous_menu->titre_sous_menus }}</span></a></li>
			            	</ul>
			              @endif 
			            @endforeach
			          @endif			       
			        @endforeach        
			      </li>  
			    @endforeach
		@endif
		<template>
			<li class="nav-item">
				<a href="#" class="nav-link active ">
					<i class="nav-icon fas fa-tachometer-alt"></i> <p>Menus
					
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item"><a href="{{url('/admin/menus/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Ajouter un menu</a></li>
					<li class="nav-item"><a href="{{url('/admin/menus')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Liste des Menus</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link active">
					<i class="nav-icon fas fa-tachometer-alt"></i> <p>Sous Menus
					
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item"><a href="{{url('/admin/sous_menus/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Ajouter un sous menu</a></li>
					<li class="nav-item"><a href="{{url('/admin/sous_menus')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Liste des sous Menus</a></li>
				</ul>
			</li>
				<li class="nav-item">
				<a href="#" class="nav-link active">
					<i class="nav-icon fas fa-user-alt	"></i> <p>Utilisateurs
					
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview" >
					<li class="nav-item"><a href="{{url('admin/utilisateurs/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Ajouter un utilisateur</a></li>
					<li class="nav-item"><a href="{{url('/admin/utilisateurs')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Liste des utilisateurs</a></li>
				</ul>
			</li>
		</li>
		
<li class="nav-item">
<a href="#" class="nav-link active">
	<i class="nav-icon fas fa-pie-chart"></i> <p>Type d'Utilisateurs
	
		<i class="right fas fa-angle-left"></i>
	</p>
</a>
<ul class="nav nav-treeview">
	<li class="nav-item"><a href="{{url('admin/type_users/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Ajouter un type utilisateur</a></li>
	<li class="nav-item"><a href="{{url('/admin/type_users')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>Liste des types utilisateurs</a></li>
</ul>
</li>  </template>
        	</ul>
		</ul>
	</nav>
		</div>
		</section>
	</aside>