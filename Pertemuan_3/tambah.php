<html>
<head>
    <title>Tambah data mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
    <br/><br/>
    <form class="ml-4" action="tambah.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Gender (L/P)</td>
                <td><input type="text" name="jkel"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="text" name="tgllhr"></td>
            </tr>
            <tr>
            <td></td>
            <td><input class="btn btn-primary" type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
        <a class="btn btn-primary mt-4 ml-5"href="index.php">Go to Home</a>
    </form>
<?php
 // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jkel = $_POST['jkel'];
        $alamat = $_POST['alamat'];
        $tgllhr = $_POST['tgllhr'];
 // include database connection file
        include_once("koneksi.php");
 // Insert user data into table
        $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr)
        VALUES('$nim','$nama', '$jkel','$alamat','$tgllhr')");
// Show message when user added
    echo "<br>Data berhasil disimpan. <a class='btn btn-primary' href='index.php'>View Users</a>";
}
?>
</body>
</html>