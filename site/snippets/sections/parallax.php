<?php $slides = $site->parallax()->toStructure() ?>

<?php if($site->parallaxtitle()->isNotEmpty()): ?>
	<section class="row narrow center parallax-title">
		<h2><?= $site->parallaxtitle() ?></h2>
	</section>
<?php endif ?>

<section id="pin-container">
	<?php foreach ($slides as $key => $slide): ?>
		<section class="parallax-slide">
			<div class="content" data-wipe="<?= $slide->anim() ?>">
			<div class="column">
				<div class="inner">
				<?php if($slide->visual()->isNotEmpty()): ?>
					<img src="<?= thumb($site->image($slide->visual()), array('width' => 500))->url() ?>" width="50%" height="auto">
				<?php endif ?>
					<h2><?= $slide->maintitle()->html() ?></h2>
				</div>
			</div>
			<div class="column">
				<div class="inner">
				<?php if($slide->subtitle()->isNotEmpty()): ?>
					<h2><?= $slide->subtitle()->html() ?></h2>
					<span class="separator">—</span>
				<?php endif ?>
					<?= $slide->text()->kt() ?>
				</div>
			</div>
			</div>
		</section>
	<?php endforeach ?>
</section>