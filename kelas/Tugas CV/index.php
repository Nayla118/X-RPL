<?php

$nama = ["Nayla Aisyah Salsabilah","Aspiring Programmer"];
$home = ["Sidoarjo,","Jawa timur","+62 896-0204-7441","aisyahnayla828@gmail.com"];
$lists = ["SKILL'S","HTML","CSS","PHP","JS"];
$sosmed = ["SOCIAL","Facebook","Instagram","Tiktok","Twitter"];
$isi = ["Nayla Aisyah","aixzssz","@aixzssz","@NaylaAisya48456"];
$title = ["ABOUT US","EDUCATION","HOBBY"];
$year = ["2012-2015","2015-2021","2021-2024","2025"];
$school = ["TK DHARMA WANITA","SDN KARANG TANJUNG","MTs MA'ARIF KETEGAN","SMKN 2 BUDURAN"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    
    <div class="container">
        <!-- left -->
        <div class="box-left">
            <div class="profile">
                <img src="img.jpeg" alt="">
            </div>
            <div class="content">
                <!-- Profile -->
                <div class="resume-item">
                    <div class="title">
                        <br>
                    <p class="bold"><?php echo $nama[0]; ?></p>
                    <p class="regular" ><?php echo $nama[1]; ?></p>
                    </div>

                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fa fa-map-signs"></i>
                            </div>
                            <div class="data">
                                <?php echo $home[0]; ?> <br>
                                <?php echo $home[1]; ?>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="data">
                                <?php echo $home[2]; ?>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="data">
                                <?php echo $home[3]; ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <br><br>
                    <!-- skill -->
                <div class="resume-item resume-skills">
                    <div class="title">
                        <p class="bold"><?php echo $lists[0]; ?></p>
                    </div>
                    <ul>
                        <li>
                            <div class="skill-name">
                                <?php echo $lists[1]; ?>
                            </div>
                            <div class="skill-progress">
                                <span style="width: 90%;"></span>
                            </div>
                            <div class="skill-percent"> 90%</div>
                        </li>
                        <li>
                            <div class="skill-name">
                                <?php echo $lists[2]; ?>
                            </div>
                            <div class="skill-progress">
                                <span style="width: 85%;"></span>
                            </div>
                            <div class="skill-percent"> 85%</div>
                        </li>
                        <li>
                            <div class="skill-name">
                                <?php echo $lists[3]; ?>
                            </div>
                            <div class="skill-progress">
                                <span style="width: 60%;"></span>
                            </div>
                            <div class="skill-percent"> 60%</div>
                        </li>
                        <li>
                            <div class="skill-name">
                                <?php echo $lists[4]; ?>
                            </div>
                            <div class="skill-progress">
                                <span style="width: 50%;"></span>
                            </div>
                            <div class="skill-percent"> 50%</div>
                        </li>
                    </ul>
                </div>
                <br><br>
                <!-- sosmed -->
                <div class="resume-item resume-social">
                    <div>
                        <p class="bold"><?php echo $sosmed[0]; ?></p>
                    </div>
                    <br>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fab fa-facebook-square"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold"><?php echo $sosmed[1]; ?></p>
                                <p><?php echo $isi[0]; ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold"><?php echo $sosmed[2]; ?></p>
                                <p><?php echo $isi[1]; ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold"><?php echo $sosmed[4]; ?></p>
                                <p><?php echo $isi[3]; ?></p>
                            </div>
                        </li>
                        <br>
                    </ul>
                </div>
            </div>
        </div>
        <!-- right -->
        <div class="box-right">
            <!-- about us -->
            <div class="resume-item">
                <div class="title">
                    <p class="bold"><?php echo $title[0]; ?></p>
                </div>
                <p>
                    Hi, Saya Nayla aisyah salsabilah dan saya adalah siswa yang masih duduk di bangku SMK kelas 10. Saya memilih jurusan Rekayasa perangkat lunak karena ingin menggali lebih dalam pengetahuan saya tentang IT. Harapan saya adalah ingin menjadi progammer di masa depan.
                </p> <br>
            </div>
            <br>
            <br>
            <!-- education -->
            <div class="resume-item resume-education">
                <div>
                    <p class="bold"><?php echo $title[1]; ?></p>
                </div>
                <br>
                <ul>
                    <li>
                        <div class="date"><?php echo $year[0]; ?></div>
                        <div class="info">
                            <p class="semi-bold"><?php echo $school[0]; ?></p>
                            <p>di <?php echo $school[0]; ?> saya sudah mampu menguasai pelajaran</p>
                        </div>
                    </li>
                    <li>
                        <div class="date"><?php echo $year[1]; ?></div>
                        <div class="info">
                            <p class="semi-bold"><?php echo $school[1]; ?></p>
                            <p>di <?php echo $school[1]; ?> Saya mampu menempuh pelajaran hingga lulus</p>
                        </div>
                    </li>
                    <li>
                        <div class="date"><?php echo $year[2]; ?></div>
                        <div class="info">
                            <p class="semi-bold"><?php echo $school[2]; ?></p>
                            <p>di <?php echo $school[2]; ?> Saya meraih Ranking 1 Paralel </p>
                        </div>
                    </li>
                    <li>
                        <div class="date"><?php echo $year[3]; ?></div>
                        <div class="info">
                            <p class="semi-bold"><?php echo $school[3]; ?></p>
                            <p>di <?php echo $school[3]; ?> Saya Mengambil Jurusan Rekayasa Perangkat Lunak</p> 
                        </div>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <!-- hobby -->
            <div class="resume-item resume-hobby">
                <div class="title">
                    <p class="bold"><?php echo $title[2]; ?></p>
                </div>
                <ul>
                    <li><i class="fa fa-book"></i></li>
                    <li><i class="fa fa-gamepad"></i></li>
                    <li><i class="fa fa-music"></i></li>
                    <li><i class="fas fa-volleyball-ball"></i></li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>