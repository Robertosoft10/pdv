<?php
session_start();
include_once '../Config/conection.php';
$usuarioId = $_GET['usuarioId'];
$excluir = $conectar->prepare("DELETE FROM tb_usuarios WHERE usuarioId=:usuarioId");
$excluir->bindValue(":usuarioId", $usuarioId);
$excluir->execute();
if($excluir == true){
	$_SESSION['usuarioExcluido'] = "Usuário excluido com sucesso!";
	header('location: ../Pages/usuario.php');
}else{
		$_SESSION['usuarioNaoExcluido'] = "Erro usuário não excluido!";
	header('location: ../Pages/usuario.php');
}
?>