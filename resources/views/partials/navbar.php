
<nav class="navbar navbar-expand-lg ">
	<div class="container">
		<div class="navbar-translate">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?= route('home') ?>">Php Framework</a>
			</div>
			<button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-bar"></span>
				<span class="navbar-toggler-bar"></span>
				<span class="navbar-toggler-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= route('home') ?>" data-scroll="true">Home</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="<?= route('about') ?>" data-scroll="true">About</a>
				</li>
			</ul>
		</div>


	</div>
</nav>