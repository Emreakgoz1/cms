<?php require view('static/header') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $row['page_title'] ?></h1>
        <div class="breadcrumb-custom">
            <a href="<?= site_url() ?>">Anasayfa</a> /
            <a href="<?= site_url('sayfa/' . $row['page_title']) ?>" class="active"><?= $row['page_title'] ?></a>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <?= htmlspecialchars_decode($row['page_content']) ?>
        </div>

    </div>
</div>

<?php require view('static/footer') ?>