<?php
if(kirby()->request()->ajax()) {
	$pageMaster = page($uri);
	$page = $pageMaster->content();
	$site = site();
	?>

	<section class="row ph center">
		<div class="title">
			<h1><?= $page->title()->html() ?></h1>
		</div>
	</section>

	<section id="video-player">
		<?= $page->link()->oembed([
			'autoplay' => true
			]) ?>
	</section>
	
	<section id="more-info">
	<?php foreach($page->builder()->toStructure() as $section): ?>
		<?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
	<?php endforeach ?>
	</section>

<?php
}
else {
	header::status('404');
}