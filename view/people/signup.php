<div class = "container">
	<div class ="login-form col-md-4 offset md-4">
		<h2>Sing up</h2>
<form method="post" action="?r=people/confirm">
	<div class = "form-group">
		<label name="name">Username :</label>
		<input type="text" name="name" value="<?php echo $data['name']; ?>" class= "form-control"/>
	</div>
	<div class = "form-group">
	<label name="email">Email address :</label>
	<input type="text" name="email1" value="<?php echo $data['email1']; ?>" class= "form-control"/>
</div>
<div class = "form-group">
<label name="email2">Confirm email address :</label>
<input type="text" name="email2" value="<?php echo $data['email2']; ?>" class= "form-control"/>
</div>
<div class = "form-group">
	<label name="password">Password</label>
	<input type="password" name="password1" class= "form-control"/>
</div>
<div class = "form-group">
	<label name="password2">Confirm password</label>
	<input type="password" name="password2" class= "form-control"/>
</div>
<button type="submit" name ="action" value="Sign up" class = "btn btn-primary btn-block"> Sing up </button>

</form>
