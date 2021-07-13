<?php
require_once 'db/koneksi.php';
require_once 'models/DataModel.php';

mysqli_set_charset($link, 'utf8');



if (isset($_GET['data']) == "get") {
    $result = get();
    $emparray = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($emparray);
}
