@extends('PanelAdministration::templates.base')
@section('content')
<div class="box box-primary">
  <div class="box-header">
    <div class="box-header col-xs-10">
      <h1 >Liste des menus</h1>
    </div>
    <div class="box-header col-xs-2">
      <a
      onclick="javascript:window.open('{{ URL::To('admin/menus/create')}}',800,700,true)"
        class="btn btn-primary float-right mt-2">
        <h5> <i class="glyphicon glyphicon-plus"></i>Nouveau</h5>
      </a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Titre</th>
          <th>Icone</th>
          <th>Lien</th>
          <th width="20%">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1; ?>
        @foreach($menus as $menu)
        <tr role="row" class="odd">
          <td class="sorting_1">{{ $i }}</td>
          <td><u> 
              <a href="{{URL::To('/admin/sous_menus/list_by/'.$menu->id_menus)}}">{{ $menu->titre_menus }}</a>
          </u></td>
          <td>{{ $menu->libelle_menus }}</td>
          <td>{{ $menu->lien_menus }}</td>
          <td>
            <a onclick="javascript:window.open('{{route('menus.edit',$menu->id_menus)}}',800,700,true)">
              <button 
                type="button" 
                class="btn btn-primary btn-flat" 
                data-toggle="tooltip" 
                data-original-title="Éditer">
                <i class="fa fa-edit"></i>
              </button>
            </a>
        <a href="{{URL::To('admin/menus/visible/'.$menu->id_menus)}}">
          <button  type="button"  class="btn btn-danger btn-flat"  data-toggle="tooltip" 
            data-original-title="Supprimer">
            <i class="fa fa-trash"></i>
          </button>
          </a>
      </td>
    </tr>
    <?php $i++; ?>
    @endforeach
    
  </tbody>
  <tfoot>
  <tr>
    <th>#</th>
    <th>Titre</th>
    <th>Icone</th>
    <th>Lien</th>
    <th width="20%">Actions</th>
  </tr>
  </tfoot>
</table>
</div>
<!-- /.box-body -->
</div>
@stop