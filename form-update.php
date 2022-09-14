<?php
include 'connect.php';

$id_pinjam = $_GET['id_pinjam'];

$query = "SELECT * FROM pinjam WHERE id_pinjam = $id_pinjam";

$result = mysqli_query($connect, $query);

$data = mysqli_fetch_assoc($result);

// if (isset($_POST['btnEdit'])) {
//   $genre = $_POST['genre'];
// $bname = $_POST['bname'];
// $pname = $_POST['pname'];
// $pdate= $_POST['pdate'];
// $kdate = $_POST['kdate'];

// $query2 = "UPDATE pinjam SET genre = '$genre', judul = '$bname', peminjam = '$pname', pdate = $pdate, kdate = $kdate WHERE id_pinjam = $id_pinjam";

// $result2 = mysqli_query($connect, $query2);

// $num2 = mysqli_affected_rows($connect);
// }

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
            <select id="Genre" name="genre" value="<?php echo $data['genre'];?>">
              <option value="Majalah">Majalah</option>
              <option value="Olahraga">Olahraga</option>
              <option value="Teknologi">Teknologi</option>
            </select>

            <!-- Buku -->
            <label for="bname">Judul Buku</label>
            <select id="bname" name="bname" value="<?php echo $data['judul'];?>">
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
            <input type="text" id="pname" name="pname" placeholder="Nama lengkap!" value="<?php echo $data['peminjam'];?>">
            
            <!-- Tgl Peminjaman -->
            <label for="pdate">Tanggal peminjaman</label>
            <input type="date" id="pdate" name="pdate" value="<?php echo $data['pdate'];?>"><br><br>

            <!-- Tgl Pengembalian -->
            <label for="kdate">Tanggal Pengembalian</label>
            <input type="date" id="kdate" name="kdate" value="<?php echo $data['kdate'];?>"><br><br>

            <!-- id_pinjam -->
            <td><input type="hidden" name="id_pinjam" value="<?php echo $data['id_pinjam'];?>"></td>

            <!-- Button Kirim -->
            <input type="submit" name="btnEdit" value="Simpan" class="submit">
        </div> 
      </form>
    </article>
  </section>