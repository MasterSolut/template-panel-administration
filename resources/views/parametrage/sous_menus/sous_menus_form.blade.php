@extends('PanelAdministration::templates.background')
@section('content')
<div class="col-xs-12">
  <!-- general form elements -->
  <div class="box box-primary">




  @if(isset($sous_menus->id_sous_menus))
  <div class="box-header with-border">
    <h3 class="box-title">Modifier le sous menu</h3>
  </div>
  {!! Form::model($sous_menus, [
  'method' => 'PATCH',
  'route' => ['sous_menus.update', $sous_menus->id_sous_menus],
  'files' => true
  ]) !!}
  @else
  <div class="box-header with-border">
    <h3 class="box-title">Enrégistrer un sous menu</h3>
  </div>
  {!! Form::open(['route' => 'sous_menus.store' ]) !!}
  @endif



    @if(Session::has('flash_message'))
    <div class="alert alert-success alert-dismissible" role="alert" data-plugin="alertify">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      {{ Session::get('flash_message') }}
    </div>
    
    <script type="text/javascript">
    opener.location.replace("{{url('admin/sous_menus/list_by/'.Session::get('menu_id'))}}"); 
    </script>
    @endif
 
    <div class="box-body">
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="titre_sous_menus">Titre du sous menu</label>
            {!! Form::text('titre_sous_menus', null, ['class' => 'form-control', 'placeholder' => 'Titre du menu']) !!}
            {!! $errors->first('titre_sous_menus','<span class="help-block" style="color:red;">:message</span>') !!}
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <label for="libelle_sous_menus">Icone du sous menu</label>
            {!! Form::text('libelle_sous_menus', null, ['class' => 'form-control', 'placeholder' => 'Icone du menu']) !!}
            {!! $errors->first('libelle_sous_menus','<span class="help-block" style="color:red;">:message</span>') !!}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="lien_sous_menus">Lien</label>
            {!! Form::text('lien_sous_menus', null, ['class' => 'form-control', 'placeholder' => 'Lien']) !!}
            {!! $errors->first('lien_sous_menus','<span class="help-block" style="color:red;">:message</span>') !!}
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <label for="indice_sous_menus">Indice</label>
            {!! Form::number('indice_sous_menus', null, ['class' => 'form-control', 'placeholder' => 'Indice']) !!}
            {!! $errors->first('indice_sous_menus','<span class="help-block" style="color:red;">:message</span>') !!}
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-12">
       <div class="form-group">
        <label for="id_menus">Menu</label>
        {!! Form::select('id_menus', $menus, null, ['class' => 'form-control select2']) !!}
      </div>
    </div>
  </div>
      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="publier_sous_menus">Publier</label>
            {!! Form::select('publier_sous_menus', ['1' => 'Oui', '0' => 'Non'], null, ['class' => 'form-control select2']) !!}
          </div>
        </div>
      </div>
      <div class="col-12" align="right">
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </div>
      
      
    </div>
    <!-- /.box-body -->
    {!! Form::close() !!}
  </div>
</div>
@stop


