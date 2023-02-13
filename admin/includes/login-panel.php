<?php
	if($_SERVER["REQUEST_URI"] == "/admin/includes/login-panel.php"){
		header("Location: ../../admin");
		return;
	}
?>
<div class="container">
		<form method="POST">
			<h2>PAINEL</h2>
			<label for="user">Usuário</label>
			<input type="text" maxlength="10" placeholder="usuário" name="user" id="user">
			<label for="pass">Senha</label>
			<input type="password" minlength="8" placeholder="senha" name="pass" id="pass">
			<label for="logar">LOGIN</label>
			<input type="submit" hidden name="logar" id="logar">
	</form>
</div>