<div class="row page-content">
    <div class="col bp-1-6 col-centered text-center">
        <section>
        	<i class="fa fa-frown-o icon-error"></i>
        
        	<h1>We're sorry...</h1>
        	<h3>The page you are looking for cannot be found.</h3>
        
        	<p>If you typed the address, please double check the spelling.</p>
        
       	 	<p>If you followed a link from somewhere, please let us know by using our <?php echo Html::actionLink('contact form', 'contact', 'about', 'HTTPS'); ?>. Be sure to let us know where you came from and what you were looking for, and we'll do our best to fix it.</p>
        
        	<?php echo Html::actionLink('Return to the homepage', 'index', 'home', 'HTTP', null, array("Class"=>"btn btn-primary")); ?>
    	</section>
    </div><!--/ .col .bp-1-6 .col-centered .text-center -->
</div><!--/ .row .page-content -->
