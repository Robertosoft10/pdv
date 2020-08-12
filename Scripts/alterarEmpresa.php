<?php
session_start();
include_once '../Config/conection.php';

$razaoNome = $_POST['razaoNome'];
$razaoCnpj = $_POST['razaoCnpj'];
$razaoFone = $_POST['razaoFone'];
$razaoEmail = $_POST['razaoEmail'];
$razaoEndereco = $_POST['razaoEndereco'];

$sql = "UPDATE tb_razaosocial SET razaoNome=:razaoNome, razaoCnpj=:razaoCnpj, razaoFone=:razaoFone, razaoEmail=:razaoEmail, razaoEndereco=:razaoEndereco";

$atualiza = $conectar->prepare($sql);

$atualiza->bindParam(':razaoNome', $razaoNome);
$atualiza->bindParam(':razaoCnpj', $razaoCnpj);
$atualiza->bindParam(':razaoFone', $razaoFone);
$atualiza->bindParam(':razaoEmail', $razaoEmail);
$atualiza->bindParam(':razaoEndereco', $razaoEndereco);
$atualiza->execute();
if($atualiza > 0){
  $_SESSION['empresaAtualizada'] = "Empresa atualizado com sucesso!";
  header('location: ../Pages/empresa.php');
}else{
    $_SESSION['empresaNaoAtualizada'] = "Falha empresa não atualizada";
     header('location: ../Pages/empresa.php');
}
?>