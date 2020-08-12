<?php
session_start();
include_once '../Config/conection.php';

$itemNome = $_POST['itemNome'];
$itemCodigo = $_POST['itemCodigo'];
$itemPreco = $_POST['itemPreco'];
$itemPeso = $_POST['itemPeso'];
$itemImagem = $_FILES['itemImagem'];
$descricao = $_POST['descricao'];


if(isset($_FILES['itemImagem'])){
            $extensao = strtolower(substr($_FILES['itemImagem']['name'], -4));
            $novo_nome = sha1(time()) . $extensao;
            $diretorio = "../Images/";
            move_uploaded_file($_FILES['itemImagem']['tmp_name'], $diretorio.$novo_nome);

$sql = "INSERT INTO tb_itens (itemNome, itemCodigo, itemPreco, itemPeso, itemImagem, descricao)VALUES(:itemNome, :itemCodigo, :itemPreco, :itemPeso, :itemImagem, :descricao)";

$cadastrar = $conectar->prepare($sql);

$cadastrar->bindParam(':itemNome', $itemNome);
$cadastrar->bindParam(':itemCodigo', $itemCodigo);
$cadastrar->bindParam(':itemPreco', $itemPreco);
$cadastrar->bindParam(':itemPeso', $itemPeso);
$cadastrar->bindParam(':itemImagem', $novo_nome);
$cadastrar->bindParam(':descricao', $descricao);

$cadastrar->execute();
}
if($cadastrar > 0){
  $_SESSION['produtoCatrastrado'] = "Item cadastrado com sucesso!";
  header('location: ../Pages/cadastroItem.php');
}else{
    $_SESSION['produtoNaoCatrastrado'] = "Preencha todos os campos obrigatórios";
     header('location: ../Pages/cadastroItem.php');
}
?>