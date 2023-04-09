<?php require view('static/header')?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?=setting('welcome_title')?></h1>
        <p class="lead text-muted">
            <?=setting('welcome_text')?>
        </p>
        <p>
            <a href="#" class="btn btn-primary my-2">Blog'a Gözat</a>
            <a href="#" class="btn btn-secondary my-2">İletişime Geç</a>
        </p>
    </div>
</section>
<div class="container">
    <div class="row pb-2">
        <div class="col-md-12">
            <h4 class="pb-3">Neler yapıyorum?</h4>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">PSD/Sketch to HTML</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Front-end Developer</h6>
                    <p class="card-text">Photoshop ya da .sketch dosyalarınızı gönderin, html5/css3 kodlanmış şekilde
                        geri alın.</p>
                    <a href="#" class="btn btn-sm btn-danger">Referanslara Gözat <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Web Yazılım</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Back-end Developer</h6>
                    <p class="card-text">Projelerinize hayat verip dinamiklik katıyorum. Yazılım dili olarak PHP
                        kullanıyorum.</p>
                    <a href="#" class="btn btn-sm btn-primary">Referanslara Gözat <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mobil Uygulama</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Mobile Developer</h6>
                    <p class="card-text">Native değil ama hybrid olarak istediğin projenin mobil uygulamasını yazıyorum.
                        İster react ister cordova.</p>
                    <a href="#" class="btn btn-sm btn-dark">Referanslara Gözat <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require view('static/footer')?>
