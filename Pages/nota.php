<?php 
session_start();
include_once '../Config/conection.php';
$sql = $conectar->query("SELECT * FROM tb_razaosocial");
$empresa = $sql->fetch(PDO::FETCH_OBJ);

$vendaId = $_GET['vendaId'];
$sql = $conectar->query("SELECT * FROM tb_vendas WHERE vendaId = '$vendaId'");
$venda = $sql->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - PDV</title>
	<link rel="stylesheet" type="text/css" href="../Componets/style.css">
</head>
<body>
	<div class="nota">
		<small id="razao-social">
			<strong>NOTA</strong><br>
			<?= $empresa->razaoNome;?><br>
			<?= $empresa->razaoCnpj;?><br>
			<?= $empresa->razaoFone;?><br>
			<?= $empresa->razaoEndereco;?><br>
			Venda: <?= $venda->vendaId;?><br>
			Data: <?= $venda->vendaData;?>
		</small>
		<hr>
		<table class="table-nota">
			<tr>
				<td>Qtd</td>
				<td>Item</td>
				<td>Preço</td>
			</tr>
			<?php 
			$sql = $conectar->query("SELECT * FROM tb_itens_venda ITV  JOIN tb_vendas VD ON ITV.vendaCodigo = VD.vendaId JOIN tb_itens I ON ITV.itemVenda = I.itemId WHERE vendaId = '$vendaId'");
			while($listItem = $sql->fetch(PDO::FETCH_OBJ)){?>
			<tr id="inf-nome">
				<td><?= $listItem->itemQuant;?></td>
				<td><?= $listItem->itemNome;?> <?= $listItem->itemPeso;?></td>
				<td>R$ <?= number_format($listItem->itemPreco, 2, ',', '.');?></td>
			</tr>
		<?php } ?>
			<tr>
			<td id="total-nota" colspan="3">Total:R$ <?= number_format( $venda->vendaValor, 2, ',', '.');?></td>
		    </tr>
		</table>
		<table  id="btn-imprimir">
			<tr>
			<tr id="btn-imprimir">
			<td colspan="3">
			<button id="btn-imprimir" onClick="window.print()">Imprimir</button>
		     </td>
			</tr>
		</table>
	</div>
</body>
</html>