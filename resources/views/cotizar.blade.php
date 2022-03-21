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

<script>



	</script>

	<form class="w-75 mx-auto" id="form1">
	<div class="row">
		<div class="col-md-3 mt-0">
			<div class=" fs-2 bg-light text-left col-md-12">
				<span class="">Cotizacion<span>					
			</div>
		</div>
		<div class="col-md-3 mt-0">
			<br>
			<label class="text-info" for="" id="numerocotizacion"> Cotización #00000000 </label>
		</div>
		<div class="col-md-3 mt-0">
			<br>
			<label class="text-info" for="valisezdias" id=""> Validez en dias: 30</label>
		</div>
		<div class="col-md-3 mt-0">
			<br>
			<select class="form-select form-select-sm"  id="selectalmacenes">
				@foreach($almacenes as $almacen)
				<option value="{{$almacen->codalm}}">{{$almacen->codalm}} {{$almacen->nomalm}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<hr>
	<div class="row">		
		<div class="col-md-3">				
			<div class="form-group">
				<label for="cliente">NIT o Razon Social:</label>
				<input  class="form-control form-control-sm" type="" id="cliente" name="cliente" required minlength="4" maxlength="30" size="10">
			</div>
		</div>
		<div class="col-md-3 ">
			<div class="form-group">	
			<label for="razon" id="">Razón social seleccionada</label>
			<br>
			<label id="razon" class="text-muted" minlength="6">Ningún cliente seleccionado</label>
		</div>
		</div>
		<div class="col-md-3 form-group ">
			<label for="selectlistaprecios" id="">Lista de precios</label>
			<br>
			<select class="form-select form-select-sm"  id="selectlistaprecios">
				@foreach($nombresdelista as $lista)
				<option value="{{$lista->codlist}}">{{$lista->codlist}} {{$lista->nomlist}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-3 form-group ">
			<label tabindex="2" for="selectlistavendedores" id="">Vendedor</label>
			<br>
			<select class="form-select form-select-sm"  id="selectlistavendedores">
				@foreach($vendedores as $lista)
				<option value="{{$lista->codven}}-{{$lista->nombre_1}}">{{$lista->codcven}} {{$lista->nombre_1}}</option>
				@endforeach
			</select>
		</div>
	</div>
	</form>
	<form class="w-75 mx-auto" id="form2">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="producto">Producto:</label>
				<input  class="form-control form-control-sm" type="" id="producto" name="producto" required >
			</div>
		</div>		
		<div class="col-md-2">
			<label for="cantidad">Cantidad:</label>
			<div class="input-group  input-group-sm">
				<div class="input-group-prepend">
					<span class="input-group-text">U</span>
				  </div>
				<input  class="form-control form-control-sm" type="number" id="cantidad"  required>
				<div class="invalid-feedback"> Campo obligatorio  </div>
			</div>
		</div>
		<div class="col-md-2">
			<label for="precio">Precio (Incluye IVA):</label>
			<div class="input-group  input-group-sm">
			<div class="input-group-prepend">
				<span class="input-group-text">$</span>
			  </div>
			<input  class="form-control form-control-sm"  type="number" id="precio"  required>
			<div class="invalid-feedback"> Campo obligatorio  </div>
		</div>	</div>	
		<div class="col-md-2">
			<br>
			<button type="button" onclick="addItem()" id="addButton"  class="btn btn-primary w-100">Agregar</button>
		</div>
	</div>
	<hr>
</form>
<br>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>

<script>
		var items=[];
		var item;
		
		
		$(document).ready(function(){
			
					__clientAutoComplete();
					__productAutoComplete();
					//__onChangeLista();
					
				});

		
		function __clientAutoComplete(){
				var options = {
				url: function(q) {
					return '{{ asset("/") }}'+'findcliente?q=' + q; 
				},
				getValue: "nombre_1",
				template: {
					type: "description",
					fields: {
						description: "Codter"
					}
				},
					list: {
                    onClickEvent: function() {
                        var e = $("#cliente").getSelectedItemData();
                        nombre= e.nombre_1 +" " + e.Codter;
						$("#razon").text(nombre);
						$("#razon").removeClass("text-muted");
						$("#razon").addClass("text-success");
                }}
			};					

			$("#cliente").easyAutocomplete(options);
		}

		function __productAutoComplete(){
				var options = {
				url: function(q) {
					return '{{ asset("/") }}'+'findproducto?q=' + q + "&l="+ $('#selectlistaprecios').val() +"&a="+ $('#selectalmacenes').val(); 
				},
				getValue: "Nomins",
				template: {
					type: "custom",
						method: function(value, item) {
						return value+" - <span class='text-muted'> Cod:"+item.Codins +"</span>"+" > $"+ Math.round(item.valvta) + " > Stock:"+ Math.round(item.Caninv,2);
						}
				},
					list: {
				onChooseEvent: function() {
				var value = $("#producto").getSelectedItemData();
					if (value != null)
					{
						item=value;
						$("#precio").val(item.valvta);	
						$("#cantidad").focus();
						$("#addButton").prop('disabled', false);
					}
				}
			
			}
			};					

			$("#producto").easyAutocomplete(options);
		}

		function addItem()
		{
			items.push(item);
			
		}

</script>
@endsection("content")

