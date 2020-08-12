<?php
session_start();
include_once '../Config/conection.php';

$usuarioNome = $_POST['usuarioNome'];
$usuarioTipo = $_POST['usuarioTipo'];
$usuarioCodigo = sha1($_POST['usuarioCodigo']);

$sql = "INSERT INTO tb_usuarios (usuarioNome, usuarioTipo, usuarioCodigo)VALUES(:usuarioNome, :usuarioTipo, :usuarioCodigo)";

$cadastrar = $conectar->prepare($sql);

$cadastrar->bindParam(':usuarioNome', $usuarioNome);
$cadastrar->bindParam(':usuarioTipo', $usuarioTipo);
$cadastrar->bindParam(':usuarioCodigo', $usuarioCodigo);

$cadastrar->execute();
if($cadastrar > 0){
  $_SESSION['usuarioCatrastrado'] = "Usuario cadastrado com sucesso!";
  header('location: ../Pages/usuario.php');
}else{
    $_SESSION['usuarioNaoCatrastrado'] = "Preencha todos os campos obrigatórios";
     header('location: ../Pages/usuario.php');
}
?>