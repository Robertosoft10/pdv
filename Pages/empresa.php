<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
include_once '../Config/conection.php';
$razaoId = $_GET['razaoId'];
$sql = $conectar->query("SELECT * FROM tb_razaosocial WHERE razaoId = '$razaoId'");
$empresa = $sql->fetch(PDO::FETCH_OBJ);
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
  <small id="nome-page"><i class="fa fa-barcode"></i> Empresa</small>
  <?php if(isset($_SESSION['empresaNaoExcluido'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['empresaNaoExcluido'];?>
   </div>
   <?php unset($_SESSION['empresaNaoExcluido']);}?>

   <?php if(isset($_SESSION['empresaExcluido'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['empresaExcluido'];?>
   </div>
   <?php unset($_SESSION['empresaExcluido']);}?>

    <?php if(isset($_SESSION['empresaNaoCatrastrado'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['empresaNaoCatrastrado'];?>
   </div>
   <?php unset($_SESSION['empresaNaoCatrastrado']);}?>

    <?php if(isset($_SESSION['empresaCatrastrado'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['empresaCatrastrado'];?>
   </div>
   <?php unset($_SESSION['empresaCatrastrado']);}?>

   <?php if(isset($_SESSION['empresaNaoAtualizada'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['empresaNaoAtualizada'];?>
   </div>
   <?php unset($_SESSION['empresaNaoAtualizada']);}?>


   <?php if(isset($_SESSION['empresaAtualizada'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['empresaAtualizada'];?>
   </div>
   <?php unset($_SESSION['empresaAtualizada']);}?>
  <div class="row-fluid">
    <?php if(!isset($_GET['razaoId'])){?>
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title">
          <h5  style="color: #ffffff;">Cadastrar Empresa</h5>
        </div>
        <div class="widget-content nopadding">
         <form action="../Scripts/cadastrarEmpresa.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Razão social *</label>
              <div class="controls">
                <input type="text" class="span11" name="razaoNome" required="" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Cnpj *</label>
              <div class="controls">
                <input type="text" class="span11" name="razaoCnpj" required="" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Fone *</label>
              <div class="controls">
                <input type="text" class="span11" name="razaoFone" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">E-mail </label>
              <div class="controls">
                <input type="text" class="span11" name="razaoEmail" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Endereço *</label>
              <div class="controls">
                <input type="text" class="span11" name="razaoEndereco" required="" />
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
            <h5 style="color: #ffffff;">Alterar Empresa</h5>
          </div>
          <div class="widget-content nopadding">
             <form action="../Scripts/alterarEmpresa.php?razaoId=<?= $empresa->razaoId;?>" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Razão social </label>
              <div class="controls">
                <input type="text" class="span11" name="razaoNome" value="<?= $empresa->razaoNome;?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Cnpj </label>
              <div class="controls">
                <input type="text" class="span11" name="razaoCnpj"  value="<?= $empresa->razaoCnpj;?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Fone </label>
              <div class="controls">
                <input type="text" class="span11" name="razaoFone"  value="<?= $empresa->razaoFone;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">E-mail </label>
              <div class="controls">
                <input type="text" class="span11" name="razaoEmail"  value="<?= $empresa->razaoEmail;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Endereço </label>
              <div class="controls">
                <input type="text" class="span11" name="razaoEndereco" value="<?= $empresa->razaoEndereco;?>" />
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
            <h5 style="color: #ffffff;">Empresa</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th id="infor-item">Razão Social <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">Cnpj <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">Fone <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">E-mail <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">Endereço <i class="fa fa-sort"></i> </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = $conectar->query("SELECT * FROM tb_razaosocial");
                while($listaEmpresa = $sql->fetch(PDO::FETCH_OBJ)){?>
                <tr class="gradeX" id="dados-venda">
                  <td><?= $listaEmpresa->razaoNome;?></td>
                  <td><?= $listaEmpresa->razaoCnpj;?></td>
                  <td><?= $listaEmpresa->razaoFone;?></td>
                  <td><?= $listaEmpresa->razaoEmail;?></td>
                  <td><?= $listaEmpresa->razaoEndereco;?></td>
                    <td>
                      <a href="empresa.php?razaoId=<?= $listaEmpresa->razaoId;?>" id="icon-venda-del">
                    <i   class="fa fa-pencil"></i></a>
                    <a href="#myAlert<?= $listVenda->vendaId;?>" data-toggle="modal">
                    <i id="icon-venda-ex" class="fa fa-trash"></i></a>
                    <!-- modal excluir -->
                    <div id="myAlert<?= $listVenda->vendaId;?>" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Excluir Empresa</h3>
                        </div>
                          <div class="modal-body text-center">
                          <h4>Tem certeza que quer excluir este registro ?</h4>
                          </div>
                          <div class="modal-footer" id="btn-posicao-modal">
                          <a class="btn btn-primary" href="../Scripts/excluirEmpresa.php?razaoId=<?= $listaEmpresa->razaoId;?>">
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

