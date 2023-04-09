<?php

$query = $db->prepare('SELECT * FROM menu ORDER BY menu_id DESC');
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('menu');