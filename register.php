<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <!-- Include Global files -->
  <?php require './components/globals.php' ?>

  <style>
    body {
      font-family: ./assets/font/Spectral Bold.ttf;
      background-color: #f1f1f1;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ff5733;
      border: 1px solid #dddddd;
      border-radius: 40px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
      margin-bottom: 30px;

    }
    .fjala {
      text-align: center;
      font-size: 30px;
      }
    .container input[type="text"],
    .container input[type="password"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      background-color: lightgrey;

      border-radius: 20px;
    }
    .container button {
      background-color: #EA3C12;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 20px;

    }
    .container button:hover {
      opacity: 0.8;
      transition-duration: 1s;


    }
    .error {
      color: red;
      margin-bottom: 10px;
    }
    .logo_vogel{
      width: 100px;
      height: 100px;
      margin: 0 auto;
    }
        .links {
      text-align: left;
      margin-top: 10px;
    }
    .links a {
      text-decoration: none;
      margin: 0 5px;
    }
    .container .form-row {
      display: flex;
      justify-content: space-between;
    }
    .container .form-row .input-group {
      width: 48%;
    }
    
  </style>
</head>
<body>
  <?php require './components/Navigation.php' ?>

  <?php
    $nameErr = $surnameErr = $phoneErr = $emailErr = $passwordErr = $confirmPasswordErr = '';
    $name = $surname = $phone = $email = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (empty($_POST['name'])) {
        $nameErr = 'Name is required';
      } else {
        $name = test_input($_POST['name']);
      }

      if (empty($_POST['surname'])) {
        $surnameErr = 'Surname is required';
      } else {
        $surname = test_input($_POST['surname']);
      }

      if (empty($_POST['phone'])) {
        $phoneErr = 'Phone number is required';
      } else {
        $phone = test_input($_POST['phone']);
      }

      if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
      } else {
        $email = test_input($_POST['email']);
      }

      if (empty($_POST['password'])) {
        $passwordErr = 'Password is required';
      } else {
        $password = test_input($_POST['password']);
      }

      if (empty($_POST['confirm_password'])) {
        $confirmPasswordErr = 'Confirm password is required';
      } else {
        $confirmPassword = test_input($_POST['confirm_password']);
      }

      // If there are no errors, you can process the form data further (e.g., store in a database)
      if (empty($nameErr) && empty($surnameErr) && empty($phoneErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
      
        header('Location: success.php');
        exit();
      }
    }

  ?>

<img src="./assets/logo/png/Logo_black_2.png" alt="Logo" class="logo_vogel">

<div class="fjala">
  <h1> Welcome to The Club! </h1>
</div>


  <div class="container bg-footer-dark w-9/12 md:w-1/2 lg:w-1/3">

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      
        <div class="form-row">
        <div class="input-group">
          <label for="name" style = "color: #ECEAE2;">Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" required>
          <span class="error"><?php echo $nameErr; ?></span>
        </div>
        <div class="input-group">
          <label for="surname" style = "color: #ECEAE2;">Surname:</label>
          <input type="text" id="surname" name="surname" placeholder="Enter your surname" value="<?php echo $surname; ?>" required>
          <span class="error"><?php echo $surnameErr; ?></span>
        </div>
      </div>

      <label for="phone" style = "color: #ECEAE2;">Phone Number:</label>
      <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>" required>
      <span class="error"><?php echo $phoneErr; ?></span>
      
      <label for="email" style = "color: #ECEAE2;">Email:</label>
      <input type="text" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>" required>
      <span class="error"><?php echo $emailErr; ?></span>

      <label for="password" style = "color: #ECEAE2;">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <span class="error"><?php echo $passwordErr; ?></span>
      
      <label for="confirm_password" style = "color: #ECEAE2;">Confirm Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
      <span class="error"><?php echo $confirmPasswordErr; ?></span>
   
    </form>
          <button type="submit">Register</button>
          <div class="links">
      <a href="login.php" style = "color: #89CFF0;">Have an account?</a>
    </div>
      </div>
  <?php require './components/Footer/Footer.php' ?>

</body>
</html>


