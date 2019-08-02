@extends('layouts.master') 
@section('body') 
@include('layouts.menu-lateral')


<div id=content>
    <div id="inner-content">
        <div class="cliente-detail-page">
            <div class="margin0auto h100vh row">
                <div class="col-menu-client inner-content col-5">


                    <form name="formClientes" id="formClientes">

                        <div class="form-header">
                            <h5></h5>

                            <div class="form-group">

                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        value="" placeholder="id">
                                </div>

                                <div class="form-group">
                                    <label for="cnpjCliente" class="control-label">CNPJ
                                    </label>
                                    <input name="cnpj" pattern="/(^\d{3}\.\d{3}\.\d{3}\-\d{2}$)|(^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$)/"
 class="form-control" id="cnpjCliente" value=""
                                        placeholder="CNPJ">
                                </div>
                            </div>
                            <div class="form-group">


                                <div class="form-group">
                                    <label for="razaoSocial" class="control-label">Razão Social
                                    </label>
                                    <input name="razaoSocial" class="form-control" id="razaoSocial"
                                        value="" placeholder="Razão Social">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomeFantasia" class="control-label">Nome Fantasia
                                </label>
                                <input name="nomeFantasia" class="form-control" id="nomeFantasia"
                                    value="" placeholder="Nome Fantasia">
                            </div>
                        </div>



                        
                                <label for="dataLimite" class="control-label">Data Limite
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="dataLimite"
                                            placeholder="dd/mm/yyyy" value="">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>


                            </div>
                            </label>
                                        
                                </div>
                            </label>
                            <div class="form-group">
                                <div class="flex-space-between">
                                    <button id="deletar" type="button" class="btn btn-danger">
                                        <span>Remover</span>
                                    </button>
                                    <button id="atualizar" type="button" class="btn btn-primary">
                                        <span>Atualizar</span></button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-------------------------------------------------- Modal de Confirmação - Deletar------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------->   
     
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluir Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir o cliente selecionado ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="deletar-clientes" class="btn btn-primary">Deletar</button>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------------------------------------------------------------------------------------------->

        <div class="panel panel-default">

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="menus-client-col inner-content col" id="contentEscolas">
    <div class="nav nav-tabs nav-justified">

        <ul class="nav nav-tabs">
            <li class="active col"><a data-toggle="tab" href="#Escolas">Escolas</a></li>
            <li class="col"><a data-toggle="tab" href="#Menu">Menu</a></li>
            <li class="col"><a data-toggle="tab" href="#Outros">Outros</a></li>

        </ul>

        <div id="Escolas" class="tab-pane fade in active">
            <table class="table shadow table-striped table-bordered table-hover" id="tabelaEscolas">
                <thead>
                    <tr>
                        <th scope="col1">cod. Escola</th>
                        <th scope="col3">Razão Social</th>
                        <th scope="col4">Nome Fantasia</th>
                    </tr>
                </thead>
                <tbody>


                    <div id="Menu" class="tab-pane fade">

                    </div>
                    <div id="Outros" class="tab-pane fade">
                        <h3>Menu 2</h3>

                    </div>

        </div>
    </div>
</div>
</div>
</div>

          
 @endsection
 
 

 @section('javascript')
 {{{csrf_field()}}}

 {{ csrf_field() }}
 
 <script type="text/javascript">
$(document).ready(function () {
    console.log(1 + 1)


    
    });
    


   
    

      
                


</script>

@endsection
</html>


