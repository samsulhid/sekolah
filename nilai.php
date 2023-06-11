<!DOCTYPE html>
<html>
<head>
    <title>Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        h1 {
            text-align: center;
        }
        
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: 1px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Form Nilai</h1>
    <form method="POST" action="#">

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br>

        <label for="nis">NIS:</label><br>
        <input type="number" name="nis" id="nis" required><br>

        <label for="rayon">Rayon:</label><br>
        <input type="text" name="rayon" id="rayon" required><br>

        <label for="sunda">Nilai Sunda:</label><br>
        <input type="number" name="sunda" id="sunda" required><br>

        <label for="pipas">Nilai Pipas:</label><br>
        <input type="number" name="pipas" id="pipas" required><br>

        <label for="produktif">Nilai Produktif:</label><br>
        <input type="number" name="produktif" id="produktif" required><br>

        <label for="matematika">Nilai Matematika:</label><br>
        <input type="number" name="matematika" id="matematika" required><br>

        <label for="pkn">Nilai PKN:</label><br>
        <input type="number" name="pkn" id="pkn" required><br>

        <label for="sejarah">Nilai Sejarah:</label><br>
        <input type="number" name="sejarah" id="sejarah" required><br><br>

        <input type="submit" name= "kirim"value="Submit">
    </form>
</body>
</html>

<?php

class Nilai {
    private $nama;
    private $nis;
    private $rayon;
    private $sunda;
    private $pipas;
    private $produktif;
    private $matematika;
    private $pkn;
    private $sejarah;

    public function __construct($nama, $nis, $rayon, $sunda, $pipas, $produktif,$matematika, $pkn, $sejarah) {
        $this->nama = $nama;
        $this->nis = $nis;
        $this->rayon = $rayon;
        $this->sunda = $sunda;
        $this->pipas = $pipas;
        $this->produktif = $produktif;
        $this->matematika = $matematika;
        $this->pkn = $pkn;
        $this->sejarah = $sejarah;
    }

    public function hitungTotal() {
        return $this->sunda + $this->pipas + $this->produktif + $this->matematika +  $this->pkn +$this->sejarah;
    }

    public function hitungRataRata() {
        return $this->hitungTotal() / 6;
    }

    public function hitungNilaiMaksimal() {
        return max($this->sunda, $this->pipas, $this->produktif, $this->matematika, $this->pkn,$this->sejarah);
    }

    public function hitungNilaiMinimal() {
        return min($this->sunda, $this->pipas, $this->produktif, $this->matematika, $this->pkn,$this->sejarah);
    }

    public function kategorisunda() {
        if ($this->sunda >= 1 && $this->sunda <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->sunda == 75) {
            return 'Pas KKM';
        } elseif ($this->sunda >= 76 && $this->sunda <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }

    public function kategoripipas() {
        if ($this->pipas >= 1 && $this->pipas <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->pipas == 75) {
            return 'Pas KKM';
        } elseif ($this->pipas >= 76 && $this->pipas <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }

    public function kategoriproduktif() {
        if ($this->produktif >= 1 && $this->produktif <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->produktif == 75) {
            return 'Pas KKM';
        } elseif ($this->produktif >= 76 && $this->produktif <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }

    public function kategorimatematika() {
        if ($this->matematika >= 1 && $this->matematika <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->matematika == 75) {
            return 'Pas KKM';
        } elseif ($this->matematika >= 76 && $this->matematika <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }

    public function kategoripkn() {
        if ($this->pkn >= 1 && $this->pkn <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->pkn == 75) {
            return 'Pas KKM';
        } elseif ($this->pkn >= 76 && $this->pkn <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }

    public function kategorisejarah() {
        if ($this->sejarah >= 1 && $this->sejarah <= 74) {
            return 'Tidak Kompeten';
        } elseif ($this->sejarah == 75) {
            return 'Pas KKM';
        } elseif ($this->sejarah >= 76 && $this->sejarah <= 100) {
            return 'Kompeten';
        } else {
            return 'Tidak Terdeteksi';
        }
    }
}

class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;
    
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    

    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        

        if ($this->connection->connect_error) {
            die("Koneksi database gagal: " . $this->connection->connect_error);
        }
    }
    
    
    public function insertData($nama, $nis, $rayon, $sunda, $pipas, $produktif, $matematika, $pkn, $sejarah) {
        $query = "INSERT INTO tb_kalkulator (nama, nis, rayon, sunda, pipas, produktif, matematika, pkn, sejarah)
                  VALUES ('$nama', '$nis', '$rayon', '$sunda', '$pipas', '$produktif', '$matematika', '$pkn', '$sejarah')";
        
        if ($this->connection->query($query) === true) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $query . "<br>" . $this->connection->error;
        }
    }
    

    public function close() {
        $this->connection->close();
    }
}

$host = "localhost";
$username = "root";
$password = "";
$database = "sekolah";

$db = new Database($host, $username, $password, $database);

$db->connect();


if(isset($_POST["kirim"])) { 
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];
    $sunda = $_POST['sunda'];
    $pipas = $_POST['pipas'];
    $produktif = $_POST['produktif'];
    $matematika = $_POST['matematika'];
    $pkn = $_POST['pkn'];
    $sejarah = $_POST['sejarah'];
    $nilai = new Nilai($nama, $nis, $rayon, $sunda, $pipas, $produktif,$matematika, $pkn, $sejarah);

    echo "Nilai nama: " . $nama . "<br>";
    echo "Nilai nis: " . $nis . "<br>";
    echo "Nilai rayon: " . $rayon . "<br>";
    echo "Nilai sunda: " . $sunda . "<br>";
    echo "Nilai pipas: " . $pipas . "<br>";
    echo "Nilai produktif: " . $produktif . "<br>";
    echo "Nilai matematika: " . $matematika . "<br>";
    echo "Nilai pkn: " . $pkn . "<br>";
    echo "Nilai sejarah: " . $sejarah . "<br>";
    echo "<br>";
    echo "Kategori sunda: " . $nilai->kategorisunda() . "<br>";
    echo "Kategori pipas: " . $nilai->kategoripipas() . "<br>";
    echo "Kategori produktif: " . $nilai->kategoriproduktif() . "<br>";
    echo "Kategori matematika: " . $nilai->kategorimatematika() . "<br>";
    echo "Kategori pkn: " . $nilai->kategoripkn() . "<br>";
    echo "Kategori sejarah: " . $nilai->kategorisejarah() . "<br>";
    echo "<br>";
    echo "Jumlah Total: " . $nilai->hitungTotal() . "<br>";
    echo "Rata-Rata: " . $nilai->hitungRataRata() . "<br>";
    echo "Nilai Maksimal: " . $nilai->hitungNilaiMaksimal() . "<br>";
    echo "Nilai Minimal: " . $nilai->hitungNilaiMinimal() . "<br>";
    echo "<br>";

    $db->insertData($nama, $nis, $rayon, $sunda, $pipas, $produktif, $matematika, $pkn, $sejarah);
}

$db->close();
?>