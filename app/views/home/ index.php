<section id="hero">
    <img class="image-responsive" src="http://placehold.it/800x500&text=[image]" />
</section>

<section id="homeBlog" class="section-content">
    <div class="row">
        <div class="col col-centered bp-1-10 bp-2-8 text-center">
        	<h2 class="section-title">From the Blog</h2>
        	<p class="section-text">Stories, thoughts and articles on what is happening</p>
    	</div><!--/ .col .col-centered .bp-1-10 .bp-2-8 .text-center -->
    </div><!--/ .row -->
    
    <?php new Partial('blog/getLatest'); ?>
</section><!--/ .#homeBlog .section-content -->
