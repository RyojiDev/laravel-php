@extends ('layouts.master') 

@section('body')
                        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

                        <script type="text/javascript" src="js/bootstrap.min.js"></script>
                            <style type="text/css">body {
                                padding-top: 10px;
                                padding-bottom: 40px;
                                background-color: #eee;
                                background-image: url(../imagens/bgIpad.png);
                                background-repeat: repeat;
                            }

                            .double-input .form-control {
                                width: 50%;
                                border-right-width: 0px;
                            }

                            .double-input .form-control:focus {
                                border-right-width: 1px;
                            }

                            .triple-input .form-control {
                                width: 33.3%;
                                border-right-width: 0px;
                            }

                            .triple-input .form-control:focus {
                                border-right-width: 1px;
                            }

                            </style>

   
   
            <div align="center">
                <div style="width: 400px; padding: 20px;">
                    <form name="formindex2" class="form-signin" role="form" method="post" action="acesso.php">
                        <div align="center"><img src="{{ asset('img/icone_300.png') }}" width="300" height="300"
                                border="0" alt="logotipo.png" title="logotipo.png" /></div>
                        <div class="row">
                            <div class="col-xs-4"><select name="matric" id="matric" class="form-control">
                                    <option value="260411">Aluno</option>
                                    <option value="2099078">Professor</option>
                                    <option value="20990040">Coordenador</option>
                                </select><input id='matric' name='matric' type="text" maxlength="8" class="form-control"
                                    placeholder="Matr&iacute;cula" required></div>
                            <div class="col-xs-6"><input id='esenha' name='esenha' type="password" maxlength="8"
                                    value="99999999" class="form-control" placeholder="Data de Nascimento"
                                    required><input id='esenha' name='esenha' type="password" maxlength="8"
                                    class="form-control" placeholder="Data de Nascimento" required></div>
                            <div class="col-xs-2"><button class="btn btn-primary" type="submit">Entrar</button></div>
                        </div>
                        <br><input type="email" name="email" class="form-control"
                            placeholder="E-mail para receber a senha"><button class="btn btn-primary btn-block"
                            type="button" onClick="return emailValido();">Enviar</button><br><br><button
                            class="btn btn-primary btn-block" type="button"
                            onClick="window.location.href='..\\\ecadastro\\\index.php';">Pr�-Matr�cula</button>
                    </form>
                </div>
            </div>
            <script>
                formindex2.matric.focus();
            </script>
            </div>

<script type="text/javascript">
    function emailValido() {
        var matricula = document.formindex2.matric.value;
        var email = document.formindex2.email.value;

        if (matricula == "") { // Matr�cula em branco
            window.alert("Digite a Matr�cula");
            document.formindex2.matric.focus();
            return false;
        }

        if (email == "") { // Matr�cula em branco
            window.alert("Digite o e-mail cadastrado");
            document.formindex2.email.focus();
            return false;
        }
        //alert('ATEN��O: O e-mail informado no cadastrado da escola');
        window.location.href = 'enviar_ps.php?psMatricula=' + matricula + '&psEmail=' + email;
    }
</script>



@endsection