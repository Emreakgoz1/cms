<?php

$json = [];

$type = route(2);
if (!$type) {
    exit;
}
if (file_exists(admin_controller('api/' . $type))) {
    require admin_controller('api/' . $type);
}

echo json_encode($json);
