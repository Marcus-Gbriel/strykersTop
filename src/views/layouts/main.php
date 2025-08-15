<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'StrykersNet'; ?></title>
    <meta name="description" content="<?php echo $description ?? 'Aplicação web desenvolvida com PHP'; ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo \Core\View::url('assets/css/style.css'); ?>" rel="stylesheet">

    <?php if (isset($additionalCSS)): ?>
        <?php foreach ($additionalCSS as $css): ?>
            <link href="<?php echo \Core\View::url($css); ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <!-- Header -->
    <?php \Core\View::partial('header', ['currentPage' => $currentPage ?? 'home']); ?>

    <!-- Main Content -->
    <main class="container-fluid">
        <?php if (isset($showBreadcrumb) && $showBreadcrumb): ?>
            <?php \Core\View::partial('breadcrumb', ['breadcrumb' => $breadcrumb ?? []]); ?>
        <?php endif; ?>

        <?php if (isset($alerts)): ?>
            <?php foreach ($alerts as $alert): ?>
                <div class="alert alert-<?php echo \Core\View::escape($alert['type']); ?> alert-dismissible fade show" role="alert">
                    <?php echo \Core\View::escape($alert['message']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php echo $content; ?>
    </main>

    <!-- Footer -->
    <?php \Core\View::partial('footer'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo \Core\View::url('assets/js/app.js'); ?>"></script>

    <?php if (isset($additionalJS)): ?>
        <?php foreach ($additionalJS as $js): ?>
            <script src="<?php echo \Core\View::url($js); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>