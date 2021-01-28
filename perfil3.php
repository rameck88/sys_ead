<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $conexaoClass = new Conexao();
        $conexao = $conexaoClass->conectar();
        $email = $_SESSION["usuario"][3];
        $id    = $_SESSION["usuario"][2];
        $nivel = $_SESSION["usuario"][1];
        $nome  = $_SESSION["usuario"][0];
        }else{
        echo "<script>window.location = 'login.php'</script>";
    }
  ?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sistema de acesso - turma 10</title>
        <script type="text/javascript" src="script/jquery.js"></script>
        <script type="text/javascript" src="script/acesso.js"></script>
    </head>
    <body>
                      
    <div id="content">
            <div id="user">
                <!-- comprimenta o usuario dizendo seu nivel de acesso -->
                <span><?php if($nivel==2)
                    echo ($nivel==2) ? $nome." (ADM)" : $nome;
                elseif($nivel==1) 
                    echo ($nivel==1) ? $nome." (Prof)" : $nome;
                else    
                    echo ($nivel==0) ? $nome." (aluno)" : $nome;  ?></span>

            </div>
            <span class="logo">Sistema EAD turma 10</span>
            <div id="logout">
                <a href="acoes/logout.php"><button>Sair</button></a>
            </div>
            <header>perfil do usuario</header>

        <div id="mensagem"></div>

            <div id="formulario">
                <form id="formularioAtt">
                    <span class="title">
                    atualize sua conta</span>

                    <div id="linha">
                        <label for="nomeAtt">Nome</label>
                        <input type="text" name="nomeCadastro" id="nomeAtt" value="<?php echo $nome;?>"/>
                    </div>

                    <div id="linha">
                        <label for="emailAtt">Email</label>
                        <input type="text" name="emailCadastro" id="emailAtt" value="<?php echo $email;?>" />
                    </div>

                    <div id="linha">
                        <label for="senhaAtt">Senha</label>
                        <input type="password" name="senhaCadastro" id="senhaAtt" value="**********"/>
                        <input type="hiden" name="id" id="id" value="<?php $id; ?>"/>
                    </div>

                    <div id="button">
                        <button id="btnAtt">Atualizar</button>
                    </div>
                </form>
                <form id="formularioAtt1">
                    <div id="linha">
                        <label for="cpfAtt">Cpf</label>
                        <input type="text" name="cpfAtt" id="cpfAtt" value="insira seu cpf" />
                    </div>

                    <div id="linha">
                        <label for="nascDateAtt">Data de nascimento</label>
                        <input type="text" name="nascDateAtt" id="nascDateAtt" value="insira seu cpf!" />
                    </div>

                    <div id="linha">
                        <label for="telAtt">Telefone</label>
                        <input type="text" name="telAtt" id="telAtt" value="insira seu telefone!"/>
                    </div>

                    <div id="linha">
                        <label for="profissaoAtt">Profissão</label>
                        <input type="text" name="profissaoAtt" id="profissaoAtt" value="insira sua Profissão!" />
                        <input type="hiden" name="id" id="id" value="<?php $id; ?>"/>
                    </div>

                    <div id="button">
                        <button id="btnAtt1">atualizar</button>
                    </div>
                </form>
            <form id="formularioAtt2">
                <span class="titleend">endereço</span>
                    <div id="linha">
                    <label for="bairroAtt">Bairro</label>
                    <input type="text" name="bairroAtt" id="bairroAtt" value="insira seu Bairro!"/>
                </div>

                <div id="linha">
                    <label for="cidAtt">Cidade</label>
                    <input type="text" name="cidAtt" id="cidAtt" value="insira sua Cidade!" />
                </div>

                <div id="linha">
                    <label for="endAtt">Endereço</label>
                    <input type="text" name="endAtt" id="endAtt" value="insira seu Endereço!" />
                </div>

                <div id="linha">
                    <label for="estadoAtt">Estado</label>
                    <input type="text" name="estadoAtt" id="estadoAtt" value="insira seu Estado!"/>
                </div>

                <div id="linha">
                    <label for="numAtt">Numero</label>
                    <input type="text" name="numAtt" id="numAtt" value="insira o Numero de sua residencia!" />
                </div>

                <div id="linha">
                    <label for="cepAtt">CEP</label>
                    <input type="text" name="cepAtt" id="cepAtt" value="insira seu Cep!"/>
                </div>

                <div id="linha">
                    <label for="complemAtt">Complemento</label>
                    <input type="text" name="complemAtt" id="complemAtt" value="insira complemento residencial!" />
                </div>

                <div id="button">
                    <button id="btnAtt2">atualizar</button>
                </div>
            </form>
            </div>
        <footer>Sistema de acesso &copy; 2020</footer>
    </body>
</html>
