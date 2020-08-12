<?php session_start();
include_once 'Config/conection.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>Admin - PDV</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Componets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="Componets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="Componets/css/matrix-login.css" />
        <link href="Componets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="Componets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="Componets/style.css">
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="Scripts/login.php" method="post">
                 <div class="control-group normal_text"> <h3>Admin - PDV</h3></div>
                 <?php if(isset($_SESSION['loginVazio'])){?>
                 <div class="alert alert-danger">
                 <?= $_SESSION['loginVazio'];?>
                 </div>
                 <?php unset($_SESSION['loginVazio']);}?>

                 <?php if(isset($_SESSION['loginIncorreto'])){?>
                 <div class="alert alert-danger">
                 <?= $_SESSION['loginIncorreto'];?>
                 </div>
                 <?php unset($_SESSION['loginIncorreto']);}?>

                  <?php if(isset($_SESSION['usuarioAdminCatrastrado'])){?>
                 <div class="alert alert-success">
                 <?= $_SESSION['usuarioAdminCatrastrado'];?>
                 </div>
                 <?php unset($_SESSION['usuarioAdminCatrastrado']);}?>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="usuarioNome" placeholder="Usuário" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="fa fa-barcode"></i></span><input type="password"  name="usuarioCodigo"  placeholder="Código" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Esqueci o código</a></span>
                    <span class="pull-right"><button class="btn btn-success"> Entrar no sistema</button></span>
                </div>
            </form>
            <form id="recoverform" action="Scripts/autenticUserAdmin.php" class="form-vertical" method="post">
                <p class="normal_text">Informe o usuário administrador</p>
                
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="fa fa-user"></i></span><input type="text" name="usuarioNome" placeholder="Usuário" />
                        </div>
                    </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Voltar </a></span>
                    <span class="pull-right"><button class="btn btn-info"/>Recuperar</button></span>
                </div>
            </form>
        </div>
        
        <script src="Componets/js/jquery.min.js"></script>  
        <script src="Componets/js/matrix.login.js"></script> 
    </body>

</html>
