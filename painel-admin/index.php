<?php
@session_start();
require_once("verificar.php");
require_once("../conexao.php");
$id_usuario = @$_SESSION['id_usuario'];

//Trazendo dados do usuario logado
$query = $pdo->query("SELECT * FROM usuarios where id = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usu = $res[0]['nome'];
$email_usu = $res[0]['email'];
$senha_usu = $res[0]['senha'];
$cpf_usu = $res[0]['cpf'];
$cargo_usu = $res[0]['cargo'];

//MENU DO PAINEL
$pag = @$_GET['pag'];
if($pag == ""){
	$pag = 'home';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="../img/Logo_Ico-4.ico" rel="shortcut icon" type="image/x-icon">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../DataTables/datatables.min.js"></script>


	<title>Painel Administrativo</title>
</head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="../img/Logo_Ico-4.png" width="70px"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Pessoas
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=pr_presidente">Pr Presidente</a></li>
							<li><a class="dropdown-item" href="#">Usuários</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>

				</ul>
				<div class="d-flex mx-4">
					<img class="img-profile rounded-circle" src="../img/user.jpg" width="40px" height="40px">

					<ul class="navbar-nav ">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<?php echo @$nome_usu ?>
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">Editar Dados</a></li>

								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="../logout.php">Sair</a></li>
							</ul>
						</li>
					</ul>

				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid mb-4 mx-4">
		<?php require_once($pag.'.php');?>
</body>
</html>

<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-usu" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Nome</label>
								<input type="text" class="form-control" id="nome_usu" name="nome_usu" placeholder="Insira o Nome" value="<?php echo $nome_usu ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">CPF</label>
								<input type="text" class="form-control" id="cpf_usu" name="cpf_usu" placeholder="Insira o CPF" value="<?php echo $cpf_usu ?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Email</label>
								<input type="email" class="form-control" id="email_usu" name="email_usu" placeholder="Insira o Email" value="<?php echo $email_usu ?>" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Senha</label>
								<input type="text" class="form-control" id="senha_usu" name="senha_usu" placeholder="Insira a Senha" value="<?php echo $senha_usu ?>" required>
							</div>
						</div>

						<input type="hidden" name="id_usu" value="<?php echo $id_usuario ?>">

					</div>
				</div>
				<small><div align="center" id="msg-usu"></div></small>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-usu">Fechar</button>
					<button type="submit" class="btn btn-primary">Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Mascaras JS -->
<script type="text/javascript" src="../js/mascaras.js"></script>

<!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<script type="text/javascript">
	$("#form-usu").submit(function () {

	event.preventDefault();
	var formData = new FormData(this);

	$.ajax({
		url: "editar-dados.php",
		type: 'POST',
		data: formData,
		success: function (mensagem) {
            $('#msg-usu').text('');
            $('#msg-usu').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {
                    $('#btn-fechar-usu').click();
                    window.location="index.php";
                } else {
                	$('#msg-usu').addClass('text-danger')
                    $('#msg-usu').text(mensagem)
                }
            },
            cache: false,
            contentType: false,
            processData: false,
        });

});
</script>