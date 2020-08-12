<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
include_once '../Config/conection.php';
$usuarioId = $_GET['usuarioId'];
$sql = $conectar->query("SELECT * FROM tb_usuarios WHERE usuarioId = '$usuarioId'");
$usuario = $sql->fetch(PDO::FETCH_OBJ);
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
      <?= $_SESSION['usuarioNome'];?>
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
  <small id="nome-page"><i class="fa fa-barcode"></i> Usuários</small>
  <?php if(isset($_SESSION['usuarioNaoCatrastrado'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['usuarioNaoCatrastrado'];?>
   </div>
   <?php unset($_SESSION['usuarioNaoCatrastrado']);}?>

   <?php if(isset($_SESSION['usuarioCatrastrado'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['usuarioCatrastrado'];?>
   </div>
   <?php unset($_SESSION['usuarioCatrastrado']);}?>

    <?php if(isset($_SESSION['usuarioNaoAtualizao'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['usuarioNaoAtualizao'];?>
   </div>
   <?php unset($_SESSION['usuarioNaoAtualizao']);}?>

    <?php if(isset($_SESSION['usuarioAtualizao'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['usuarioAtualizao'];?>
   </div>
   <?php unset($_SESSION['usuarioAtualizao']);}?>

   <?php if(isset($_SESSION['usuarioNaoExcluido'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['usuarioNaoExcluido'];?>
   </div>
   <?php unset($_SESSION['usuarioNaoExcluido']);}?>


   <?php if(isset($_SESSION['usuarioExcluido'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['usuarioExcluido'];?>
   </div>
   <?php unset($_SESSION['usuarioExcluido']);}?>
  <div class="row-fluid">
    <?php if(!isset($_GET['usuarioId'])){?>
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title">
          <h5  style="color: #ffffff;">Cadastrar Usuário</h5>
        </div>
        <div class="widget-content nopadding">
         <form action="../Scripts/cadastrarUsuario.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Usuário *</label>
              <div class="controls">
                <input type="text" class="span11" name="usuarioNome" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tipo *</label>
              <div class="controls">
                <select type="text" class="span11" name="usuarioTipo" required="">
                  <option></option>
                  <option value="2">Usuário comum</option>
                  <option value="1">Adminstrador</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Código *</label>
              <div class="controls">
                <input type="password" class="span11"  name="usuarioCodigo" required="" placeholder="Apenas números" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cadastrar</button>
            </div>
          </form>
        <?php }else{?>
        <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Alterar Usuário</h5>
          </div>
          <div class="widget-content nopadding">
             <form action="../Scripts/alterarUsuario.php?usuarioId=<?= $usuario->usuarioId;?>" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Usuário </label>
              <div class="controls">
                <input type="text" class="span11" name="usuarioNome"  value="<?= $usuario->usuarioNome;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tipo </label>
              <div class="controls">
                <select type="text" class="span11" name="usuarioTipo" value="<?= $usuario->usuarioNome;?>" >
                  <?php if($usuario->usuarioTipo == 2){?>
                  <option value="2">Usuário comum</option>
                <?php }elseif ($usuario->usuarioTipo == 1) {?>
                 <option value="1">Adminstrador</option>
               <?php } ?>
                  <option value="2">Usuário comum</option>
                  <option value="1">Adminstrador</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Código </label>
              <div class="controls">
                <input type="password" class="span11"  name="usuarioCodigo" required="" placeholder="Informe seu código ou digite um novo" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar Alterações</button>
            </div>
          </form>
          </div>
        </div>
      </div>
        <?php } ?>
        </div>
      </div>
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Usuários</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th id="infor-item">Usuário <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">Tipo <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">Código <i class="fa fa-sort"></i> </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = $conectar->query("SELECT * FROM tb_usuarios");
                while($listaUsuario = $sql->fetch(PDO::FETCH_OBJ)){?>
                <tr class="gradeX" id="dados-venda">
                  <td><?= $listaUsuario->usuarioNome;?></td>
                  <td>
                    <?php if($listaUsuario->usuarioTipo == 2){
                      echo "Usuário comum";
                    }elseif($listaUsuario->usuarioTipo == 1){
                    echo "Usuário administrador";
                      }
                      ?>
                    </td>
                  <td>Secreto ***********</td>
                    <td>
                      <a href="usuario.php?usuarioId=<?= $listaUsuario->usuarioId;?>" id="icon-venda-del">
                    <i   class="fa fa-pencil"></i></a>
                    <a href="#myAlert<?= $listVenda->vendaId;?>" data-toggle="modal">
                    <i id="icon-venda-ex" class="fa fa-trash"></i></a>
                    <!-- modal excluir -->
                    <div id="myAlert<?= $listVenda->vendaId;?>" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Excluir Usuário</h3>
                        </div>
                          <div class="modal-body text-center">
                          <h4>Tem certeza que quer excluir este registro ?</h4>
                          </div>
                          <div class="modal-footer" id="btn-posicao-modal">
                          <a class="btn btn-primary" href="../Scripts/excluirUsuario.php?usuarioId=<?= $listaUsuario->usuarioId;?>">
                        <i class="fa fa-thumbs-o-up"></i> Sim Excluir</a>
                       <a data-dismiss="modal" class="btn btn-danger" href="#"><i class="fa fa-thumbs-o-down"></i> Não Cancelar</a> </div>
                    </div>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
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
<script src="../Componets/js/bootstrap-colorpicker.js"></script> 
<script src="../Componets/js/bootstrap-datepicker.js"></script> 
<script src="../Componets/js/jquery.toggle.buttons.js"></script> 
<script src="../Componets/js/masked.js"></script> 
<script src="../Componets/js/jquery.uniform.js"></script> 
<script src="../Componets/js/select2.min.js"></script> 
<script src="../Componets/js/matrix.js"></script> 
<script src="../Componets/js/matrix.form_common.js"></script> 
<script src="../Componets/js/wysihtml5-0.3.0.js"></script> 
<script src="../Componets/js/jquery.peity.min.js"></script> 
<script src="../Componets/js/bootstrap-wysihtml5.js"></script>
<script src="../Componets/js/jquery.min.js"></script> 
<script src="../Componets/js/jquery.ui.custom.js"></script> 
<script src="../Componets/js/bootstrap.min.js"></script> 
<script src="../Componets/js/jquery.uniform.js"></script> 
<script src="../Componets/js/select2.min.js"></script> 
<script src="../Componets/js/jquery.dataTables.min.js"></script> 
<script src="../Componets/js/matrix.js"></script> 
<script src="../Componets/js/matrix.tables.js"></script>

<script>
  $('.textarea_editor').wysihtml5();
</script>
</body>
</html>

