<?php
session_start();
include_once '../Config/conection.php';
$itemId = $_GET['itemId'];
$itemImagem = $_FILES['itemImagem'];
$sql = $conectar->query("SELECT * FROM tb_itens WHERE itemId='$itemId'");
while($result = $sql->fetch(PDO::FETCH_OBJ)){
	$arquivo = $result->itemImagem;
}
unlink("../Images/$arquivo");

if(isset($_FILES['itemImagem'])){
	$extensao = strtolower(substr($_FILES['itemImagem']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/";
	move_uploaded_file($_FILES['itemImagem']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_itens SET itemImagem='$novo_nome' WHERE itemId='$itemId'";
	$atualizar = $conectar->prepare($sql);
	$atualizar->bindParam(':itemImagem', $novo_nome);
	$atualizar->execute();

if($atualizar == true){

$_SESSION['imagemAtualiza'] = "Imagem atualizada com sucesso!";
    header('location: ../pages/itens.php');
}else{
   $_SESSION ['imagemNaoAtualiza'] = "Falha imagem não atualizada";
    header('location: ../pages/itens.php');
	}
}
?>