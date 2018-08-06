<?php
include_once 'Includes/header.php';

if(isset($_POST['signup']))
{
  $signup =New Signup($_POST['first'], $_POST['last'], $_POST['username'], $_POST['password'], $_POST['email']);
  print_r($signup->email);

  $signup->CheckEmpty();
}



?>
<div id="formfield">
<section>

    <div class= "main-container">
        <h2> Signup</h2>
        <form action="" method="POST" id ="formsign">
            <input type="text" name="first" placeholder ="Firstname"> <br>
            <input type="text" name="last" placeholder ="Lastname"> <br>
            <input type="text" name="email" placeholder ="E-mail"><br>
            <input type="text" name="username" placeholder ="Username"><br>
            <input type="password" name="password" placeholder ="Password"><br>
            <button type="submit" name= "signup"> Sign up </button>
        </form> <br>
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"]=="empty") {
          echo "<p>All fields are required</p>";
        } else if
        ($_GET["error"]=="invalid") {
          echo "<p> Your firstname and lastname should contain only letters. </p>";
        }
      }
         ?>


  </div>
</section>

</div>
