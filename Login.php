<?php
session_start();
include "koneksi.php";

if(isset($_SESSION['user'])){
    header("Location: tampilan.php");
    exit;
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        header("Location: tampilan.php"); 
        exit; 
    } else {
        echo '<script>alert("Username atau Password Salah.");</script>';
    }
}
?><!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Harfia - 221011080">
    <meta name="description" content="Login">
    <link rel="stylesheet" href="login.css">
    <title>Login Kantin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form id="signin-form">
            <h2>Dapur Mahasiswa</h2>
            
            <input type="email" class="form-login" placeholder="Masukkan email Anda">
            <input type="password" class="form-login" placeholder="Masukkan kata sandi Anda">
            <div class="forgot-password">
                <a href="#" id="forgot-link">Lupa kata sandi Anda?</a>
            </div>
            <button type="submit" id="sign-in">Login</button>
        </form>
    </div>    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signinForm = document.getElementById('signin-form');

            signinForm.addEventListener('submit', function(event) {
                event.preventDefault();
                alert('Logika masuk ada di sini!');
                signinForm.reset();
            });
        });
    </script>
</body>
</html>
