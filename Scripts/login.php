<?php
session_start();
require '../Config/conection.php';
$usuarioNome = $_POST['usuarioNome'];
$usuarioCodigo =  sha1($_POST['usuarioCodigo']);

if (empty($usuarioNome) || empty($usuarioCodigo))
{
    $_SESSION['loginVazio'] = "Informe o usuário";
  header('location: /../pdv/index.php');
    exit;
}

$sql = "SELECT * FROM tb_usuarios WHERE usuarioNome = :usuarioNome AND usuarioCodigo = :usuarioCodigo";
$logar = $conectar->prepare($sql);

$logar->bindParam(':usuarioNome', $usuarioNome);
$logar->bindParam(':usuarioCodigo', $usuarioCodigo);
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
header('Location: ../Pages/pdv.php');
?>