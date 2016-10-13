<?php $size = $data->size()->int(); ?>

<section class="row ph numbers-builder">

	<article class="center">
		<div class="num"><?= $data->number1()->value() ?></div>
		<h2><?= $data->title1()->html() ?></h2>
	</article>
	
<?php if ($size > 1): ?>

	<article class="center">
		<div class="num"><?= $data->number2()->value() ?></div>
		<h2><?= $data->title2()->html() ?></h2>
	</article>

<?php endif ?>

<?php if($size > 2): ?>

	<article class="center">
		<div class="num"><?= $data->number3()->value() ?></div>
		<h2><?= $data->title3()->html() ?></h2>
	</article>

<?php endif ?>

<?php if($size > 3): ?>

	<article class="center">
		<div class="num"><?= $data->number4()->value() ?></div>
		<h2><?= $data->title4()->html() ?></h2>
	</article>

<?php endif ?>

</section>