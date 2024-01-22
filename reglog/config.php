<?php
class ConnexionBD {
    public $host;
    public $username;
    public $password;
    public $database;
    public $conn;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($namee){
        return $this->username=$namee;
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Vérifier si la connexion a réussi
        if ($this->conn->connect_error) {
            die("Échec de la connexion à la base de données : " . $this->conn->connect_error);
        }
    }

    public function getConn() {
        return $this->conn;
    }
}

// Utilisation de la classe pour établir une connexion
$host = "localhost";
$username = "root";
$password = "";
$database = "reglog";

$connexionBD = new ConnexionBD($host, $username, $password, $database);
$connexionBD->connect();

// Récupération de l'objet de connexion
$conn = $connexionBD->getConn();

// Utilisez $conn pour exécuter des requêtes SQL, par exemple :
$query = "SELECT * FROM tab_user";
$result = $conn->query($query);



