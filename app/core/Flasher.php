<?php
class Flasher
{
    public static function set_flash($msg, $action, $type)
    {
        $_SESSION['flash'] = [
            "pesan" => $msg,
            "aksi" => $action,
            "tipe" => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo "<div class='alert alert-" . $_SESSION['flash']['tipe'] . " alert-dismissible fade show' role='alert'>
            Data mahasiswa " . $_SESSION['flash']['pesan'] . " " . $_SESSION['flash']['aksi'] . "
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            unset($_SESSION['flash']);
        }
    }
}
