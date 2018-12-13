<?php
function fazer_conexao(){
  $dns = "localhost";
  $user = "root";
  $senha_bd = "root";
  $nome_bd = "thekings";

  $conexao = mysqli_connect($dns,$user,$senha_bd,$nome_bd);

  if($conexao){
    mysqli_set_charset($conexao, "utf8");
  }else{
    die("erro na conexão");
  }
  return $conexao;
}
?>
