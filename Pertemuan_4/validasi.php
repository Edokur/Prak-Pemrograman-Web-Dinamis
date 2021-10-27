<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Validasi</title>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
    <?php
    // define variables and set to empty values
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
        }else {
            $nama = test_input($_POST["nama"]);
        }
    
        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi";
        }else {
            $email = test_input($_POST["email"]);
    
        // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email tidak sesuai format"; 
            }
        }
    
    if (empty($_POST["website"])) {
        $website = "";
    }else {
        $website = test_input($_POST["website"]);
    }
    
    if (empty($_POST["comment"])) {
        $comment = "";
    }else {
        $comment = test_input($_POST["comment"]);
    }
    
    if (empty($_POST["gender"])) {
        $genderErr = "Gender harus dipilih";
    }else {
        $gender = test_input($_POST["gender"]);
    }
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    
    <div class="container">
    <h2 class="mt-3 text-center">Posting Komentar </h2>
    
    <p><span class = "error">* Harus Diisi.</span></p>
    
    <form method = "post" action = "<?php 
    echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table >
    <tr >
    <td class="p-3">Nama:</td>
    <td><input type = "text" name = "nama">
    <span class = "error">* <?php echo $namaErr;?></span>
    </td>
    </tr>
    
    <tr class="mt-3">
    <td class="p-3">E-mail: </td>
    <td><input type = "text" name = "email">
    <span class = "error">* <?php echo $emailErr;?></span>
    </td>
    </tr>
    
    <tr>
    <td class="p-3">Website:</td>
    <td> <input type = "text" name = "website">
    <span class = "error"><?php echo $websiteErr;?></span>
    </td>
    </tr>
    
    <tr>
    <td class="p-3">Komentar:</td>
    <td> <textarea name = "comment" rows = "5" cols = "40"></textarea></td>
    </tr>
    
    <tr>
    <td class="p-3">Gender:</td>
    <td>
    <input type = "radio" name = "gender" value = "L" class="mx-3">Laki-Laki
    <input type = "radio" name = "gender" value = "P" class="mx-3">Perempuan
    <span class = "error">* <?php echo $genderErr;?></span>
    </td>
    </tr>
    <td>
    <input type = "submit" name = "submit" value = "Submit" class="btn btn-primary mt-2"> 
    </td>
    </table>
    </form>
    
    <h2 class="mt-3">Data yang anda isi:</h2>
    <table class="table mt-5">
    <thead>
        <tr>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Website</th>
        <th scope="col">Komentar</th>
        <th scope="col">Jenis Kelamin</th>
        </tr>
    </thead>
    <tbody>
        <tr>
    <?php
        echo "<td>$nama</td>";
        echo "<td>$email</td>";
        echo "<td>$website</td>";
        echo "<td>$comment</td>";
        echo "<td>$gender</td>";
        ?>
        </tr>
    </tbody>
    </table>
    </div>
    </body>
</html>