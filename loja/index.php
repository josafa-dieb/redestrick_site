<?php 

	require '../admin/model/itemdao.php';
	require '../admin/model/conexao.php';

	use \itemdao\ItemDAO;
	$itens = new ItemDAO();

?>
<!DOCTYPE html>
<!---PHP--->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Rede Strick - Loja</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/style.css"/>
		<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
	   <script type="text/javascript" src="../javascript/script.js"></script>  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
			.container {
			margin-top: 0;
			}
		</style>
	</head>
	
	<body>
		<?php include '../includes/header.php';?>


		<script>
			<?php
				$topBuyers = array();
				foreach($itens->readBuyers() as $key => $value){
						$countador = 0;
						foreach($value as $chave => $valor){
							if( $chave != "player"){
								$player = $value['player'];
								if(is_numeric($valor)){
									$countador += $valor;
								}
							}
						}
						$topBuyers[$player] = $countador;
				}
				arsort($topBuyers);
				foreach($topBuyers as $key => $value){
					$jsonFile = file_get_contents('https://api.mojang.com/users/profiles/minecraft/' . $key);
					$url = "https://i.imgur.com/4M02vuy.png";
					$nickName = $key;
					if($jsonFile){
						$jsonDec = json_decode($jsonFile);
						foreach($jsonDec as $k => $f) {
							if($k == 'name'){
								$nickName = $f;
							}
							if($k == 'id'){
								$url = "https://crafatar.com/avatars/" . $f;
							}
						}
					}
					$content = "<div class='buyer'><img src=".$url." width='40px'></img><p>". $nickName. "</p><span>R$ " . $value . " </span></div>";
					?>
					document.getElementById('discord').innerHTML += `<?php echo $content;?>`;
					<?php
				}
			?>
		</script>
		
		<style>
			.buyer{
				display: block;
				padding: 10px;
				margin: 10px;
				position: relative;
				color: #333;
				font-weight: 700;
			}
			.buyer img{
				display: inline;
				position: relative;
				padding: 0 !important;
				margin: 0 !important;
			}
			.buyer p {
				display: inline;
				position: relative;
				font-size: 20px;
				padding: 10px;
			}
			.buyer span {
				display: inline;
				position: absolute;
				right: 10px;
				padding: 10px;
				margin: 0;
				color: white;
				border-radius: 5px;
				width: 100px;
				background: green;
				text-align: center;
			}
			.buyer:nth-child(odd) {
				background: #ddd;
			}
		</style>
		<nav id="menu">
			<ul>
				<li>
					<a href="../">Início</a>				
				</li>
				<li  class="selected">
					<a href="#">Loja</a>				
				</li>
				<li>
					<a href="../regras">REGRAS</a>				
				</li>
				<li>
					<a href="../discord">Discord</a>				
				</li>
				<li>
					<a href="#">STAFF</a>				
				</li>
				<div id="close"><i class="material-icons">close</i></div>
			</ul>
		</nav>
		<div id="dropdown">
			<div id="close-dropdown">X</div>
		</div>
		<section>
			<div class="container">
				<?php 
					$itens = $itens->read();
					foreach ($itens as $valor) {
						include "../includes/item.php";
					}
				?>
			</div>
		</section>

		
		<footer>
				<ul>
					<li>Facebook</li>
					<li>Instagram</li>
					<li>Twitter</li>
					<li>Discord</li>		
				</ul>
				<p>&copy; <a href="https://k00per.dev">K00PER.DEV</a> - all right reserved.</p>
		</footer>
		</main>	
	
	</body>
</html>
