<?php
// Get Site Section Nav ($url, $viewData, $attributes)
Html::getNav('blog/_nav', $viewData);
?>

<div class="row page-content">
    <div class="col bp-2-8 col-centered">
        <section>
            <h1>Blog</h1>

            <?php
            foreach($viewData['posts'] as $key => $value) {
                echo '<article>';
		echo '<header>';
                echo '<p class="article-date">Posted by ' . $value->firstName . ' on ' . date("d F, Y", strtotime($value->publishedOn)) . '</p>';
                echo '<h2 class="article-title">' . $value->title . '</h2>';
		echo '</header>';
		echo Parsedown::instance()->parse($value->excerpt);
		echo '<footer>';
		echo '<div class="article-read-more">' . Html::actionLink('Read More <i class="fa fa-long-arrow-right"></i>', $value->slug, 'blog') . '</div>';
		echo '</footer>';
                echo '</article>';
                echo '<div class="article-seperator"></div>';
	    }
	    ?>
        </section>
    </div><!--/ .col .bp-2-8 .col-centered -->
</div><!--/ .row .page-content -->
