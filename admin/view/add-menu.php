<?php require admin_view('static/header') ?>

<div class="box- menu-container">
    <h2>Menü Ekle</h2>
    <form action="" method="post">
        <div style="padding-bottom: 10px; max-width: 400px">
            <input type="text" name="menu_title" value="<?= post('menu_title') ?>" placeholder="Menü Başlığı">
        </div>
        <ul id="menu" class="menu">
            <li>
                <div class="handle"></div>
                <div class="menu-item">
                    <a href="#" class="delete-menu">
                        <i class="fa fa-times"></i>
                    </a>
                    <input type="text" name="title[]" placeholder="Menü Adı">
                    <input type="text" name="url[]" placeholder="Menü Linki">
                </div>
                <div class="sub-menu">
                    <ul class="menu"></ul>
                </div>
                <a href="#" class="btn add-submenu">Alt Menü Ekle</a>
            </li>
        </ul>
        <div class="menu-btn">
            <a href="#" id="add-menu" class="btn">Menü Ekle</a>
            <button type="submit" value="1" name="submit">Kaydet</button>
        </div>
    </form>
</div>

<script>
    $(function() {

        $('#add-menu').on('click', function(e) {
            $('#menu').append('<li>\n' +
                '                    <div class="handle"></div><div class="menu-item">\n' +
                '                        <a href="#" class="delete-menu">\n' +
                '                            <i class="fa fa-times"></i>\n' +
                '                        </a>\n' +
                '                        <input type="text" name="title[]" placeholder="Menü Adı">\n' +
                '                        <input type="text" name="url[]" placeholder="Menü Linki">\n' +
                '                    </div>' +
                '<div class="sub-menu"><ul class="menu"></ul></div>\n' +
                '                    <a href="#" class="add-submenu btn">Alt Menü Ekle</a>\n' +
                '                </li>');
            $('.menu').sortable();
            e.preventDefault();
        });

        $(document.body).on('click', '.add-submenu', function(e) {
            var index = $(this).closest('li').index();
            $(this).prev('.sub-menu').find('ul').append('<li>\n' +
                '                                <div class="handle"></div><div class="menu-item">\n' +
                '                                    <a href="#" class="delete-menu">\n' +
                '                                        <i class="fa fa-times"></i>\n' +
                '                                    </a>\n' +
                '                                    <input type="text" name="sub_title_' + index + '[]" placeholder="Menü Adı">\n' +
                '                                    <input type="text" name="sub_url_' + index + '[]" placeholder="Menü Linki">\n' +
                '                                </div>\n' +
                '                            </li>');
            e.preventDefault();
        });

        $(document.body).on('click', '.delete-menu', function(e) {
            if ($('#menu li').length === 1) {
                alert('En az 1 menü içeriği kalmak zorundadır!');
            } else {
                $(this).closest('li').remove();
            }
            e.preventDefault();
        });

    });
</script>

<?php require admin_view('static/footer') ?>