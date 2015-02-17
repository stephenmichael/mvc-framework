<label for="show-site-section-nav" class="show-site-section-nav btn">Blog Navigation</label>
<input type="checkbox" id="show-site-section-nav" role="button">
<nav id="site-section-nav">
    <ul>
        <li<?php echo isset($viewData['pageSubSection']) && $viewData['pageSubSection'] == 'Blog' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('Blog', 'index', 'blog'); ?></li>
        <li<?php echo isset($viewData['pageSubSection']) && $viewData['pageSubSection'] == 'Rotas' ? ' class="active"' : ''; ?>><?php echo Html::actionLink('Rotas', 'rotas', 'resources'); ?></li>
    </ul>
</nav>
