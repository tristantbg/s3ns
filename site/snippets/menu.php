<?php 

$projects = page('projects');
$about = page('about-us');
$team = page('team');
$contact = page('contact');

?>

<header>
	
	<ul class="main-nav">
		<li><a href="<?= $projects->url() ?>"><?= $projects->title()->html() ?></a></li>
		<li><a href="<?= $about->url() ?>"><?= $about->title()->html() ?></a></li>
		<li class="logo">
			<a href="<?= $site->url() ?>">
				<h1><?= $site->title()->html() ?></h1>
			</a>
		</li>
		<li><a href="<?= $team->url() ?>"><?= $team->title()->html() ?></a></li>
		<li><a href="<?= $contact->url() ?>"><?= $contact->title()->html() ?></a></li>
		<li class="menu-toggle">Menu</li>
	</ul>

</header>

<nav class="mobile-menu">
	<ul>
		<li><a href="<?= $projects->url() ?>"><?= $projects->title()->html() ?></a></li>
		<li><a href="<?= $about->url() ?>"><?= $about->title()->html() ?></a></li>
		<li><a href="<?= $team->url() ?>"><?= $team->title()->html() ?></a></li>
		<li><a href="<?= $contact->url() ?>"><?= $contact->title()->html() ?></a></li>
	</ul>
	<span class="close"></span>
</nav>

<div id="wrapper">