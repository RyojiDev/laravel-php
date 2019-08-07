@extends('layouts.master') 
@section('body') 
@include('layouts.menu-lateral')


<div id=content>
    <div id="inner-content">
        <div class="cliente-detail-page">
            <div class="margin0auto h100vh row">
                <div class="col-menu-client inner-content col-5">

                    <h3 id="titulo_cliente"></h3>

                    <form name="formClientes" id="formClientes">

                        <div class="form-header">
                            <h5></h5>

                            <div class="form-group">

                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value=""
                                        placeholder="id">
                                </div>

                                <div class="form-group">
                                    <label for="cnpjCliente" class="control-label">CNPJ
                                    </label>
                                    <input name="cnpj"
                                        pattern="/(^\d{3}\.\d{3}\.\d{3}\-\d{2}$)|(^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$)/"
                                        class="form-control" id="cnpjCliente" value="" placeholder="CNPJ">
                                </div>
                            </div>
                            <div class="form-group">


                                <div class="form-group">
                                    <label for="razaoSocial" class="control-label">Razão Social
                                    </label>
                                    <input name="razaoSocial" class="form-control" id="razaoSocial" value=""
                                        placeholder="Razão Social">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomeFantasia" class="control-label">Nome Fantasia
                                </label>
                                <input name="nomeFantasia" class="form-control" id="nomeFantasia" value=""
                                    placeholder="Nome Fantasia">
                            </div>
                        </div>




                        <label for="dataLimite" class="control-label">Data Limite
                            <div class="form-group">
                                <input type="text" class="form-control" id="dataLimite" placeholder="dd/mm/yyyy"
                                    value="">
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

            <button id="botaoteste">testar</button>

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
        <button type="button" id="deletar-clientes" class="btn btn-danger">Deletar</button>
      </div>
    </div>
  </div>
</div>

<!----------------------------------------------------------------------------------------------------------------------------->

        


<div class="menus-client-col inner-content col" id="contentEscolas">
    <div id="nav_tab_escola">
        <nav id="tabs">
            <ul>
                <li><a href="#tabs-1">Escolas</a></li>
                <li><a href="#tabs-2">Menus</a></li>
                <li><a href="#tabs-3">Outros</a></li>
            </ul>
            <div id="tabs-1">

                <div id="div_cadastrar_escola" class="beauty-jumb jumbotron">
                    <p>
                        <h3>Nenhuma escola cadastrada</h1>
                    </p>

                    <p>
                        <h4>Clique no botão abaixo para cadastrar a primeira escola para o cliente <span id ="titulo_cliente_span"></span></h2>
                        
                    </p>
                    <p><button id="btn_cadastrar_escola" class="btn btn-primary">Cadastrar</button>

                </div>

                <table class="table shadow table-striped table-bordered table-hover" id="tabela_escola">
                    <tr>
                        <th scope="col1">Cód.Escola</th>
                        <th scope="col2">Razão Social</th>
                        <th scope="col3">Nome Fantasia</th>
                        <tbody id="tabela_escolas_body">

                        </tbody>

                    </tr>

                </table>
            </div>
            <div id="tabs-2">
                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id
                    nunc. </p>
            </div>
            <div id="tabs-3">
                <p>Mauris eleifend est et turpis.</p>
                <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus.</p>
            </div>
        </nav>
    </div>
</div>


          
 @endsection
 
 

 @section('javascript')
 {{{csrf_field()}}}

 {{ csrf_field() }}
 
 <script type="text/javascript">
$(document).ready(function () {
    console.log(1 + 1)
    $("#tabs").tabs();

    $("#div_cadastrar_escola").hide();
$("#botaoteste").click(function(){

    $("#tabela_escola").hide();
    $("#div_cadastrar_escola").show();

    return false;
});
    
    });
    


   
    

      
                


</script>

@endsection
</html>


