<?php 
class databese{
    
    protected $host="localhost";
    protected $username ="root";
    protected $password ="";
    protected $db ="penggajian";

    function connect (){
        $conn = new mysqli (
            $this->host,
            $this->username,
            $this->password,
            $this->db
        );
            if($conn->connect_error){
            echo"gagal terkoneksi:(".$conn->connect_error.")";
            }
        return $conn;
    } 
}

?>