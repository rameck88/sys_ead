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
    $query = $conexao->prepare(("SELECT * FROM perfil_user WHERE id_perfil=$id"));
    $query->execute();
         
    if($query->rowCount()){
        $userr = $query->fetchAll(PDO::FETCH_ASSOC)[0];

        $u_SESSION["usuario"] = array($userr["cpf"], $userr["d_nasc"], $userr["tel"], $userr["profissao"]);
        $uCpf = $u_SESSION["usuario"][0];
        $uNasc = $u_SESSION["usuario"][1];
        $uTel  = $u_SESSION["usuario"][2];
        $uProf  = $u_SESSION["usuario"][3];
    }
    $query = $conexao->prepare(("SELECT * FROM perfil_end WHERE id_end=$id"));
    $query->execute();
         
    if($query->rowCount()){
        $user_e = $query->fetchAll(PDO::FETCH_ASSOC)[0];

        $e_SESSION["usuario"] = array($user_e["bairro"], $user_e["cidade"], $user_e["endereco"], $user_e["estado"], $user_e["numero"], $user_e["cep"], $user_e["complemento"],);
        $eBairro = $e_SESSION["usuario"][0];
        $eCidade = $e_SESSION["usuario"][1];
        $eEndereco  = $e_SESSION["usuario"][2];
        $eEstado = $e_SESSION["usuario"][3];
        $eNum = $e_SESSION["usuario"][4];
        $eCep  = $e_SESSION["usuario"][5];
        $eComplem  = $e_SESSION["usuario"][6];
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
                    <span class="title"><?php if($uCpf=="0")echo "insira seu cpf";else echo $uCpf;?>
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
                    </div>

                    <div id="button">
                        <button id="btnAtt">Atualizar</button>
                    </div>
                </form>
                <form id="formularioAtt1">
                    <div id="linha">
                        <label for="cpfAtt">Cpf</label>
                        <input type="text" name="cpfAtt" id="cpfAtt" value="<?php if($uCpf=="")echo "insira seu cpf";else echo $uCpf;?>" />
                    </div>

                    <div id="linha">
                        <label for="nascDateAtt">Data de nascimento</label>
                        <input type="text" name="nascDateAtt" id="nascDateAtt" value="<?php if($uNasc=="")echo "insira seu cpf!";else echo $uNasc;?>" />
                    </div>

                    <div id="linha">
                        <label for="telAtt">Telefone</label>
                        <input type="text" name="telAtt" id="telAtt" value="<?php if($uTel=="")echo "insira seu telefone!";else echo $uTel;?>"/>
                    </div>

                    <div id="linha">
                        <label for="profissaoAtt">Profissão</label>
                        <input type="text" name="profissaoAtt" id="profissaoAtt" value="<?php if($uProf=="")echo "insira sua Profissão!";else echo $uProf;?>" />
                    </div>

                    <div id="button">
                        <button id="btnAtt1">atualizar</button>
                    </div>
                </form>
            <form id="formularioAtt2">
                <span class="titleend">endereço</span>
                    <div id="linha">
                    <label for="bairroAtt">Bairro</label>
                    <input type="text" name="bairroAtt" id="bairroAtt" value="<?php if($eBairro=="")echo "insira seu Bairro!";else echo $eBairro;?>"/>
                </div>

                <div id="linha">
                    <label for="cidAtt">Cidade</label>
                    <input type="text" name="cidAtt" id="cidAtt" value="<?php if($eCidade=="")echo "insira sua Cidade!";else echo $eCidade;?>" />
                </div>

                <div id="linha">
                    <label for="endAtt">Endereço</label>
                    <input type="text" name="endAtt" id="endAtt" value="<?php if($eEndereco=="")echo "insira seu Endereço!";else echo $eEndereco;?>" />
                </div>

                <div id="linha">
                    <label for="estadoAtt">Estado</label>
                    <input type="text" name="estadoAtt" id="estadoAtt" value="<?php if($eEstado=="")echo "insira seu Estado!";else echo $eEstado;?>"/>
                </div>

                <div id="linha">
                    <label for="numAtt">Numero</label>
                    <input type="text" name="numAtt" id="numAtt" value="<?php if($eNum=="")echo "insira o Numero de sua residencia!";else echo $eNum;?>" />
                </div>

                <div id="linha">
                    <label for="cepAtt">CEP</label>
                    <input type="text" name="cepAtt" id="cepAtt" value="<?php if($eCep=="")echo "insira seu Cep!";else echo $eCep;?>"/>
                </div>

                <div id="linha">
                    <label for="complemAtt">Complemento</label>
                    <input type="text" name="complemAtt" id="complemAtt" value="<?php if($eComplem=="")echo "insira complemento residencial!";else echo $eComplem;?>" />
                </div>

                <div id="button">
                    <button id="btnAtt2">atualizar</button>
                </div>
            </form>
            </div>
        <footer>Sistema de acesso &copy; 2020</footer>
    </body>
</html>
