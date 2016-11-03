</div> <!-- wrapper -->

<div id="lightbox">
	<span class="inner"></span>
	<span class="close"></span>
	<span class="more"></span>
</div>

<footer class="row narrow">
		<div class="column">
			<h3>Contact</h3>
			<?= $site->contact()->kt() ?>
		</div>

		<div class="column">
			<h3><?= l::get('address') ?></h3>
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
			<form action="//sensvideo.us13.list-manage.com/subscribe/post?u=84f5011370722e8a87eecb846&amp;id=7b382b3939" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<div id="mc_embed_signup_scroll">
					<div class="mc-field-group">
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Newsletter">
					</div>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7230e51d7a0195caebabf65b5_be0044ad85" tabindex="-1" value=""></div>
					<div class="submit"><input type="submit" value="Ok" name="subscribe" id=""></div>
				</div>
			</form>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			
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