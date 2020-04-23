@extends('layout.app', ['current' => 'produtos'])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <div class="card">
                <button class="btn btn-outline-info" role="button" onClick="newProduct()"> Novo Produto </button>
            </div>
            
            <table class="table table-ordered table-hover" id="tableProducts">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Departamento</th>
                        <th>Ações</th>
                    </tr> 
                </thead>
                <tbody>

                </tbody>
            </table> 
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProducts">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduct">
                    <div class="modal-header">
                        <h3 class="modal-title">Novo Produto</h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">

                        <div class="form-group">
                            <label for="nameProduct" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nameProduct" placeholder="Nome do Produto...">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="priceProduct" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="priceProduct" placeholder="Preço...">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="amountProduct" class="control-label">Quantidade</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="amountProduct" placeholder="Quantidade...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="departmentProduct" class="control-label">Categorias</label>
                            <div class="input-group">
                                <select class="form-control" id="departmentProduct">

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success">Salvar</button>
                        <button type="cancel" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function newProduct(){
            $('#id').val('');
            $('#nameProduct').val('');
            $('#priceProduct').val('');
            $('#amountProduct').val('');
            $('#dlgProducts').modal('show');
        }

        function loadingDepartments(){
            $.getJSON('/api/categorias', function (data){
                for(i=0; i<data.length; i++){
                    opcao = '<option value ="' + data[i].id + '">' +
                        data[i].nome + '</option>';
                    $('#departmentProduct').append(opcao);
                }
            });
        }

        function mountLine(prod){
            var line = "<tr>" +
                        "<td>" + prod.id + "</td>" +
                        "<td>" + prod.name + "</td>" +
                        "<td>" + prod.amount + "</td>" +
                        "<td>" + prod.price + "</td>" +
                        "<td>" + prod.department_id + "</td>" +
                        "<td>" +
                            '<button class="btn btn-xs btn-outline-warning" onclick="edit(' + prod.id + ')"> Editar </button> ' +
                            '<button class="btn btn-xs btn-outline-danger" onclick="remove(' + prod.id + ')"> Apagar </button> ' +
                        "</td>" +
                    "</tr>";
            return line;
        }

        function edit(id){
            $.getJSON('/api/produtos/' + id, function(data){
                $('#id').val(data.id);
                $('#nameProduct').val(data.name);
                $('#priceProduct').val(data.price);
                $('#amountProduct').val(data.amount);
                $('departmentProduct').val(data.department_id);
                $('#dlgProducts').modal('show');
            });
        }

        function remove(id){
            $.ajax({
                type:"DELETE",
                url:'/api/produtos/' + id,
                context: this,
                success: function(){
                    line = $("#tableProducts>tbody>tr");
                    e = line.filter( function(i, element){
                        return element.cells[0].textContent == id;
                    });
                    if(e)
                        e.remove();
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        function loadingProducts(){
            $.getJSON('/api/produtos', function(products){
                for(i=0; i<products.length; i++){
                    line = mountLine(products[i]);
                    $("#tableProducts>tbody").append(line);
                }
            });
        }

        function productCreate(){
            prod = {
                name: $("#nameProduct").val(),
                amount: $("#amountProduct").val(),
                price: $("#priceProduct").val(),
                department_id: $("#departmentProduct").val()
            };
            $.post("/api/produtos", prod, function(data){
                product = JSON.parse(data);
                line = mountLine(product);
                $('#tableProducts>tbody').append(line)
            });
        }

        function productSave(){
            prod = {
                id: $("#id").val(),
                name: $("#nameProduct").val(),
                amount: $("#amountProduct").val(),
                price: $("#priceProduct").val(),
                department_id: $("#departmentProduct").val()
            };

            $.ajax({
                type:"PUT",
                url:'/api/produtos/' + prod.id,
                context: this,
                data: prod,
                success: function(data){
                    prod = JSON.parse(data);
                    line = $("#tableProducts>tbody>tr");
                    e = line.filter( function(i, e){
                        return e.cells[0].textContent == prod.id;
                    });
                    if(e){
                        e[0].cells[0].textContent = prod.id;
                        e[0].cells[1].textContent = prod.name;
                        e[0].cells[2].textContent = prod.price;
                        e[0].cells[3].textContent = prod.amount;
                        e[0].cells[4].textContent = prod.department_id;
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        $("#formProduct").submit(function(event){
            event.preventDefault();
            if($("#id").val() != '')
                productSave();
            else
                productCreate();
            $("#dlgProducts").modal('hide');
        });

        $(function(){
            loadingDepartments();
            loadingProducts();
        })

    </script>

@endsection