<?php
if (!session_id()) session_start();
require_once '../app/init.php'; //teknik botstrapping, yang artinya memanggil satu file dan akan terpanggil semua file yang dibutuhkan
$app = new App;
