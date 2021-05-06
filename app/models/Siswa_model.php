<?php

class Siswa_model
{
    private $table = 'databaselatihan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getSiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE Id=:Id');
        $this->db->bind('Id', $Id);
        return $this->db->single();
    }

    public function tambahDataSiswa($data)
    {
        if ($data['jurusan'] == "" || $data['kelas'] == "") {
            return 0;
        }

        $query = "INSERT INTO databaselatihan VALUES 
        ('', :Nama, :NIS, :Kelas, :Jurusan)";

        $this->db->query($query);
        $this->db->bind('Nama', $data['nama']);
        $this->db->bind('NIS', $data['nis']);
        $this->db->bind('Kelas', $data['kelas']);
        $this->db->bind('Jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowAffected();
    }

    public function hapusDataSiswa($id)
    {
        $query = "DELETE FROM databaselatihan WHERE Id = :Id";
        $this->db->query($query);
        $this->db->bind('Id', $id);

        $this->db->execute();

        return $this->db->rowAffected();
    }

    public function ubahDataSiswa($data)
    {
        if ($data['jurusan'] == "" || $data['kelas'] == "") {
            return 0;
        }

        $query = "UPDATE databaselatihan SET 
        Nama = :Nama,
        NIS = :NIS,
        Jurusan = :Jurusan,
        Kelas = :Kelas
        WHERE Id = :Id
        ";

        $this->db->query($query);
        $this->db->bind('Nama', $data['nama']);
        $this->db->bind('NIS', $data['nis']);
        $this->db->bind('Kelas', $data['kelas']);
        $this->db->bind('Jurusan', $data['jurusan']);
        $this->db->bind('Id', $data['id']);

        $this->db->execute();

        return $this->db->rowAffected();
    }

    public function cariDataSiswa()
    {
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
        }

        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM databaselatihan WHERE 
        Nama LIKE :keyword OR 
        NIS LIKE :keyword OR
        Jurusan LIKE :keyword OR
        Kelas LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}


?>