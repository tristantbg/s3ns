<?php snippet('header') ?>

<?php snippet('menu') ?>

<?php 

$projects = $page->children()->visible();
$featured = $pages->find('projects/'.$page->featured()->value());

?>

<section class="row ph">
	<div class="title center">
		We do <span id="js-words"><?= $page->tagline()->value() ?></span>.
	</div>
</section>

<section class="featured-project hero" 
<?php if ($featured->featuredimg()->isNotEmpty()): ?>
	style="background-image: url(<?= thumb($featured->image($featured->featuredimg()), array('width'=> 2100))->url() ?>)"
<?php else: ?>
	style="background-image: url(<?= thumb($featured->image($featured->thumbimg()), array('width'=> 2100))->url() ?>)"
<?php endif ?>
 >
	
		<video id="video" video autobuffer autoplay loop muted>
		<source id="mp4" src="<?= $featured->loopvideo()->toFile()->url() ?>" type="video/mp4">
		</video>
	
		<span class="overlay" href="<?= $featured->url() ?>" data-title="<?= $featured->title()->html() ?>" data-target="project">		
		</span>
		<div class="left">
			<a href="<?= $featured->url() ?>" data-title="<?= $featured->title()->html() ?>" data-target="project">
				<span class="logo">
					<img src="<?= $featured->image($featured->squarebrand())->url() ?>" width="100%" height="auto">
				</span>
				<span class="project-title">
					<h2><?= $featured->title()->html() ?></h2>
					<p><?= $featured->subtitle()->html() ?></p>
				</span>
			</a>
		</div>
		<div class="right">
			<ul>
				<li>
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo rawurlencode ($featured->link()); ?>&title=<?php echo rawurlencode ($featured->title()); ?>&summary=<?php echo rawurlencode ($featured->subtitle()); ?>&source=" target="blank" title="Share on Linkedin">
						<i class="icon-linkedin-circled"></i>
					</a>
				</li>
				<li>
					<a href="https://pinterest.com/pin/create/button/?url=<?php echo rawurlencode ($featured->link()); ?>&media=&description=<?php echo rawurlencode ($featured->subtitle()); ?>" target="blank" title="Share on Pinterest">
						<i class="icon-pinterest-circled"></i>
					</a>
				</li>
				<li>
					<a href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($featured->link()); ?>" target="blank" title="Share on Facebook">
						<i class="icon-facebook-circled"></i>
					</a>
				</li>
			</ul>	
		</div>
</section>

<section class="row projects ph">

	<?php foreach ($projects as $key => $project): ?>

	<?php if (!$project->is($featured)): ?>

		<div class="project">
		<a href="<?= $project->url() ?>" data-title="<?= $project->title()->html() ?>" data-target="project">
			<span class="project-logo center">
				<img src="<?= thumb($project->image($project->rectbrand()), array('width' => 200))->url() ?>" alt="<?= $project->title()->html() ?>" width="100%" height="auto">
			</span>
			<span class="project-subtitle center">

				<h4><?= $project->subtitle()->html() ?></h4>
				
			</span>
			<span class="video-loop">
				<video id="video" video autobuffer loop muted>
	  				<source id="mp4" src="<?= $project->loopvideo()->toFile()->url() ?>" type="video/mp4">
				</video>
				<img src="<?= thumb($project->image($project->featuredimg()), array('width' => 600))->url() ?>" alt="<?= $project->title()->html() ?>" width="100%" height="auto">
			</span>
			</a>
		</div>

	<?php endif ?>

	<?php endforeach ?>
	
</section>

<section class="row center ph">

	<div class="title center">
		We Made Sens
	</div>

	<div class="quotes">

	<?php foreach ($page->quotes()->toStructure() as $key => $quote): ?>

	<div>
		<p>« <?= $quote->text() ?> »</p>
		<h4><?= $quote->author() ?></h4>
	</div>

	<?php endforeach ?>

	</div>
	
</section>

<?php snippet('footer') ?>