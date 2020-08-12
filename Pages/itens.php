<?php 
session_start();
include_once '../Config/conection.php';
$page_primary = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
$page = (!empty($page_primary)) ? $page_primary : 1;
$quant_page_res = 6;
$ini = ($quant_page_res * $page) - $quant_page_res; 
$sql = $conectar->query("SELECT * FROM tb_itens");
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
    <small id="nome-page"><i class="fa fa-barcode"></i> Lista de Itens</small>
  <?php if(isset($_SESSION['itemNaoExcluido'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['itemNaoExcluido'];?>
   </div>
   <?php unset($_SESSION['itemNaoExcluido']);}?>

   <?php if(isset($_SESSION['itemExcluido'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['itemExcluido'];?>
   </div>
   <?php unset($_SESSION['itemExcluido']);}?>

   <?php if(isset($_SESSION['produtoNaoAtualizado'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoNaoAtualizado'];?>
   </div>
   <?php unset($_SESSION['produtoNaoAtualizado']);}?>

    <?php if(isset($_SESSION['produtoAtualizado'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoAtualizado'];?>
   </div>
   <?php unset($_SESSION['produtoAtualizado']);}?>

<?php if(isset($_SESSION['imagemNaoAtualiza'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['imagemNaoAtualiza'];?>
   </div>
   <?php unset($_SESSION['imagemNaoAtualiza']);}?>

 <?php if(isset($_SESSION['imagemAtualiza'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['imagemAtualiza'];?>
   </div>
   <?php unset($_SESSION['imagemAtualiza']);}?>
    <a href="cadastroItem.php">
    <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Novo Item</button></a>
      <div class="row-fluid">
      <?php while($listItem = $sql->fetch(PDO::FETCH_OBJ)){ ?>
      <div class="span3">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Item</h5>
          </div>
          <div class="widget-content nopadding">
            <a href="pdv.php?acao=adItem&idItem=<?= $listItem->itemId;?>" id="link-item">
            <table class="table table-bordered">
              <td>
             <img id="imagem-item" src="<?= "../Images/". $listItem->itemImagem;?>"><br>
                <?= $listItem->itemNome;?> -
                <?= $listItem->itemPeso;?> -
                R$ <?= number_format($listItem->itemPreco, 2, ',', '.');?><br>
                 <?= $listItem->descricao;?><hr>
                <a id="edit-item" href="cadastroItem.php?itemId=<?= $listItem->itemId;?>"> 
                <i class="fa fa-pencil"></i></a>
                <a id="excluir-item" href="#myAlert<?= $listItem->itemId;?>" data-toggle="modal">
                <i class="fa fa-trash"></i></a>
                 <!-- modal excluir -->
                    <div id="myAlert<?= $listItem->itemId;?>" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Excluir venda</h3>
                        </div>
                          <div class="modal-body text-center">
                          <h4>Tem certeza que quer excluir este registro ?</h4>
                          </div>
                          <div class="modal-footer" id="btn-posicao-modal">
                          <a class="btn btn-primary" href="../Scripts/excluirItem.php?itemId=<?= $listItem->itemId;?>">
                        <i class="fa fa-thumbs-o-up"></i> Sim Excluir</a>
                       <a data-dismiss="modal" class="btn btn-danger" href="#"><i class="fa fa-thumbs-o-down"></i> Não Cancelar</a> </div>
                    </div>
                </td>
              </tbody>
            </table>
            </a>
          </div>
        </div>
      </div>
    <?php }?>
      
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
