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
                                    <label for="codEscola">Cód Escola
                                <div class="form-group">
                                    <input type="text" name="cod_escola" class="form-control" id="cod_escola"
                                        value="" placeholder="Cod">
                                    </label>
                                </div>
                                
                            </div>
                            <div class="form-group">


                                <div class="form-group">
                                    <label for="razaoSocial" class="control-label">Razão Social
                                    </label>
                                    <input name="razaoSocial" class="form-control" id="razao_social_esc"
                                        value="" placeholder="Razão Social">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nomeFantasia" class="control-label">Nome Fantasia
                                </label>
                                <input name="nomeFantasia" class="form-control" id="nome_fantasia_esc"
                                    value="" placeholder="Nome Fantasia">
                            </div>
                        </div>
                                        
                                </div>
                            </label>
                            <div class="form-group">
                                <div class="flex-space-between">
                                    <button id="btn_salvar_cadastro_escola" type="button" class="btn btn-primary">
                                        <span>Salvar</span>
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
        <button type="button" id="deletar-clientes" class="btn btn-danger">Deletar</button>
      </div>
    </div>
  </div>
  
  <button id="btn_cadastrar">teste</button>

</div>


<!----------------------------------------------------------------------------------------------------------------------------->



          
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


