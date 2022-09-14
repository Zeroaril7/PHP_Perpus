<?php

include 'connect.php';



if (isset($_POST['btnSimpan'])) {
  $genre = $_POST['genre'];
$bname = $_POST['bname'];
$pname = $_POST['pname'];
$pdate= $_POST['pdate'];
$kdate = $_POST['kdate'];

$query2 = "INSERT INTO pinjam (genre, judul, peminjam, pdate, kdate) VALUES ('$genre', '$bname', '$pname', '$pdate', '$kdate')";
// echo $query;
$result2 = mysqli_query($connect, $query2);

$num2 = mysqli_affected_rows($connect);
}

if (isset($_GET['Del'])) {
  $id = $_GET['id_pinjam'];
  $query3 = "DELETE FROM pinjam WHERE id_pinjam = '$id'";
  $result3 = mysqli_query($connect, $query3);
  $num3 = mysqli_affected_rows($connect);
}

if(isset($_POST['btnEdit'])){
  $id_pinjam = $_POST['id_pinjam'];
  $genre = $_POST['genre'];
  $bname = $_POST['bname'];
  $pname = $_POST['pname'];
  $pdate= $_POST['pdate'];
  $kdate = $_POST['kdate'];
  
  $query4 = "UPDATE pinjam SET genre = '$genre', judul = '$bname', peminjam = '$pname', pdate = '$pdate', kdate = '$kdate' WHERE id_pinjam = $id_pinjam";
  
  $result4 = mysqli_query($connect, $query4);
  
  $num4 = mysqli_affected_rows($connect);
}


$query = "SELECT * FROM pinjam";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"href="styleFromBuku.css"> 
    <script src="https://kit.fontawesome.com/20d637e8c5.js" crossorigin="anonymous"></script>
    <title>Formulir Peminjaman Buku</title>
</head>
<body>
  <!-- Header -->
  <header>
    <div class="header">
        <a href="login.html"><i class="fa-solid fa-user"></i>  login</a> 
    </div>
</header>

  <!-- Nav -->
  <div class="nav">
    <a href="#default" class="logo"><img src="https://pbs.twimg.com/media/FWol3U8UsAACOAz?format=png&name=medium" alt="Image" style="width:300px;"></a>
    <div class="nav-right">
      <a href="home.html">Home</a>
      <a href="buku.html">Katalog</a>
      <a href="fromBuku.html">Peminjaman Buku</a>
      <a href="#cari">Telusuri  <i class="fa-solid fa-magnifying-glass"></i></a> 
    </div>
  </div>
  
  <!-- content -->
  <section> 
    <article>
      <h3 class="kontakAwal">Formulir Peminjaman Buku </h3><br>
        <div class="container">
          <form action="form-pinjam.php" method="POST">
            <!-- Genre -->
            <label for="Genre">Genre Buku</label>
            <select id="Genre" name="genre">
              <option value="Majalah">Majalah</option>
              <option value="Olahraga">Olahraga</option>
              <option value="Teknologi">Teknologi</option>
            </select>

            <!-- Buku -->
            <label for="bname">Judul Buku</label>
            <select id="bname" name="bname">
              <option value="PNI dan Alhi Warisnya">PNI dan Ahli Warisnya</option>
              <option value="Mudahnya Memaafkan">Mudahnya Memaafkan</option>
              <option value="Creamy Seafood">Creamy Seafood</option>
              <option value="Aturan Balita">Aturan Balita</option>
              <option value="Fashion and Art">Fashion and Art</option>
              <option value="Jago Futsal">Jago Futsal</option>
              <option value="Jago Bulu Tangkis">Jago Bulu Tangkis</option>
              <option value="Jago Renang">Efek Vonis Ahok</option>
              <option value="Panduan Hatha Yoga">Panduan Hatha Yoga</option>
              <option value="Bermain Kasti">Bermain Kasti</option>
              <option value="Belajar Microsoft office">Belajar Microsoft office</option>
              <option value="Indonesia Menuju 5g">Indonesia Menuju 5g</option>
              <option value="Teknologi Informatika, Komunikasi">Teknologi Informatika, Komunikasi</option>
              <option value="Teknologi Pembangkit Listrik">Teknologi Pembangkit Listrik</option>
              <option value="Prinsip Dasar Satelit">Prinsip Dasar Satelit</option>
              <option value="Teknologi Layanan Jaringan">Teknologi Layanan Jaringan</option>              
            </select>
            
            <!-- Peminjam -->
            <label for="pname">Nama Peminjam</label>
            <input type="text" id="pname" name="pname" placeholder="Nama lengkap!">
            
            <!-- Tgl Peminjaman -->
            <label for="pdate">Tanggal peminjaman</label>
            <input type="date" id="pdate" name="pdate"><br><br>

            <!-- Tgl Pengembalian -->
            <label for="kdate">Tanggal Pengembalian</label>
            <input type="date" id="kdate" name="kdate"><br><br>
            <!-- Button Kirim -->
            <input type="submit" name="btnSimpan" value="Kirim" class="submit" onclick="AddRow()">
        </div> 
      </form>
    </article>
  </section>

  <!-- Table Data Peminjaman -->
  <div class="box">
    <table id="show">
      <tr>
          <th>Genre</th>
          <th>Judul buku</th>
          <th>Nama Peminjam</th>
          <th>Tangga Pinjam</th>
          <th>Tanggal Kembali</th>
          <th colspan="2">Aksi</th>
      </tr>
              <?php
        if($num>0){
  
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$data['genre']."</td>";
                echo "<td>".$data['judul']."</td>";
                echo "<td>".$data['peminjam']."</td>";
                echo "<td>".$data['pdate']."</td>";
                echo "<td>".$data['kdate']."</td>";
                echo "<td><a href='form-update.php?id_pinjam=".$data['id_pinjam']."'><input type='submit' value='Edit'></a>";
                echo "<td><a href='form-pinjam.php?id_pinjam=".$data['id_pinjam']."&Del=t' onclick='return confirm (\"Apakah anda yakin ingin menghapus data?\")'><input type='submit' value='Delete' name='btnDelete'></a></td>";
                echo "<tr>";          
            }
        }else {
            echo "<td colspan='5'>Tidak ada data</td>";
            echo "<td colspan='2'>Tidak ada</td>";
        }
        ?>
    </table>
  </div>
  <!-- Footer -->
  <footer>
    <div class="footer">
      <p>Perpustakaan Indonesia Jaya || Kelompok 1 TEFA SMK Telkom Malang </p>
    </div>
  </footer>

  <!-- <script src="script-formBuku.js"></script>  -->
</body>
</html>