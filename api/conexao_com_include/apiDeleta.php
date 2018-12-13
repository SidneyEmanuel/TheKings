<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, CORELATION_ID");
header("Content-Type: text/html; charset=utf8");

//RECUPERAÇÃO DO FORMULÁRIO
$data = file_get_contents("php://input");
$id = json_decode($data);

//limpa os dados
$id = trim($id);
$dados; //recebe array para retorno

//conexao com o bd
include_once "conexao.php";
$con = fazer_conexao();

//verifica se tem conexão
if($con){
    $sql = "DELETE FROM usuarios WHERE id=$id";
    if( mysqli_query($con,$sql) ){
        $dados = array('mensage' => "Os dados foram apagados");
        echo json_encode($dados);
    }
    else{
        $dados = array('mensage' => "Não foi possível apagar");
        echo json_encode($dados);
    };
}
else{
    $dados = array('mensage' => "Não foi possível conectar ao banco");
    echo json_encode($dados);
};

?>
