<?php 
	require './admin/model/noticiasdao.php';
	require './admin/model/conexao.php';
	use \noticiasdao\NoticiaDAO;
	$nd = new NoticiaDAO();
?>
<!DOCTYPE html>
<!---PHP--->
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Rede Strick - Servidor Minecraft 1.5.2</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
	   <script type="text/javascript" src="javascript/script.js"></script>
	   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	
	<body>
		<?php include './includes/header.php';?>
		<nav id="menu">
			<ul>
				<li class="selected">
					<a href="#">Início</a>				
				</li>
				<li>
					<a href="./loja">Loja</a>				
				</li>
				<li>
					<a href="./regras">REGRAS</a>				
				</li>
				<li>
					<a href="./discord">Discord</a>				
				</li>
				<li>
					<a href="#">STAFF</a>				
				</li>
				<div id="close"><i class="material-icons">close</i></div>
			</ul>
		</nav>

		<section>
			<div class="updates">
				<h3>Últimas notícias</h3>

				<?php
					$count = 0;
					foreach ($nd->read() as $n) {
					$count++;
					if($count <= 3):
					?>
					<article id="<?php echo $n['id']; ?>">
						<p class="titulo"><strong><?php echo $n['titulo']; ?></strong><br><?php echo $n['horario']; ?></p>
						<p class="descricao">
						<?php echo $n['descricao']; ?>
						</p>			
					</article>
					<?php
					endif;
					}

				?>
			</div>
			<div class="container">
			<div class="box rankup">
						<img src="imagens/rankup.jpg" width="100%" alt="rankup">
						<h3>RANKUP</h3>
						<p>O servidor terá 09 ranks, sendo eles: Terra, Carvão, Ferro, Lápis Azul, RedStone, Diamante, Ouro, Esmeralda e Obsidiana</p>
						<p>Observação: Cada rank tem suas suas próprias minas são compostos por 3 níveis e possuem permissões exclusivas, que não foram mencionadas aqui.</p>
			</div>
			<div class="box fullpvp">
				<img src="imagens/fullpvp.jpg" width="100%" alt="fullpvp">
				<h3>FullPvP</h3>
				<p>
				Noosso servidor fullpvp é baseado nos clássicos servers que jás foram na última década, infelizmente esse servidor ainda está em construção e não poderemos falar mais muitos sobre ele, será tudo uma grande surpresa.
				</p>
			</div>
			<div class="box factions">
				<img src="imagens/p4free.jpg" width="100%" alt="p4free">
				<h3>P4Free</h3>
				<p>
				Os servidores p4free são os servers mais lotados da 1.5.2, com melhor delay da versão com hit de grudar no tedo apenas com delo e ping 1ms o nosso servidor vem com sistemas diferenciados dos concorrentes e vamos ter ofereçer a melhor diversão com staffs 24/7.
				</p>			
			</div>
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