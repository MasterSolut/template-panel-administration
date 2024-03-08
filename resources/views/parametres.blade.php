@php
	$title = "app Setting";
@endphp
@extends('layouts.app')

@push('page-css')
	<!-- Select2 css-->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush


@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title" style="margin-left: 15px">Paramètres</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item active"><a href="{{route('home')}}">Tableau de bord</a></li>
		<li class="breadcrumb-item "><a href="javascript:(0)">Paramètres</a></li>
	</ul>
</div>
@endpush

@section('content')

<div class="row">				
	<div class="col-12">
		
	</div>
</div>
@endsection

@push('page-js')
	<!-- Select2 js-->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush

