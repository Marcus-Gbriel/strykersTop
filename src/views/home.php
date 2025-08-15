<div class="row">
    <div class="col-12">
        <div class="hero-section bg-light rounded p-5 mb-4">
            <h1 class="display-4">Bem-vindo ao StrykersNet!</h1>
            <p class="lead">
                <?php echo \Core\View::escape($welcomeMessage ?? 'Esta é a página inicial da nossa aplicação.'); ?>
            </p>
            <hr class="my-4">
            <p>Explore nossa aplicação e descubra todas as funcionalidades disponíveis.</p>
            <a class="btn btn-primary btn-lg" href="<?php echo \Core\View::url('about'); ?>" role="button">
                Saiba mais
            </a>
        </div>
    </div>
</div>

<?php if (isset($features) && !empty($features)): ?>
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">Principais Funcionalidades</h2>
    </div>
    <?php foreach ($features as $feature): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php if (isset($feature['icon'])): ?>
                            <i class="<?php echo \Core\View::escape($feature['icon']); ?>"></i>
                        <?php endif; ?>
                        <?php echo \Core\View::escape($feature['title']); ?>
                    </h5>
                    <p class="card-text"><?php echo \Core\View::escape($feature['description']); ?></p>
                    <?php if (isset($feature['link'])): ?>
                        <a href="<?php echo \Core\View::url($feature['link']); ?>" class="btn btn-outline-primary">
                            Saiba mais
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<?php if (isset($showStats) && $showStats && isset($stats)): ?>
<div class="row mt-5">
    <div class="col-12">
        <h2 class="mb-4">Estatísticas</h2>
    </div>
    <?php foreach ($stats as $stat): ?>
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title text-primary"><?php echo \Core\View::escape($stat['value']); ?></h3>
                    <p class="card-text"><?php echo \Core\View::escape($stat['label']); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
