<?php snippet('header') ?>

<?php snippet('menu') ?>

<section id="top-title" class="row ph center">
	<div class="title">
		<h1><?= $page->title()->html() ?></h1>
	</div>
	<?= $page->text()->kt() ?>
</section>

<section class="row" id="founders">

<?php foreach ($page->founders()->toStructure() as $key => $founder): ?>

	<article class="center">
		<img src="<?= thumb($page->image($founder->image()), array('width' => 1000))->url() ?>" alt="<?= $founder->name()->html() ?>" width="100%" height="auto">
		<h2><strong><?= $founder->name()->html() ?></strong></h2>
		<h4><?= $founder->position()->html() ?></h4>
		<h4 class="secondary"><?= $founder->subtitle()->html() ?></h4>
	</article>

<?php endforeach ?>
	
</section>

<section class="row ph" id="numbers">
	
<?php foreach ($page->numbers()->toStructure() as $key => $number): ?>

	<article class="center">
		<div class="num" data-number="<?= $number->number()->html() ?>"><?= $number->number()->value() - 20 ?></div>
		<p><?= $number->name()->html() ?></p>
		<img src="<?= thumb($page->image($number->image()), array('width' => 30))->url() ?>" alt="<?= $founder->name()->html() ?>" width="20px" height="auto">
	</article>

<?php endforeach ?>

</section>

<section id="team">
	
	<div class="row ph">
		<?php foreach ($page->team()->toStructure() as $key => $people): ?>

			<article>
				<img src="<?= thumb($page->image($people->image()), array('width' => 300, 'height' => 300, 'crop' => true))->url() ?>" alt="<?= $people->name()->html() ?>" width="100%" height="auto">
				<h4><strong><?= $people->name()->html() ?></strong></h4>
				<h4><?= $people->position()->html() ?></h4>
			</article>

		<?php endforeach ?>
	</div>

</section>

<?php snippet('footer') ?>