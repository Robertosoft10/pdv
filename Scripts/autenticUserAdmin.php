<?php
session_start();
require '../Config/conection.php';
$usuarioNome = $_POST['usuarioNome'];

$sql = "SELECT * FROM tb_usuarios WHERE usuarioNome = :usuarioNome";
$logar = $conectar->prepare($sql);

$logar->bindParam(':usuarioNome', $usuarioNome);
$logar->execute();
$result = $logar->fetchAll(PDO::FETCH_ASSOC);

if (count($result) <= 0)
{

  $_SESSION['loginIncorreto'] = "Usuário ou código invalidos";
  header('location: /../pdv/index.php');
    exit;
}
$result = $result[0];

$_SESSION['logged_in'] = true;
$_SESSION['usuarioId'] = $result['usuarioId'];
$_SESSION['usuarioNome'] = $result['usuarioNome'];
$_SESSION['usuarioTipo'] = $result['usuarioTipo'];
header('Location: ../Pages/Config.php');
?>