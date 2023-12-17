<?php
require_once("../../conexao.php");
$id = @$_POST['id-excluir'];

$query = $pdo->query("DELETE FROM pr_presidente where id = '$id'");

echo 'Excluído com Sucesso';
?>