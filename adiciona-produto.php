<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

verificaUsuario();

$nome =  $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria_id"];

if(array_key_exists("usado", $_POST)) :
	$usado = "true";
else :
	$usado = "false";
endif;

if(insereProduto($conexao, $nome, $preco, $descricao, $categoria, $usado)) : 
	$_SESSION["success"] = "Produto {$nome}, {$preco}, adicionado com sucesso!";
	header("Location: produto-lista.php");
	die();
else :
	$msg = mysqli_error($conexao);
?>
<p class="text-danger">
Produto <?=  $nome; ?>, <?= $preco; ?> não foi adicionado: <?= $msg ?>
</p>
<?php
	endif;	
?>
<?php require_once("rodape.php"); ?>
	
