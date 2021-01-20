<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");

        $conexaoClass = new Conexao();
        $conexao = $conexaoClass->conectar();
        
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
    <?php
        
        $query = $conexao->prepare(("SELECT u.*,pu.*,eu.* FROM usuarios as u INNER JOIN perfil_user as pu ON pu.id_user = u.id INNER JOIN perfil_end as eu ON eu.id_perfil = u.id"));
        $query->execute();
                
        if($query->rowCount()){
            $userr = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            $u_SESSION["usuario"] = array($userr["nome"], $userr["email"], $userr["nivel"], $userr["cpf"], $userr["d_nasc"], $userr["tel"], $userr["profissao"], $userr["bairro"], $userr["cidade"], $userr["endereco"], $userr["estado"], $userr["numero"], $userr["cep"], $userr["complemento"],);
            $uNome = $u_SESSION["usuario"][0];
            $uEmail = $u_SESSION["usuario"][1];
            $uNivel  = $u_SESSION["usuario"][2];
            $uCpf = $u_SESSION["usuario"][3];
            $uNasc = $u_SESSION["usuario"][4];
            $uTel  = $u_SESSION["usuario"][5];
            $uProf  = $u_SESSION["usuario"][6];
            $uBairro = $u_SESSION["usuario"][7];
            $uCidade = $u_SESSION["usuario"][8];
            $uEndereco  = $u_SESSION["usuario"][9];
            $uEstado = $u_SESSION["usuario"][10];
            $uNum = $u_SESSION["usuario"][11];
            $uCep  = $u_SESSION["usuario"][12];
            $uComplem  = $u_SESSION["usuario"][13];
        }
    ?>
                     
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
                    <span class="title"><?php echo $uNome." e ".$uEmail." e ".$uCpf." e ".$uNasc; ?>atualize sua conta</span>

                    <div id="linha">
                        <label for="nomeAtt">Nome</label>
                        <input type="text" name="nomeCadastro" id="nomeCadastro" value="<?php echo $uNome;?>"/>
                    </div>

                    <div id="linha">
                        <label for="emailAtt">Email</label>
                        <input type="text" name="emailCadastro" id="emailCadastro" value="<?php echo $uEmail;?>" />
                    </div>

                    <div id="linha">
                        <label for="senhaAtt">Senha</label>
                        <input type="password" name="senhaCadastro" id="senhaCadastro" value="**********"/>
                    </div>

                    <div id="button">
                        <button id="btnAtt">Atualizar</button>
                    </div>
                </form>
                <form id="formularioAtt1">
                    <div id="linha">
                        <label for="cpfAtt">Cpf</label>
                        <input type="text" name="cpfAtt" id="cpfAtt" value="<?php echo $uCpf;?>" />
                    </div>

                    <div id="linha">
                        <label for="nascDateAtt">Data de nascimento</label>
                        <input type="text" name="nascDateAtt" id="nascDateAtt" value="<?php echo $uNasc;?>" />
                    </div>

                    <div id="linha">
                        <label for="telAtt">Telefone</label>
                        <input type="text" name="telAtt" id="telAtt" value="<?php echo $uTel;?>"/>
                    </div>

                    <div id="linha">
                        <label for="profissaoAtt">Profissão</label>
                        <input type="text" name="profissaoAtt" id="profissaoAtt" value="<?php echo $uProf;?>" />
                    </div>

                    <div id="button">
                        <button id="btnAtt1">atualizar</button>
                    </div>
                </form>
            <form id="formularioAtt2">
                <span class="titleend">endereço</span>
                    <div id="linha">
                    <label for="bairroAtt">Bairro</label>
                    <input type="text" name="bairroAtt" id="bairroAtt" value="<?php echo $uBairro;?>"/>
                </div>

                <div id="linha">
                    <label for="cidAtt">Cidade</label>
                    <input type="text" name="cidAtt" id="cidAtt" value="<?php echo $uCidade;?>" />
                </div>

                <div id="linha">
                    <label for="endAtt">Endereço</label>
                    <input type="text" name="endAtt" id="endAtt" value="<?php echo $uEndereco;?>" />
                </div>

                <div id="linha">
                    <label for="estadoAtt">Estado</label>
                    <input type="text" name="estadoAtt" id="estadoAtt" value="<?php echo $uEstado;?>"/>
                </div>

                <div id="linha">
                    <label for="numAtt">Numero</label>
                    <input type="text" name="numAtt" id="numAtt" value="<?php echo $uNum;?>" />
                </div>

                <div id="linha">
                    <label for="cepAtt">CEP</label>
                    <input type="text" name="cepAtt" id="cepAtt" value="<?php echo $uCep;?>"/>
                </div>

                <div id="linha">
                    <label for="complemAtt">Complemento</label>
                    <input type="text" name="complemAtt" id="complemAtt" value="<?php echo $uComplem;?>" />
                </div>

                <div id="button">
                    <button id="btnAtt2">atualizar</button>
                </div>
            </form>
            </div>
        <footer>Sistema de acesso &copy; 2020</footer>
    </body>
</html>