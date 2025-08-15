<nav aria-label="breadcrumb" class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo \Core\View::url(); ?>">Home</a>
        </li>
        <?php if (!empty($breadcrumb)): ?>
            <?php foreach ($breadcrumb as $index => $crumb): ?>
                <?php if ($index === count($breadcrumb) - 1): ?>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo \Core\View::escape($crumb['title']); ?>
                    </li>
                <?php else: ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo \Core\View::url($crumb['url']); ?>">
                            <?php echo \Core\View::escape($crumb['title']); ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </ol>
</nav>