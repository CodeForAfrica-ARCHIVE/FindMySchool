<section class="container sign-up">
	<div class="row" style="margin-top: 60px;">
		<div class="well span6 offset3">
			<p class="lead"><?= $action ?></p>
			<hr>
			<p><?= $intro ?></p>
			<div class="social-login">
				<a href="<?php echo base_url(); ?>login/github" class="btn btn-large btn-block"><?= $action ?> with Github  <img src="<?php echo base_url(); ?>assets/img/logos/github1.png" alt=""/></a>
				<a href="<?php echo base_url(); ?>login/twitter?authenticate=1" class="btn btn-large btn-block"><?= $action ?> with Twitter <img src="<?php echo base_url(); ?>assets/img/logos/twitter1.png" alt=""/></a>
				<a href="<?php echo base_url(); ?>login/linkedin" class="btn btn-large btn-block"><?= $action ?> with Linked In  <img src="<?php echo base_url(); ?>assets/img/logos/linkedin1.png" alt=""/></a>
			</div>
		</div>
	</div>
	<p><?= $end ?></p>
</section>

<!-- TOS, Privacy - Modal -->
<div class="modal hide fade" id="TOSPrvcyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Terms Of Service & Privacy Policy</h3>
	</div>
	<div class="modal-body">
		<div class="btn-group" data-toggle="buttons-radio" style="text-align: center;">
			<a href="#tos" data-toggle="tab" class="btn btn-primary active">Terms Of Service</a>
			<a href="#privacy" data-toggle="tab" class="btn btn-primary">Privacy Policy</a>
		</div>
		<hr style="margin-bottom: 0px;">
		<div class="tab-content">
			<div class="tab-pane active" id="tos">
				<h4>Terms Of Service</h4>
			</div>
			<div class="tab-pane" id="privacy">
				<h4>Privacy Policy</h4>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>