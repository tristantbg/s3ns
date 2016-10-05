</div> <!-- wrapper -->

<div id="lightbox">
	<span class="inner"></span>
	<span class="close"></span>
</div>

<footer class="row narrow phs">
		<div class="column">
			<h3>Contact</h3>
			<?= $site->contact()->kt() ?>
		</div>

		<div class="column">
			<h3>Address</h3>
			<?= $site->address()->kt() ?>
		</div>

		<div class="column">
			<div class="socials">
				<?= $site->socials()->kt() ?>
			</div>
			<nav class="languages">
				<ul>
					<?php foreach($site->languages() as $language): ?>
						<li<?php e($site->language() == $language, ' class="active"') ?>>
							<a href="<?php echo $site->url($language->code()) ?>">
								<?php echo html($language->name()) ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</nav>
		</div>
</footer>


<?php if(!$site->googleanalytics()->empty()): ?>
  <!-- Google Analytics-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '<?php echo $site->googleanalytics() ?>', 'auto');
    ga('send', 'pageview');
  </script>
<?php endif ?>
	<script>
		var $sitetitle = '<?= $site->title()->html() ?>';
		var $root = '<?= $site->url() ?>';
	</script>
	<?php
	echo js(array('assets/js/build/plugins.js', 'assets/js/build/app.min.js'));
	//echo js('@auto');
	?>

</body>
</html>