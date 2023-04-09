<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        İletişim Mesajları
        <!--            <a href="#">Add New</a>-->
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th width="10">&nbsp;</th>
                <th>Ad-Soyad</th>
                <th class="hide">Konu</th>
                <th class="hide">Mesaj Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <?php if ($row['contact_read'] == 1) : ?>
                            <div style="background: green;  text-align: center;  color:  #fff; padding: 3px 6px; border-radius: 3px">
                                Okundu
                            </div>
                        <?php else : ?>
                            <div style="background: darkred; text-align: center; color: #fff; padding: 3px 6px; border-radius: 3px">
                                Okunmadı
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <p>
                            <?= $row['contact_name'] ?> ( <?= $row['contact_email'] ?>)
                        </p>
                        <?= $row['contact_phone'] ?>

                    </td>
                    <td class="hide">
                        <?= $row['contact_subject'] ?>
                    </td>
                    <td class="hide">
                        <?= timeConvert($row['contact_date']) ?>
                        <?php if ($row['contact_read_date']) :  ?>
                            <div style="color : 999; font-size: 12px;">
                                <?= timeConvert($row['contact_read_date']) ?> okundu
                                <br>
                                <strong>Okuyan:</strong><?= $row['user_name'] ?>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= admin_url('edit-contact?id=' . $row['contact_id']) ?>" class="btn">Görüntüle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')" href="<?= admin_url('delete?table=contact&column=contact_id&id=' . $row['contact_id']) ?>" class="btn">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if ($totalRecord > $pageLimit) : ?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')) ?>
        </ul>
    </div>
<?php endif; ?>

<?php require admin_view('static/footer') ?>