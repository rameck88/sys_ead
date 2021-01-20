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
        <title>Dashboard - <?php echo $nome; ?></title>
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
            <!-- menu lateral com oções para cada nivel de acesso -->
            <div class="menu-lateral">
			    <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">MEUS CURSOS</a></li>
					<?php if($nivel==0): ?>
						<li><a href="perfil.php">PERFIL DO ALUNO</a></li>
            		<?php endif; ?>
					<?php if($nivel==1): ?>
						<li><a href="perfil.php">PERFIL DO PROFESSOR</a></li>
                    <?php endif; ?>
                    <?php if($nivel==2): ?>
						<li><a href="perfil.php">PERFIL DO ADM</a></li>
            		<?php endif; ?>
					<li><a href="">COMENTÁRIOS</a></li>
					<li><a href="acoes/logout.php">SAIR</a></li>
			    </ul>
			</div>



           <!-- < ?php
                    /*("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON p.id = pu.id_user WHERE u.email = ? AND u.senha = ?");*/
                        $query = $conexao->prepare(("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON u.id = pu.id_user"));
                        $query->execute();
                
                        $users = $query->fetchAll(PDO::FETCH_ASSOC);

                        for($i = 0; $i < sizeof($users); $i++):
                            $usuarioAtual = $users[$i];
                            $teste = $users[$i];
                    ?>
                    < ?php endfor; ?>
                   < ?php echo $teste["nome"], $usuarioAtual["senha"], $teste["profissao"];?>-->
                   



        <?php if($nivel==2): ?>
            <table width="40%">
                <thead>
                    <tr style="font-weight: bold">
                        <td>Email</td>
                        <td>Senha</td>
                        <td>Nome</td>
                        <td>Nivel</td>
                        <td>ID</td>
                    </tr>                
                </thead>
                <tbody>
                    <?php
                    /*("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON p.id = pu.id_user WHERE u.email = ? AND u.senha = ?");*/
                        $query = $conexao->prepare(("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON u.id = pu.id_user"));
                        $query->execute();
                
                        $users = $query->fetchAll(PDO::FETCH_ASSOC);

                        for($i = 0; $i < sizeof($users); $i++):
                            $usuarioAtual = $users[$i];
                            $teste = $users[$i];
                    ?>
                    <tr>
                        <td><?php echo $usuarioAtual["email"]; ?></td>
                        <td><?php echo $usuarioAtual["senha"]; ?></td>
                        <td><?php echo $usuarioAtual["nome"]; ?></td>
                        <td><?php echo $usuarioAtual["nivel"]; ?></td>
                        <td><?php echo $usuarioAtual["id"]; ?></td>
                    </tr>
                    <?php endfor; ?>
                    <?php echo $teste["nome"], $usuarioAtual["senha"], $teste["cpf"];?>
                </tbody>            
            </table>
        <?php endif; ?>

    </body>
</html>