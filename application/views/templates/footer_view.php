
		<!-- Footer stuff -->
		<footer>
			
			<section class="container">
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
						<h3 class="footer-title">Latest Headlines</h3>
						<div id="latest-headlines-stream">
							<!-- Latest Headlines Stream -->
						</div>
					</div>
					
					<div class="span4">
						<div>
							<h3 class="footer-title" >Latest Tweets 
								<a href="https://twitter.com/FindMySchool" class="twitter-follow-button" data-show-count="false">@FindMySchool</a>
							</h3>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
						
						<ul id="latest-tweets-stream">
							
						</ul>
						
					</div>
				</div>
				
			</section>
			
			<section class="container footer-links">
				<hr style="border-top: 0;"/>
				<p>
					<a href="<?php echo base_url(); ?>">Home</a> 
					<a href="#">About</a> 
					<a href="#">Help</a> - 
					<a href="#">Blog</a> 
					<a href="#">Twitter</a> - 
					<a href="#">API</a> 
					<a href="#">Terms</a>
					
					<a href="http://code4kenya.org" target="_blank" class="pull-right c4k-logo" style="border-left: 1px #333 solid;">
						<img src="<?php echo base_url(); ?>assets/img/logos/c4k_2.png" alt="Code4Kenya" style="height: 40px;"/>
					</a>
					<a href="http://twaweza.org" target="_blank" class="pull-right c4k-logo" style="border-left: 1px #333 solid;">
						<img src="<?php echo base_url(); ?>assets/img/logos/twaweza.png" alt="Twaweza" style="height: 68px;">
					</a>
					<a href="http://www.knec.ac.ke" target="_blank" class="pull-right c4k-logo">
						<img src="<?php echo base_url(); ?>assets/img/logos/knec.jpg" alt="KNEC" style="height: 60px;">
					</a>
				</p>
			</section>
			
		</footer>
		
		</article>
		
		<!-- SCRIPTS -->
        
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
        
        <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.feeds.js"></script>
        <script type="text/javascript">
        
        	// Latest News Feed
        	
			jQuery.getFeed({
				url: 'https://news.google.com/news/feeds?q=kenya%20education&output=rss',
				success: function(feed) {
					var latest_headlines = "";
					for (var i = 0; i < 5; i++) {
						latest_headlines += "<p><b><a href=\"";
						latest_headlines += feed.channel.item[i].link;
						latest_headlines += "\">" + feed.channel.item[i].title;
						latest_headlines += "</a></b></p>";
					}
					$("#latest-headlines-stream").html(latest_headlines);
				}
			});
			
			// Latest Twitter Feed
			
			jQuery.getFeed({
				url: 'https://api.twitter.com/1/statuses/user_timeline/openinstitute.xml?count=5&include_rts=1callback=?',
				success: function(feed) {
					var latest_tweets = "";
					for (var i = 0; i < 5; i++) {
						latest_tweets += "<li>" + feed.status[i].text + "</li>";
					}
					$("#latest-tweets-stream").html(latest_tweets);
				}
			});
			
        </script>
    </body>
</html>