<?php
@session_start();
if(@$_SESSION['nivel_usuario'] != 'pr_presidente'){
	echo "<script>window.location='../index.php'</script>";
}

 ?>