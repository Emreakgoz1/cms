<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $meta['title'] ?></title>

    <?php if (isset($meta['description'])) : ?>
        <meta name="description" content="<?= $meta['description'] ?>">
    <?php endif; ?>

    <?php if (isset($meta['keywords'])) : ?>
        <meta name="keywords" content="<?= $meta['keywords'] ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var api_url = '<?= site_url('api') ?>';
    </script>

    <script src="<?= public_url('scripts/api.js') ?>"></script>
    <link rel="stylesheet" href="<?= public_url('styles/main.css') ?>">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url() ?>"><?= setting('logo') ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php foreach (menu(1) as $key => $menu) : ?>
                        <li class="nav-item<?= isset($menu['submenu']) ? ' dropdown' : null ?>">
                            <?php if (isset($menu['submenu'])) : ?>
                                <a class="nav-link dropdown-toggle" href="<?= menu_url($menu['url']) ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $menu['title'] ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($menu['submenu'] as $k => $submenu) : ?>
                                        <a class="dropdown-item" href="<?= menu_url($submenu['url']) ?>"><?= $submenu['title'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php else : ?>
                                <a class="nav-link" href="<?= menu_url($menu['url']) ?>"><?= $menu['title'] ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <form class="form-inline my-2 my-lg-0 mr-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="<?= setting('search_placeholder') ?>" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Ara</button>
                </form>
                <?php if (session('user_id')) : ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= session('user_name') ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= site_url('profil') ?>">Profil</a>
                            <a class="dropdown-item" href="<?= site_url('cikis') ?>">Çıkış Yap</a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Giriş Yap
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= site_url('giris') ?>">Giriş Yap</a>
                            <a class="dropdown-item" href="<?= site_url('kayit') ?>">Kayıt Ol</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>