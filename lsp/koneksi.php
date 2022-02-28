<?php

$conn = mysqli_connect('localhost', 'root', '', 'tiket');

// function read($query)
// {
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }

//     return $rows;
// }

// function register($data)
// {
//     global $conn;

//     $nama = htmlspecialchars($data["nama"]);
//     $ttl = htmlspecialchars($data["ttl"]);
//     $tgllahir = htmlspecialchars($data["tgllahir"]);
//     $wn = htmlspecialchars($data["wn"]);
//     $alamat = htmlspecialchars($data["alamat"]);
//     $email = htmlspecialchars($data["email"]);
//     $hp = htmlspecialchars($data["hp"]);
//     $asal = htmlspecialchars($data["asal"]);
//     $ayah = htmlspecialchars($data["ayah"]);
//     $ibu = htmlspecialchars($data["ibu"]);
//     $penghasilan = htmlspecialchars($data["penghasilan"]);


//     $query = "INSERT INTO tbl_casis VALUES ('','$nama','$ttl','$tgllahir','$wn','$alamat','$email','$hp','$asal','$ayah','$ibu','$penghasilan','$foto')";

//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }

