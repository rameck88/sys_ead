<?php
    require("conexao.php");

    Class Acesso{
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
                case (isset($_POST["type"]) && $_POST["type"] == "login" && isset($_POST["email"]) && isset($_POST["senha"])):
                    echo $this->login($_POST["email"], $_POST["senha"]);
                    break;
                /*se nao estará no type cadastrar */ 
                case (isset($_POST["type"]) && $_POST["type"] == "cadastro" && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["nome"])):
                    echo $this->cadastro($_POST["email"], $_POST["senha"], $_POST["nome"]);
                    break;
            }
        }

        public function login($email, $senha){
            $conexao = $this->con;

            $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
            $query->execute(array($email, $senha));
           /*("SELECT u.*,pu.* FROM usuarios as u INNER JOIN perfil_user as pu ON p.id = pu.id_user WHERE u.email = ? AND u.senha = ?");*/
            if($query->rowCount()){
                $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
                      
                session_start();
                $_SESSION["usuario"] = array($user["nome"], $user["nivel"], $user["id"],$user["email"]);/*,$user["email"], $user["cpf"], $user["d_nasc"], $user["tel"], $user["profissao"], $user["bairro"], $user["cidade"], $user["endereco"], $user["estado"], $user["numero"], $user["cep"], $userr["complemento"],*/
           
                return json_encode(array("erro" => 0));
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Email e/ou senha incorretos."));
            }
        }

        public function cadastro($email, $senha, $nome){
            $conexao = $this->con;

            $query = $conexao->prepare("INSERT INTO usuarios (email, senha, nome, nivel) VALUES (?, ?, ?, ?)");
            
            if($query->execute(array($email, $senha, $nome, 0))){
                /*$id = mysqli_insert_id($conexao);
                $db2 = $conexao->prepare("INSERT INTO perfil_user (cpf, d_nasc, tel, profissao, id_user) VALUES ('0', '0', '0', '0', '{$id}')");
                    if($db2->execute()){
                        $db3 = $conexao->prepare("INSERT INTO perfil_end (bairro, cidade, endereco, estado, numero, cep, complemento, id_perfil ) VALUES ('0', '0', '0', '0', '0', '0', '0', '{$id}')");
                        if($db3->execute()){
                        }
                    }*/
                session_start();
                $_SESSION["usuario"] = array($nome, 0);
               
                return json_encode(array("erro" => 0));
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro ao cadastrar usuario."));
            }
        }
    };

    $conexao = new Conexao();
    $classe  = new Acesso($conexao->conectar());
    $classe->send();
?>
