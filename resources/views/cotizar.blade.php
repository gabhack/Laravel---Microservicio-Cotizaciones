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



    <form method="post" action={{ route('saveMaeCotizacion') }} class="w-75 mx-auto" id="form1">
        @csrf
        <div class="row ">
            <div class="col-md-3 mt-0">
                <div class=" fs-2 bg-light text-left col-md-12">
                    <span class="">Cotizacion<span>
                </div>
            </div>
            <div class="col-md-3 mt-0">
                <br>
            </div>
            <div class="col-md-3 me-0">
                <br>
                <label class=" mt-right" for="valisezdias" id=""> Validez en dias: 30</label>
            </div>
            <div class="col-md-3 me-0 ">
                <br>
                <label class=" me-0" for="" id="numerocotizacion"> Cotización #00000000 </label>
            </div>
        </div>
        <hr>
        <div class="col-md-6 mx-auto">
            <div class="row md-3 pb-4">
                <div class="form-group">
                    <label for="selectalmacenes">Seleccione un punto de venta:</label>
                    <select class="form-select form-select-sm" id="selectalmacenes" name="selectalmacenes">
                        @foreach ($almacenes as $almacen)
                            <option value="{{ $almacen->codalm }}">{{ $almacen->codalm }} {{ $almacen->nomalm }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-md-3 pb-4 ">
                <div class="form-group">
                    <label for="cliente">NIT o Razon Social:</label>
                    <input class="form-control form-control-sm" type="" id="cliente" name="cliente" required minlength="4"
                        maxlength="30" size="10">
                    <input type="hidden" id="razon" name="razon" />
                </div>
            </div>
            <div class="row-md-3 form-group pb-4">
                <label for="selectlistaprecios" id="">Lista de precios</label>
                <br>
                <select class="form-select form-select-sm" id="selectlistaprecios" name="selectlistaprecios">
                    @foreach ($nombresdelista as $lista)
                        <option value="{{ $lista->codlist }}">{{ $lista->codlist }} {{ $lista->nomlist }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row-md-3 form-group pb-4">
                <label tabindex="2" for="selectlistavendedores" id="">Vendedor</label>
                <br>
                <select class="form-select form-select-sm" id="selectlistavendedores" name="selectlistavendedores">
                    @foreach ($vendedores as $lista)
                        <option value="{{ $lista->codven }}-{{ $lista->nombre_1 }}">{{ $lista->codcven }}
                            {{ $lista->nombre_1 }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- @include('mae-cotizacion') --}}
        <div class=" text-center">
            <button class="btn btn-primary form-group" type="submit">Siguiente</button>
        </div>
        <hr>
    </form>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script>
        var x;
        $(document).ready(function() {
            this.x = "sssssss";
            __clientAutoComplete();
            //__onChangeLista();

        });

        function __clientAutoComplete() {
            var options = {
                url: function(q) {
                    return '{{ asset('/') }}' + 'findcliente?q=' + q;
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
                        nombre = e.Codter;
                        $("#razon").val(nombre);
                    }
                }
            };

            $("#cliente").easyAutocomplete(options);
        }
    </script>
@endsection("content")
