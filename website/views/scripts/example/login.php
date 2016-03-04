<?php
$this->layout()->setLayout( 'default' );

?>

<div class="container-fluid">
	<div class="container">
		<form class="form-signin" method="post">
			<h2 class="form-signin-heading">Please sign in</h2>
			<?php if( count( $this->error ) > 0 ){ ?>
				<div class="alert alert-warning"><?= $this->error['user']; ?></div>
			<?php } ?>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			<a class="btn btn-lg btn-primary btn-block" href="<?= $this->getProperty('register-url') ?>">Register</a>
		</form>
	</div>
</div>