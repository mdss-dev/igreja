<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/alerta-tempo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
require_once("conexao.php");
@session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = $pdo->query("SELECT * FROM usuarios where (email = '$usuario' or cpf = '$usuario') and senha = '$senha'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

if($total_reg > 0){
	$_SESSION['nome_usuario'] = $res[0]['nome'];
	$_SESSION['id_usuario'] = $res[0]['id'];
	$_SESSION['nivel_usuario'] = $res[0]['nivel'];
	$_SESSION['cpf_usuario'] = $res[0]['cpf'];

	echo "<script>window.location='painel-admin'</script>";
}else{
  // mensage e o tempo do alerta
	echo "<script>$(function(){ alertaTempo('Dados Incorretos!!', '1500') });</script>";
}
 ?>