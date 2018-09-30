<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class = "navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $site_address; ?>">
				<img src="<?php echo $logo_location; ?>" alt="Logo" class="img-responsive" id="logo">
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo $site_address; ?>/calendar">Calendar</a></li>
				<li><a href="<?php echo $site_address; ?>/tournaments">Tournaments</a></li>
				<li><a href="<?php echo $site_address; ?>/resources">Resources</a></li>
				<li><a href="<?php echo $site_address; ?>/archives">Archives</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="jumbotron">
	<div class="container">
		<h1 class="text-center"><?php echo $site_name; ?></h1>
	</div>
</div>
