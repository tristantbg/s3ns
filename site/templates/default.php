<?php snippet('header') ?>

<?php snippet('menu') ?>

<section id="top-title" class="row ph center">
	<div class="title">
		<h1><?= $page->title()->html() ?></h1>
	</div>
	<?php if(!$page->text()->empty()): ?>
		<div class="description row narrow">
			<?= $page->text()->kt() ?>
		</div>
	<?php endif ?>
</section>

<?php foreach($page->builder()->toStructure() as $section): ?>
  <?php snippet('sections/' . $section->_fieldset(), array('data' => $section)) ?>
<?php endforeach ?>

<?php snippet('footer') ?>