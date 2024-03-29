@extends('PanelAdministration::templates.base')
@section('content')

<div class="box box-primary">
  <div class="box-header">
    <div class="box-header col-xs-10">
      <?php if (isset($menus->titre_menus)) {?>
      <h3 > Liste des sous menus de 
        <u> 
        <a href="{{url('menus')}}">{{ $menus->titre_menus }}</a>
        </u>
        </h3>
         <?php
      } else {
        ?>
        <h3>Liste des sous menus</h3>
      <?php
      } ?>   
    </div>
    <div class="box-header col-xs-2">
      <a
      onclick="javascript:window.open('{{ URL::To('admin/sous_menus/create')}}',800,700,true)"
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
          <th>Indice</th>
          <th>Titre</th>
          <th>Icone</th>
          <th>Lien</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; ?>
        @foreach($sous_menus as $sous_menu)
        <tr role="row" class="odd">
          <td class="sorting_1">{{ $sous_menu->indice_sous_menus }}</td>
          <td>{{ $sous_menu->titre_sous_menus }}</td>
          <td>{{ $sous_menu->libelle_sous_menus }}</td>
          <td>{{ $sous_menu->lien_sous_menus }}</td>
          <td>
            <a onclick="javascript:window.open('{{route('sous_menus.edit',$sous_menu->id_sous_menus)}}',800,700,true)">
              <button type="button" class="btn btn-primary btn-flat" data-toggle="tooltip" data-original-title="Éditer"><i class="fa fa-edit"></i>
              </button>
            </a>
            <a href="{{URL::To('admin/sous_menus/visible/'.$sous_menu->id_sous_menus)}}">
              <button type="button" class="btn btn-danger btn-flat"  data-toggle="tooltip" data-original-title="Supprimer" ><i class="fa fa-trash"></i>
              </button>
            </a>
          </td>
        </tr>
        <?php $i++; ?>
        @endforeach
        
      </tbody>
      <tfoot>
      <tr>
        <th>Indice</th>
        <th>Titre</th>
        <th>Icone</th>
        <th>Lien</th>
        
        <th>Actions</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
@stop