<?php
$this->layout()->setLayout( 'default' );

$this->jsConfig()->add([
	'rForm' => true
]);

?>

<div class="container-fluid register-form">
	<div class="container">
		<div class="row">
			<?= (is_array($this->error) && $this->error['user'] != '') ? '<div class="alert alert-danger">' . $this->error['user'] . '</div>' : ''; ?>
			<div class="panel panel-primary">
				<div class="panel-body">
					<form method="post" action="/404" role="form">
						<input type="hidden" name="sendRegister" value="1" />
						<div class="form-group">
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName">Username</label>
							<input id="signupName" type="text" maxlength="50" class="form-control" name="username" value="<?= $this->escape( $this->getParam('username') ) ?>">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">E-Mail *</label>
							<input id="signupEmail" type="email" maxlength="50" class="form-control" name="email" value="<?= $this->escape( $this->getParam('email') ) ?>">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPassword">Password *</label>
							<input id="signupPassword" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40" name="password">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPasswordagain">Password again *</label>
							<input id="signupPasswordagain" type="password" maxlength="25" class="form-control" name="passwordControl">
						</div>
						<div class="form-group">
							<button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your account
							</button>
						</div>
						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and
							our
							<a href="#">Privacy Policy</a>.</p>
						<hr>
						<p></p>Already have an account? <a href="#">Sign in</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

