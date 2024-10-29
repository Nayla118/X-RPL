<?php
$sekolah = [
    "TK DHARMA WANITA",
    "SDN KARANG TANJUNG",
    "MTs MA'ARIF KETEGAN",
    "SMKN 2 BUDURAN"
];

$sekolahs = [
    "TK"=>"TK DHARMA WANITA",
    "SD"=>"SDN KARANG TANJUNG",
    "SMP"=>"MTs MA'ARIF KETEGAN",
    "SMK"=>"SMKN 2 BUDURAN",
    "PT"=>"Universitas Negeri Surabaya"
];

$skills = [
    "C++"=>"Expert",
    "HTML"=>"Newbie",
    "CSS"=>"Newbie",
    "PHP"=>"Intermediet",
    "JavaScript"=>"Intermediet"
];

$identitas = [
    "Nama"=>"Nayla Aisyah salsabilah",
    "Alamat"=>"Perum BMP C-18",
    "Email"=>"naylaaisyah100@gmail.com",
    "Facebook"=>"Nayla Aisyah",
    "Tiktok"=>"aixzssz",
    "Instagram"=>"aixzssz"
];

$hobby = [
    "coding",
    "Voli",
    "Musik",
    "Mancing",
    "Membaca"
];

// echo $sekolah[0];
// echo "<br>";
// echo $sekolahs["TK"];
// echo "<br>";
// echo $sekolah[1];
// echo "<br>";
// echo $sekolahs["SD"];

// echo "<br>";

// //menampilkan secara keseluruhan

// for ($i = 0; $i < 4;$i++){
//     echo $sekolah[$i];
//     echo "<br>";
// }

// echo "<br>";

// foreach ($sekolah as $key) {
//     echo $key;
//     echo "<br>";
// }

// echo "<br>";

// foreach ($sekolahs as $key => $value){
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
// }

// echo "<br>";

// foreach ($skills as $key => $value) {
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
// }

if (isset($_GET["menu"])) {
    $menu = $_GET["menu"];
    echo $menu;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <hr>
    <ul>
        <li><a href="?menu=home">Home</a></li>
        <li><a href="?menu=cv">CV</a></li>
        <li><a href="?menu=Project">Project</a></li>
        <li><a href="?menu=Contact">Contact</a></li>
    </ul>
    <h2>Identitas</h2>
    <table border=1px>
        <thead>
            <th>Identitas</th>
            <th>deskripsi</th>
        </thead>
        <tbody>
            <?php
            foreach ($identitas as $key => $value) {
            ?>
            <tr>
            <td><?= $key ?></td>
            <td><?= $value ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <h2>Riwayat sekolah</h2>
    <table border=1px>
        <thead>
            <tr>
                <th>Jenjang</th>
                <th>Nama Sekolah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($sekolahs as $key => $value){
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <hr>
    <h2>SKILLS</h2>
    <table border=1px>
        <thead>
            <tr>
                <th>Skill</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($skills as $key => $value) {
            ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <hr>
    <h2>HOBBY</h2>
    <ul>
        <?php
        foreach ($hobby as $key) {
        ?>
        <li><?= $key ?></li>
        <?php
        }
        ?>
    </ul>
</body>
</html>