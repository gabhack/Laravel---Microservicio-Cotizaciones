<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="producto">Producto:</label>
            <input class="form-control form-control-sm" type="" id="producto" name="producto" required>
        </div>
    </div>
    <div class="col-md-2">
        <label for="cantidad">Cantidad:</label>
        <div class="input-group  input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">U</span>
            </div>
            <input class="form-control form-control-sm" type="number" id="cantidad" required>
            <div class="invalid-feedback"> Campo obligatorio </div>
        </div>
    </div>
    <div class="col-md-2">
        <label for="precio">Precio (Incluye IVA):</label>
        <div class="input-group  input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input class="form-control form-control-sm" type="number" id="precio" required>
            <div class="invalid-feedback"> Campo obligatorio </div>
        </div>
    </div>
    <div class="col-md-2">
        <br>
        <button type="button" onclick="addItem()" id="addButton" class="btn btn-primary w-100">Agregar</button>
    </div>
</div>
<div class="w-100 mx-auto">
    <x-invoice-table-header>
        <livewire:invoice-item />
    </x-invoice-table-header>
</div>

<script>
    var items = [];
    var item;

    $(document).ready(function() {

        __clientAutoComplete();
        __productAutoComplete();
        //__onChangeLista();
    });

    function __productAutoComplete() {
        var options = {
            url: function(q) {
                return '{{ asset('/') }}' + 'findproducto?q=' + q + "&l=" + $('#selectlistaprecios').val() +
                    "&a=" + $('#selectalmacenes').val();
            },
            getValue: "Nomins",
            template: {
                type: "custom",
                method: function(value, item) {
                    return value + " - <span class='text-muted'> Cod:" + item.Codins + "</span>" + " > $" + Math
                        .round(item.valvta) + " > Stock:" + Math.round(item.Caninv, 2);
                }
            },
            list: {
                onChooseEvent: function() {
                    var value = $("#producto").getSelectedItemData();
                    if (value != null) {
                        item = value;
                        $("#precio").val(item.valvta);
                        $("#cantidad").focus();
                        $("#addButton").prop('disabled', false);
                    }
                }

            }
        };

        $("#producto").easyAutocomplete(options);
    }

    function addItem() {
        items.push(item);
        $("form2").validate();
    }
</script>
