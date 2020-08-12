<?php
session_start();
include_once '../Config/conection.php';
$razaoId = $_GET['razaoId'];
$excluir = $conectar->prepare("DELETE FROM tb_razaosocial WHERE razaoId=:razaoId");
$excluir->bindValue(":razaoId", $razaoId);
$excluir->execute();
if($excluir == true){
	$_SESSION['empresaExcluido'] = "Empresa excluido com sucesso!";
	header('location: ../Pages/empresa.php');
}else{
		$_SESSION['empresaNaoExcluido'] = "Erro empresa não excluido!";
	header('location: ../Pages/empresa.php');
}
?>