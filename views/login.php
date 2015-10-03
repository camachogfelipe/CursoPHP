<?php
!defined(BASE_URL) or exit("No puede acceder directamente al script.");
?>
<form action="" method="post" accept-charset="utf-8" class="login">
	<input type="hidden" name="c" value="usuarios">
	<input type="hidden" name="f" value="login">
	<div class="form-group">
		<label for="email_input">Usuario</label>
		<input type="email" name="usuario" class="form-control" id="email_input" placeholder="Usuario">
	</div>
	<div class="form-group">
		<label for="password_input">Password</label>
		<input type="password" name="password" class="form-control" id="password_input" placeholder="Password">
	</div>
	<button type="submit" class="btn btn-default">Ingresar</button>
</form>