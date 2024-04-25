<?php
require_once 'bloggers.php';
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['T1'];
    $email = $_POST['T2'];
    $motdepasse = $_POST['T3'];
    $country=$_POST['T4'];

    // Create user object
    $bloggers = new bloggers($username, $email, $motdepasse,$country, $conn);

    // Call createUser method
    $bloggers->createbloggers();

    header("location: switch.php");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <style>
  html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#30142b, #a12727);
  background-image: url('handala.jpg');
    background-size: cover;
    background-position: center
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #f68e44;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #b79726;
  font-size: 16px;
  text-decoration: none;
  text-transform: lowercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #f49803;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #f4c803,
              0 0 25px #bd9d0b,
              0 0 50px #f4e403,
              0 0 100px #d5cf1e;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #f4c003);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #f4bc03);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #f4dc03);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #f4b003);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
button{
  width:100%;
}

  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>
    <form method="post" >
      <div class="user-box">
        <input type="text" name="T1" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="adresse" name="T2" required="">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="T3" required="">
        <label>Password</label>
      </div>
      <div class="user-box">
        <input type="country" name="T4" required="">
        <label>country</label>
      </div>
     


        <button type="submit">Signup</button>
        <p><a href="signin.php">login</a></p>
    </form>
</body>
</html>