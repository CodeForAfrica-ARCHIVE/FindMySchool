
		<!-- Footer stuff -->
		<footer>
			
			<section class="container" style="padding: 20px 0 0px;">
				<div class="row">
					<div class="span4">
						<h3 class="footer-title">Recent Visualizations</h3>
						<ul class="media-list">
							<?php foreach (array(0,1,2,3) as $visualization) { ?>
								<li class="media">
									<a class="pull-left" href="#">
										<img class="media-object" data-src="<?php echo base_url(); ?>assets/js/vendor/holder.js/64x64">
									</a>
									<div class="media-body">
										<h4 class="media-heading">Media heading</h4>
										<p>...</p>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="span4">
						<h3 class="footer-title">Latest News</h3>
					</div>
					<div class="span4">
						<h3 class="footer-title">Latest Tweets</h3>
						<hr />
						<div style="text-align: center;">
							<h3 style="color: #555;">Share FMS.Ke</h3>
							<p>
								<a href="javascript:void(0);" name="Share_TW" title="Share on Twitter | FMS Ke" onclick="javascript:window.open('http://twitter.com/home?status=Find%20My%20School%20Ke%20-%20http://findmyschool.co.ke%20%23FMSke','FMS.Ke','width=550,height=270');">
									<img src="<?php echo base_url(); ?>assets/img/social/twitter.png" alt="Share on Twitter"></a>
								<a href="javascript:void(0);" name="Share_FB" title="Share on FB | FMS Ke" onclick="javascript:window.open('http://www.facebook.com/sharer.php?u=http%3A%2F%2Ffindmyschool.co.ke','FMS.Ke','width=550,height=270');">
									<img src="<?php echo base_url(); ?>assets/img/social/facebook.png" alt="Share on Facebook"></a>
								<a href="https://plus.google.com/share?url=findmyschool.co.ke" onclick="javascript:window.open(this.href,
								  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
								  <img src="<?php echo base_url(); ?>assets/img/social/googleplus.png" alt="Share on Google Plus"></a>
							</p>
						</div>
					</div>
				</div>
			</section>
			
			<section class="container">
				<hr>
				<p>
					<a href="<?php echo base_url(); ?>">Home</a> 
					<a href="#">About</a> 
					<a href="#">Help</a> - 
					<a href="#">Blog</a> 
					<a href="#">Twitter</a> - 
					<a href="#">API</a> 
					<a href="#">Terms</a>
					<a href="http://code4kenya.org" class="pull-right c4k-logo"><img src="<?php echo base_url(); ?>assets/img/logos/c4k_1.png" alt="Code4Kenya" /></a>
				</p>
			</section>
			
		</footer>
		
		</article>
        
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/vendor/holder.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-33350783-3'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>