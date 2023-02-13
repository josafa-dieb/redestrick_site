<?php 

$file = $_SERVER['PHP_SELF'];
$lojaDir = "/rede-strick/loja/index.php";
$bansDir = "/rede-strick/bans/index.php";
$inicioDir = "/rede-strick/index.php";

?>
		<main>
		<div id="open-menu">
			<?php
				if($file != $inicioDir):
					echo "<img src='../imagens/menu.png' width='70%'>";
				else:
					echo "<img src='./imagens/menu.png' width='70%'>";
				endif;
			?>
				
		</div>
		<header>
			<div class="logo">
				<?php
					if($file != $inicioDir):
						echo "<img src='../imagens/logo.png' width='70%'>";
					else:
						echo "<img src='./imagens/logo.png' width='70%'>";
					endif;
				?>
				<input type="text" value="jogar.strickpvp.com.br" id="ip">		
				<div id="copy-ip">COPIAR IP</div>
			</div>
			<!-- <div class="label">
				<h1>Rede Strick</h1>
			<p>Venha se divertir no melhor servidor de minecraft 1.5.2</p>
		</div> -->
	<div id="discord">
	</div> 
</header>