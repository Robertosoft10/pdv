<?php
session_start();
include_once '../Config/conection.php';
$itemId = $_GET['itemId'];
$itemNome = $_POST['itemNome'];
$itemCodigo = $_POST['itemCodigo'];
$itemPreco = $_POST['itemPreco'];
$itemPeso = $_POST['itemPeso'];
$descricao = $_POST['descricao'];

$sql = "UPDATE tb_itens SET itemNome=:itemNome, itemCodigo=:itemCodigo, itemPreco=:itemPreco, itemPeso=:itemPeso, descricao=:descricao WHERE itemId = :itemId";

$atualizar = $conectar->prepare($sql);

$atualizar->bindParam(':itemNome', $itemNome);
$atualizar->bindParam(':itemCodigo', $itemCodigo);
$atualizar->bindParam(':itemPreco', $itemPreco);
$atualizar->bindParam(':itemPeso', $itemPeso);
$atualizar->bindParam(':descricao', $descricao);
$atualizar->bindParam(':itemId', $itemId);
$atualizar->execute();

if($atualizar > 0){
  $_SESSION['produtoAtualizado'] = "Item atualizado com sucesso!";
  header('location: ../Pages/itens.php');
}else{
    $_SESSION['produtoNaoAtualizado'] = "Erro item não atualizado";
     header('location: ../Pages/itens.php');
}
?>