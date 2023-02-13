<?php
session_start();
require 'model/conexao.php';
use \model\Conexao as mysql;


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Painel administrativo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link type="text/css" rel="stylesheet" href="materialize/materialize.min.css"  media="screen,projection"/>
	</head>
<body>

	<?php
		if(isset($_POST["user"]) and !isset($_SESSION["usuario"])) {
			if(filter_var($_POST["user"], FILTER_SANITIZE_STRING)){
				$sql = "SELECT * FROM redestrick_users WHERE user = ? AND password = ?";
				// $_SESSION['usuario'] = $_POST['user'];
				$psmt = mysql::getConn()->prepare($sql);
				$psmt->bindValue(1, $_POST['user']);
				$psmt->bindValue(2, $_POST['pass']);
				$psmt->execute();
				$result = $psmt->fetchAll(\PDO::FETCH_ASSOC);
				if($result or count($result) > 0){
					$_SESSION['usuario'] = $_POST['user'];
				}
			}
			
		}

		if(!isset($_SESSION["usuario"])){
			include "includes/login-panel.php";
		} else {
			?>

				<div class="painel">
					<div class="bloco">Bem-vindo <?php echo $_SESSION["usuario"];?></div>


						<div class="opcoes">
							<ul>
								<li>
									<a href="?opcao=1">Adicionar notícia</a>
								</li>
								<li>
									<a href="?opcao=2">Editar loja</a>
								</li>
							</ul>
						</div>

						<?php
						if(isset($_GET["opcao"])){
							if($_GET["opcao"] == 1){
						?>

							<div class="noticia">
								<?php include "includes/cadastrar-noticia.php";?>
							</div>
							
						<?php
							}else if($_GET["opcao"] == 2){
						?>
							<div class="loja">
							<?php include "includes/loja-panel.php"?>
							</div>
						<?php
							}else{
								echo "Url erro!";
							}
						}
						?>
				</div>


			<?php }	?>
			<script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>