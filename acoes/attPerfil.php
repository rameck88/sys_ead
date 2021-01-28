<?php
    require("conexao.php");

    Class Perfil{
        private $con = null;

        public function __construct($conexao){
            $this->con = $conexao;
        }

        public function send(){
            if(empty($_POST) || $this->con == null){
                echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor."));
                return;
            }
                /*se estiver no type login */            
           switch(true){
                case (isset($_POST["type"]) && $_POST["type"] == "att" && $_POST["email"] && $_POST["senha"] && $_POST["nome"]):
                    echo $this->att($_POST["email"], $_POST["senha"], $_POST["nome"], $_POST["id"]);
                    break;
                /*se nao estará no type cadastrar */ 
                case (isset($_POST["type"]) && $_POST["type"] == "att1" && isset($_POST["cpf"]) && isset($_POST["dNasc"]) && isset($_POST["tel"]) && isset($_POST["profissao"])):
                    echo $this->att1($_POST["cpf"], $_POST["dNasc"], $_POST["tel"], $_POST["profissao"], $_POST["id"]);
                    break;
            }
        }

        public function att($email, $senha, $nome){
            $conexao = $this->con;
            $query = $conexao->prepare("UPDATE usuarios SET nome=$nome,email=$email,senha=$senha WHERE id=$id");
            $query->execute(array($email, $senha, $nome));
        }

        public function att1($cpf, $dNasc, $tel, $profissao){
            $conexao = $this->con;
            $query = $conexao->prepare("INSERT INTO perfil_user (cpf, d_nasc, tel, profissao, id_user) VALUES (?, ?, ?, ?, ?)");
            $query->execute(array($cpf, $dNasc, $tel, $profissao, $id));
        }
    };

    $conexao = new Conexao();
    $classe  = new Acesso($conexao->conectar());
    $classe->send();
?>
