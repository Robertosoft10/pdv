<?php
session_start();
include_once '../Config/conection.php';

$usuarioId = $_GET['usuarioId'];
$usuarioNome = $_POST['usuarioNome'];
$usuarioTipo = $_POST['usuarioTipo'];
$usuarioCodigo = sha1($_POST['usuarioCodigo']);

$sql = "UPDATE tb_usuarios SET usuarioNome=:usuarioNome, usuarioTipo=:usuarioTipo, usuarioCodigo=:usuarioCodigo WHERE usuarioId='$usuarioId'";

$atualizar = $conectar->prepare($sql);

$atualizar->bindParam(':usuarioNome', $usuarioNome);
$atualizar->bindParam(':usuarioTipo', $usuarioTipo);
$atualizar->bindParam(':usuarioCodigo', $usuarioCodigo);

$atualizar->execute();
if($atualizar > 0){
  $_SESSION['usuarioAtualizao'] = "Usuario atualizdo com sucesso!";
  header('location: ../Pages/usuario.php');
}else{
    $_SESSION['usuarioNaoAtualizao'] = "Falha usuário não atualizado";
     header('location: ../Pages/usuario.php');
}
?>