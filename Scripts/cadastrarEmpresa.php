<?php
session_start();
include_once '../Config/conection.php';

$razaoNome = $_POST['razaoNome'];
$razaoCnpj = $_POST['razaoCnpj'];
$razaoFone = $_POST['razaoFone'];
$razaoEmail = $_POST['razaoEmail'];
$razaoEndereco = $_POST['razaoEndereco'];

$sql = "INSERT INTO tb_razaosocial (razaoNome, razaoCnpj, razaoFone, razaoEmail, razaoEndereco)VALUES(:razaoNome, :razaoCnpj, :razaoFone, :razaoEmail, :razaoEndereco)";

$cadastrar = $conectar->prepare($sql);

$cadastrar->bindParam(':razaoNome', $razaoNome);
$cadastrar->bindParam(':razaoCnpj', $razaoCnpj);
$cadastrar->bindParam(':razaoFone', $razaoFone);
$cadastrar->bindParam(':razaoEmail', $razaoEmail);
$cadastrar->bindParam(':razaoEndereco', $razaoEndereco);
$cadastrar->execute();
if($cadastrar > 0){
  $_SESSION['empresaCatrastrado'] = "Empresa cadastrada com sucesso!";
  header('location: ../Pages/empresa.php');
}else{
    $_SESSION['empresaNaoCatrastrado'] = "Preencha todos os campos obrigatórios";
     header('location: ../Pages/empresa.php');
}
?>