<?php 
$myDir = "c:/xampp/htdocs/Prak_PWD/Pertemuan_1/Upload/";
$dir = opendir($myDir);
echo "Isi folder (klik link untuk download : <br>";
while ($tmp = readdir($dir)){
    echo "<a href='$tmp' target = '_blank'>$tmp</a><br>";
}
closedir($dir);
?>