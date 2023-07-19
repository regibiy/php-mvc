<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data["judul"] = "Daftar Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->get_all_mahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $data["judul"] = "Detail Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->get_mahasiswa_by_id($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }

    public function tambah()
    {
        if ($this->model("Mahasiswa_model")->tambah_data_mahasiswa($_POST) > 0) {
            Flasher::set_flash("Berhasil", "Ditambahkan", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::set_flash("Gagal", "Ditambahkan", "danger");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("Mahasiswa_model")->hapus_data_mahasiswa($id) > 0) {
            Flasher::set_flash("Berhasil", "Dihapus", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::set_flash("Gagal", "Dihapus", "danger");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model("Mahasiswa_model")->get_mahasiswa_by_id($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model("Mahasiswa_model")->ubah_data_mahasiswa($_POST) > 0) {
            Flasher::set_flash("Berhasil", "Diubah", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::set_flash("Gagal", "Diubah", "danger");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function cari()
    {
        $data["judul"] = "Daftar Mahasiswa";
        $data['mhs'] = $this->model("Mahasiswa_model")->cari_data_mahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }
}
