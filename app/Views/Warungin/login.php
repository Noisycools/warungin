
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login ke WarungIn</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="login">
		<a href="/"><img class="panah" src="img/panah.png" alt=""></a>
		<div><img class="imgLogin" src="img/login.png" alt=""></div>

		<div class="log">

			<img class="warungin" src="img/WarungIn.png" alt="">
			<?= view('Myth\Auth\Views\_message_block') ?>

			<form action="<?= route_to('login') ?>" method="post">
				<?= csrf_field() ?>

				<!-- <input class="inputLog" type="text" name="user" placeholder="Username"> -->
				<?php if ($config->validFields === ['email']) : ?>
					<div class="form-group">
						<label for="login"><?= lang('Auth.email') ?></label>
						<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
						<div class="invalid-feedback">
							<?= session('errors.login') ?>
						</div>
					</div>
				<?php else : ?>
					<div class="form-group">
						<input type="text" class="inputLog <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
						<div class="invalid-feedback">
							<?= session('errors.login') ?>
						</div>
					</div>
				<?php endif; ?>

				<div class="form-group">
					<input type="password" name="password" class="inputLog  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
					<div class="invalid-feedback">
						<?= session('errors.password') ?>
					</div>
				</div>

				<?php if ($config->allowRemembering) : ?>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
							<?= lang('Auth.rememberMe') ?>
						</label>
					</div>
				<?php endif; ?>

				<button type="submit" class="btn"><?= lang('Auth.loginAction') ?></button>

				<div class="strip"></div>
				<div class="btn goog"><img class="google" src="img/google.png" alt="">Login With Google</div>
				<div class="btn fb"><img class="facebook" src="img/fb.png" alt="">Login With Facebook</div>
				<div class="strip"></div>
				<div class="forgot">
					<p class="ft">Don't have an account?<a href="/register">Create one!</a></p>
				</div>
			</form>

		</div>

	</div>
	<script src="sweetalert2.all.min.js"></script>
</body>