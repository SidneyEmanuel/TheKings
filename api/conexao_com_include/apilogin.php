<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, CORELATION_ID");
header("Content-Type: text/html; charset=utf8");
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type");

//RECUPERAÇÃO DO FORMULÁRIO
$data = file_get_contents("php://input");
$objData = json_decode($data);

//Transforma os dados

$email = $objData->email;
$senha = $objData->senha;

//limpa os dados

$email = stripslashes($email);
$senha = stripslashes($senha);
$email = trim($email);
$dados; //recebe array para retorno
$senha = md5($senha);

//CRIA A CONEXÃO
include_once "conexao.php";
$con = fazer_conexao();
    if($con){
    $sql = "SELECT * FROM usuarios WHERE email='$email', senha='$senha'";
	   $resultado = mysqli_query($con,$sql);
    	if($resultado){
            $out = "[";
            while($result = mysqli_fetch_assoc($resultado) ){
                if($out != "["){
                    $out .= ",";
                }
                $out .= '{"id": "'.$result["id"].'",';
                $out .= '"nome": "'.$result["nome"].'",';
                $out .= '"email": "'.$result["email"].'",';
                $out .= '"senha": "'.$result["senha"].'"}';
            }
            $out .= "]";
            echo $out;
        }
    } //fechando a consulta
    else{
      echo "Não foi possível conectar com o banco de dados";
    }

?>
