<?php
session_start();
require "proses.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $db->get("*", "petugas", "WHERE username='$username' AND password='$password'");
    $row = $result->rowCount();
    $data = $result->fetch();
    if ($row > 0) {
        $_SESSION['login'] = $data['id_petugas'];
        $_SESSION['login_id'] = $data['id_petugas'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        echo "<script>document.location.href='../index.php'</script>";
    } else {
        echo "<script>alert('Username atau Password Salah')</script>";
        echo "<script>document.location.href='../login.php'</script>";
    }
}
?>
 