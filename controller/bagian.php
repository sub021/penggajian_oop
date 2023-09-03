<?php
class bagian
{

    protected $table = 'bagian';


    function tampil_bagian()
    {
        require_once "database/connection.php";
        require_once "controller/query.php";
        $db = new databese();
        $query = new query();
        $mysqli = $db->connect();
        // $result = $mysqli->query('select * from ' . $this->table . '');
        $result = $mysqli->query($query->all('bagian'));
        // var_dump($query('bagian'));
        while ($row = $result->fetch_assoc()) {
            $hasil[] = $row;
        }
        if (!empty($hasil)) {
            return $hasil;
        }
        echo "  <div class='alert alert-danger' role='alert'>Data Kosong </div>";
    }

    function tambah_bagian($request)
    {
        require_once "database/connection.php";

        $db = new databese();
        $mysqli = $db->connect();
        $nm_bagian = $mysqli->real_escape_string($request['nama']);
        $ceksql = $mysqli->query("SELECT * FROM bagian WHERE nama='$nm_bagian'");
        if ($ceksql->num_rows > 0) {
            echo "  <div class='alert alert-danger' role='alert'> data sudah ada</div>";
        } else {
            $sql = "INSERT INTO bagian SET nama='$nm_bagian'";
            $result = $mysqli->query($sql);
            if ($result) {
                echo "  <div class='alert alert-success' role='alert'> data berhasil disimpan</div>";
            }
        }
    }

    function get_bagian($id)
    {
        require_once "database/connection.php";
        $db = new databese();
        $mysqli = $db->connect();
        $sql = "SELECT * FROM bagian WHERE id ='$id'";
        $result = $mysqli->query($sql);
        $data = $result->fetch_assoc();
        return $data;
    }

    function ubah_bagian($request)
    {
        require_once "database/connection.php";
        $db = new databese();
        $mysqli = $db->connect();
        $id = $mysqli->real_escape_string($request['id']);
        $nm_bagian = $mysqli->real_escape_string($request['nama']);
        $sql = "UPDATE bagian SET nama ='$nm_bagian'
                                  WHERE id ='$id'";
        $result = $mysqli->query($sql);
        if ($result) {
            echo "  <div class='alert alert-success' role='alert'> data berhasil diubah</div>";
        }
    }

    function hapus_bagian($id)
    {
        require_once "database/connection.php";
        $db = new databese();
        $mysqli = $db->connect();
        $sql = "DELETE FROM bagian WHERE id ='$id'";
        $result = $mysqli->query($sql);
        if ($result) {
            echo "  <div class='alert alert-success' role='alert'> data berhasil dihapus</div>";
        }
    }
}
