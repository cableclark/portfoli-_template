<?php

Class Login
{
  private $username;
  private $password;
  private $admin;


  public function __construct ($username, $password) {
    $this->username= $username;
    $this->password= md5($password);


  }

  public function checkDB () {

      $conn= conn::getInstance();
      $sth =$conn->conncetion->prepare('SELECT username, password, admin
      FROM user WHERE username=:username AND password=:password');

      $sth->bindParam(':username', $this->username);
      $sth->bindParam(':password', $this->password);
      $sth->execute();

      if ($sth->rowCount()>0) {
        $this->admin = $sth->fetch(PDO::FETCH_ASSOC);

        return true;}
        else{
        return false;
        }
      }


      public function login () {
        if ($this->checkDB()) {
          session_start();
         $_SESSION['user'] = $this->username;
         $_SESSION['admin'] = $this->admin['admin'];
         header('Location: index.php');
    } else {
      echo "<p>The email or password is incorrect</p>";

    }

  }


}
