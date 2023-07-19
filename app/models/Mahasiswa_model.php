<?php
class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "nama" => "Regi Ridho Biyantomo",
    //         "npm" => "19412550",
    //         "prodi" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Charles Ardy Mikhadika",
    //         "npm" => "19412548",
    //         "prodi" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Willy Wiljaya",
    //         "npm" => "19412568",
    //         "prodi" => "Sistem Informasi"
    //     ]
    // ];

    private $table = "mahasiswa";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_all_mahasiswa()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->result_set();
    }

    public function get_mahasiswa_by_id($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambah_data_mahasiswa($data)
    {
        $sql = "INSERT INTO mahasiswa (npm, nama, prodi) VALUES (:npm, :nama, :prodi)";
        $this->db->query($sql);
        $this->db->bind("npm", $data['npm']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("prodi", $data['prodi']);

        $this->db->execute();

        return $this->db->row_count();
    }

    public function hapus_data_mahasiswa($id)
    {
        $sql = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->row_count();
    }

    public function ubah_data_mahasiswa($data)
    {
        $sql = "UPDATE mahasiswa SET npm = :npm, nama = :nama, prodi = :prodi WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind("npm", $data['npm']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("prodi", $data['prodi']);
        $this->db->bind("id", $data['id']);

        $this->db->execute();

        return $this->db->row_count();
    }

    public function cari_data_mahasiswa()
    {
        $keyword = $_POST['keyword'];
        $sql = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($sql);
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->result_set();
    }
}
