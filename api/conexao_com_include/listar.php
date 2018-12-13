<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf8");

//CRIA A CONEXÃO
include_once "conexao.php";
$con = fazer_conexao();
    if($con){
    $sql = "SELECT * FROM usuarios";
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
