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
$id = $objData->id;
$nome = $objData->nome;
$email = $objData->email;

//limpa os dados
$id = stripslashes($id);
$nome = stripslashes($nome);
$email = stripslashes($email);
$id = trim($id);
$nome = trim($nome);
$email = trim($email);
$endereco = trim($endereco);
$dados; //recebe array para retorno

//conexao com o bd
include_once "conexao.php";
$con = fazer_conexao();
//verifica se tem conexão
if(!$con){
    $dados = array('mensage' => "Não foi possível conectar ao banco");
    echo json_encode($dados);
}
else {
    $sql = "UPDATE usuarios SET nome='$nome', email='$email', endereco='$endereco' WHERE id = '$id'";

    if( mysqli_query($con,$sql) ){
        $dados = array('mensage' => "Os dados foram alterados");
        echo json_encode($dados);
    }
    else{
        $dados = array('mensage' => "Não foi possível alterar os dados");
        echo json_encode($dados);
    }
}
?>
