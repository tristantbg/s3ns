<?php snippet('header') ?>

<?php snippet('menu') ?>

<section id="top-title" class="row ph center">
	<div class="title">
		<h1><?= $page->title()->html() ?></h1>
	</div>
</section>

<section id="video-player">
	<?= $page->link()->oembed([
  	'autoplay' => true
	]) ?>
</section>

<section id="project-details">

<?php foreach($page->builder()->toStructure() as $section): ?>
  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
<?php endforeach ?>

</section>

<?php snippet('footer') ?>