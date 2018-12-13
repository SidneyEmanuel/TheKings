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
$nome = $objData->nome;
$email = $objData->email;
$senha = $objData->senha;
$endereco = $objData->endereco;

//limpa os dados
$nome = stripslashes($nome);
$email = stripslashes($email);
$senha = stripslashes($senha);
$endereco = stripcslashes($endereco);
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
    $senha = md5($senha);
    $sql = "insert into usuarios values (NULL,'$nome','$email','$senha','$endereco')";
    if( mysqli_query($con,$sql) ){
        $dados = array('mensage' => "Os dados foram inseridos");
        echo json_encode($dados);
    }
    else{
        $dados = array('mensage' => "Não foi possível enviar os dados");
        echo json_encode($dados);
    }
}
?>
