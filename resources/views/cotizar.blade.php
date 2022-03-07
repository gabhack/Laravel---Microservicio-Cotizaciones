@extends('layouts.app')


	
@section('content')
<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	input[type=number] {
		-moz-appearance: textfield;
	}
</style>
	<form class="w-75 mx-auto">
	<div class="row">
		<div class=" fs-1 bg-light text-center col-md-12">
            <span class="">Cotizacion<span>
				<hr>
		</div>
	</div>
	<div class="row">		
		<div class="col-md-4">
			<div class="form-group">
				<label for="cliente">NIT (sin digito verificacion):</label>
				<input class="form-control" type="number" id="cliente" name="cliente" required minlength="4" maxlength="30" size="30">
			</div>
		</div>
		<div class="col-md-3  form-group">
			
			<button class="btn btn-light dropdown-toggle mb-0 p" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
				Lista de precios
			  </button>
			  <ul class="dropdown-menu dropdown-menu-bottom" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="#">Precios 1</a></li>
				<li><a class="dropdown-item" href="#">Precios 2</a></li>
				<li><a class="dropdown-item" href="#">Precios 3</a></li>
			  </ul>
		</div>
		</div>
		<div class="col-md-5 bg-success">
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
		</div>
	</div>
</form>
@endsection("content")