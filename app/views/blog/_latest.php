<div class="row">
    <?php
        foreach($viewData['latest'] as $key => $value) {
			echo '<div class="col bp-1 6 bp-2-4">';
            echo '<article>';
			echo '<header>';
            echo '<h3>' . $value->title . '</h3>';
            echo '<p class="text-sub-description">Posted by ' . $value->firstName . ' on ' . date("d F, Y", strtotime($value->publishedOn)) . '</p>';
			echo '</header>';
			echo Parsedown::instance()->parse($value->excerpt);
			echo '<footer>';
			echo Html::actionLink('READ MORE', $value->slug, 'blog', null, null, array("Class" => "btn btn-proceed"));
			echo '</footer>';
            echo '</article>';
            echo '</div><!--/ .col .bp-1-6 .bp-2-4 -->';
		}
		?>
</div><!--/ .row -->
