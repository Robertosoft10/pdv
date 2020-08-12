<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
include_once '../Config/conection.php';
$itemId = $_GET['itemId'];
$sql = $conectar->query("SELECT * FROM tb_itens WHERE itemId = '$itemId'");
$item = $sql->fetch(PDO::FETCH_OBJ);
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
  <small id="nome-page"><i class="fa fa-barcode"></i> Item</small>
  <?php if(isset($_SESSION['produtoNaoCatrastrado'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoNaoCatrastrado'];?>
   </div>
   <?php unset($_SESSION['produtoNaoCatrastrado']);}?>

   <?php if(isset($_SESSION['produtoCatrastrado'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoCatrastrado'];?>
   </div>
   <?php unset($_SESSION['produtoCatrastrado']);}?>
  <div class="row-fluid">
    <?php if(!isset($_GET['itemId'])){?>
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title">
          <h5  style="color: #ffffff;">Cadastrar Item</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="../Scripts/cadastrarItem.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Item *</label>
              <div class="controls">
                <input type="text" class="span11" name="itemNome" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Código *</label>
              <div class="controls">
                <input type="text" class="span11" name="itemCodigo" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Preço *</label>
              <div class="controls">
                <input type="text" class="span11"  name="itemPreco" placeholder="Ex: 1 ou 1.20 Não usar virgula usar ponto" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Peso / Litro *</label>
              <div class="controls">
                <input type="text" class="span11" name="itemPeso"  required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Imagem *</label>
              <div class="controls">
                <input type="file" class="span11" name="itemImagem" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Descrição</label>
              <div class="controls">
                <textarea type="text" class="span11" name="descricao"></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cadastrar</button>
            </div>
          </form>
        <?php }else{?>
        <div class="span7">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Alterar Item</h5>
          </div>
          <div class="widget-content nopadding">
           <form action="../Scripts/alterarDadosItem.php?itemId=<?= $item->itemId;?>" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Item </label>
              <div class="controls">
                <input type="text" class="span11" name="itemNome"
                value="<?= $item->itemNome;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Código </label>
              <div class="controls">
                <input type="text" class="span11" name="itemCodigo"
                value="<?= $item->itemCodigo;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Preço </label>
              <div class="controls">
                <input type="text" class="span11"  name="itemPreco"
                 value="<?= $item->itemPreco;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Peso / Litro</label>
              <div class="controls">
                <input type="text"  class="span11" name="itemPeso" value="<?= $item->itemPeso;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Descrição</label>
              <div class="controls">
                <textarea type="text" class="span11" name="descricao">
                  <?= $item->descricao;?>
                </textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar Alterações</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <div class="span5">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Alterar Item</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="../Scripts/alterarImagemItem.php?itemId=<?= $item->itemId;?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <img id="imagem-item" src="<?= "../Images/". $item->itemImagem;?>">
            <div class="control-group">
              <label class="control-label">Alterar Imagem </label>
               <input type="file" class="span11" name="itemImagem" required="" />
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
<script>
  $('.textarea_editor').wysihtml5();
</script>
</body>
</html>

