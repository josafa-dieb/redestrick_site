<?php 
	if($_SERVER["REQUEST_URI"] == "/admin/includes/cadastrar-noticia.php"){
		header("Location: ../../admin");
		return;
	}
	require 'model/noticias.php';
	require 'model/noticiasdao.php';

	use \noticias\Noticia;
	use \noticiasdao\NoticiaDAO;

	$n = new Noticia();
	$nd = new NoticiaDAO();
	
	if(!isset($_SESSION["usuario"])){
		header("Location: ../../admin");
	}
	if(isset($_POST["enviar"])):
		$titulo = $_POST["titulo"];
		$titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
		$noticia = $_POST["noticia"];
		$noticia = filter_var($noticia, FILTER_SANITIZE_STRING);
		if($titulo and $noticia){
			$sql = "INSERT INTO redestrick_noticias (titulo, data, noticia) VALUES (?,?,?)";
			$n->setTitulo($titulo);
			$n->setDescricao($noticia);
			$nd->create($n);
		}

	endif;



?>
<div class="news">
<form id="form-noticias" method="POST">
	<h3>CADASTRAR NOVA NOTÍCIA</h3>
	<label for="titulo">Título</label>
	<input type="text" placeholder="Título da notícia" name="titulo" id="titulo">
	<label for="noticia">Notícia: </label>
	<textarea name="noticia" id="noticia" placeholder="digite seu texto, use tags html e codigos javascript ou php com moderação."></textarea>
	<label for="enviar" class="purple darken-1">SALVAR</label>
	<input type="submit" name="enviar" id="enviar">
</form>
	<ul>
		 <table style="text-align: left;" class="striped">
		 	<thead>
				<h3>Últimas notícias</h3>
			</thead>
			  <tr>
			    <th>Título</th>
			    <th>Horário</th>
			  </tr>
			  <?php 
				$count = 0;
				foreach ($nd->read() as $noticia) { 
				$count++;
				if($count <= 8):
				?>			
					<li id="<?php echo $noticia['id']; ?>">
						<?php echo "<tr><td>" . $noticia['titulo'] . "</td><td>" . $noticia['horario'] . "</td></tr>" ;?>
					</li>
				<?php 
				endif;
			} ?>
		</table> 
		
		<!---->
	</ul>
</div>