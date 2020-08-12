<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Admim - PDV</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../Componets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../Componets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../Componets/css/uniform.css" />
<link rel="stylesheet" href="../Componets/css/select2.css" />
<link rel="stylesheet" href="../Componets/css/matrix-style.css" />
<link rel="stylesheet" href="../Componets/css/matrix-media.css" />
<link href="../Componets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="../Componets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../Componets/style.css">
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="">Admin - PDV</a></h1>
</div>
<!--close-Header-part--> 
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="" class="dropdown-toggle"><span id="user"> Usuário:</span> <i id="user"  class="fa fa-user"></i>  <span id="user" class="text">
      <?= $_SESSION['userNome'];?>
    </span></a>
    </li>
     <li  class="dropdown" id="profile-messages" ><a title="" href="../Scripts/logout.php" class="dropdown-toggle"><i id="user" class="fa fa-sign-out"></i>  <span id="user" class="text"> Sair </span></a>
    </li>
  </ul>
</div>
<!--start-top-serch-->
<div id="sidebar">
  <ul>
    <li><a  id="link-left" href="pdv.php"><i class="fa fa-shopping-cart"></i> <span>Pdv</span></a> </li>
    <li><a id="link-left" href="itens.php"><i class="fa fa-barcode"></i> <span>Itens</span></a> </li>
    <li><a id="link-left" href="vendas.php"><i class="fa fa-shopping-bag"></i> <span>Vendas</span></a> </li>
    <li><a id="link-left" href="config.php"><i class="fa fa-cogs"></i> <span>Config</span></a> </li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
  </div>
  <div class="container-fluid">
    <hr>
    <small id="nome-page"><i class="fa fa-shopping-cart"></i> Config</small>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;font-size: 13pt;">Opções</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
               
              </thead>
              <tbody>
                <tr>              
                  <td>
                    <?php if($_SESSION['usuarioTipo'] == 1){?>
                    <a href="usuario.php">
                  <button class="btn btn-info"><i class="fa fa-user"></i>  Usuários<br>Sistema</button></a>
                  <a href="empresa.php">
                   <button class="btn btn-success"><i class="fa fa-home"></i> Dados <br>Empresa</button></a>
                 <?php }elseif ($_SESSION['usuarioTipo'] == 2){?>
                  <strong>Usuário não é administrador acesso negado!</strong>
                  <?php }?>
                 </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 &copy; Admin - PDV - Robertosoft10 - Todos os direitos reservados</div>
</div>
<!--end-Footer-part-->
<script src="../Componets/js/jquery.min.js"></script> 
<script src="../Componets/js/jquery.ui.custom.js"></script> 
<script src="../Componets/js/bootstrap.min.js"></script> 
<script src="../Componets/js/jquery.uniform.js"></script> 
<script src="../Componets/js/select2.min.js"></script> 
<script src="../Componets/js/jquery.dataTables.min.js"></script> 
<script src="../Componets/js/matrix.js"></script> 
<script src="../Componets/js/matrix.tables.js"></script>
</body>
</html>
