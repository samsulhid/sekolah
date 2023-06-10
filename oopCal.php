<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <center>
    <form action="" method="post">
        <label for="">Nama</label><br>
        <input type="text" name="nama">
        <br>
        <label for="">NIS</label><br>
        <input type="text" name="nis">
        <br>
        <label for="">Produktif</label><br>
        <input type="text" name="prod">
        <br>
        <label for="">Matematika</label><br>
        <input type="text" name="mtk">
        <br>
        <label for="">Bahasa Inggris</label><br>
        <input type="text" name="ing">
        <br>
        <label for="">Bahasa Sunda</label><br>
        <input type="text" name="sund">
        <br>
        <label for="">PIPAS</label><br>
        <input type="text" name="pipas">
        <br>
        <label for="">PJOK</label><br>
        <input type="text" name="pjok">
        <br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

<?php
class Nilai
{
    private $nama;
    private $nis;
    private $map1;
    private $map2;
    private $map3;
    private $map4;
    private $map5;
    private $map6;

    public function __construct($nama, $nis, $map1, $map2, $map3, $map4, $map5, $map6)
    {
        $this->nama = $nama;
        $this->nis = $nis;
        $this->map1 = $map1;
        $this->map2 = $map2;
        $this->map3 = $map3;
        $this->map4 = $map4;
        $this->map5 = $map5;
        $this->map6 = $map6;
    }

    public function calculateTotal()
    {
        return $this->map1 + $this->map2 + $this->map3 + $this->map4 + $this->map5 + $this->map6;
    }

    public function calculateAverage()
    {
        return $this->calculateTotal() / 6;
    }

    public function calculateMax()
    {
        return max($this->map1, $this->map2, $this->map3, $this->map4, $this->map5, $this->map6);
    }

    public function calculateMin()
    {
        return min($this->map1, $this->map2, $this->map3, $this->map4, $this->map5, $this->map6);
    }

    public function calculateGrade()
    {
        $average = $this->calculateAverage();

        if ($average >= 90) {
            return 'A';
        } elseif ($average >= 80) {
            return 'B';
        } elseif ($average >= 70) {
            return 'C';
        } elseif ($average >= 60) {
            return 'D';
        } else {
            return 'E';
        }
    }

    public function displayData()
    {
        $total = $this->calculateTotal();
        $average = $this->calculateAverage();
        $max = $this->calculateMax();
        $min = $this->calculateMin();
        $grade = $this->calculateGrade();

        echo "Jumlah total adalah: " . $total . "<br>";
        echo "Rata-rata adalah: " . $average . "<br>";
        echo "Nilai maksimal adalah: " . $max . "<br>";
        echo "Nilai minimal adalah: " . $min . "<br>";
        echo "Grade penilaian: " . $grade . "<br>";

        $server = mysqli_connect("localhost", "root", "", "sekolah");

        $sql = "INSERT INTO tb_nilai(nama, nis, produktif, mtk, inggris, sunda, pipas, pjok, rata2) 
        VALUES ('$this->nama', '$this->nis', '$this->map1', '$this->map2', '$this->map3', '$this->map4', '$this->map5', '$this->map6', '$average')";

        $query = mysqli_query($server, $sql);

        if ($query) {
            $sql2 = "SELECT * FROM tb_nilai";
            $result = mysqli_query($server, $sql2);

            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Data</h3>";
                echo '<table border="5" cellpadding="20">';
                echo '<tr>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Produktif</th>
                        <th>Matematika</th>
                        <th>Inggris</th>
                        <th>Sunda</th>
                        <th>Pipas</th>
                        <th>PJOK</th>
                        <th>Rata-Rata</th>
                      </tr>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . $row['nis'] . '</td>';
                    echo '<td>' . $row['produktif'] . '</td>';
                    echo '<td>' . $row['mtk'] . '</td>';
                    echo '<td>' . $row['inggris'] . '</td>';
                    echo '<td>' . $row['sunda'] . '</td>';
                    echo '<td>' . $row['pipas'] . '</td>';
                    echo '<td>' . $row['pjok'] . '</td>';
                    echo '<td>' . $row['rata2'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            }
        }
    }
}

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $map1 = $_POST["prod"];
    $map2 = $_POST["mtk"];
    $map3 = $_POST["ing"];
    $map4 = $_POST["sund"];
    $map5 = $_POST["pipas"];
    $map6 = $_POST["pjok"];

    $nilai = new Nilai($nama, $nis, $map1, $map2, $map3, $map4, $map5, $map6);
    $nilai->displayData();
}
?>
