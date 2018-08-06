<?php

Class Signup {

  private $firstname;
  private $lastname;
  private $username;
  private $password;
  public $email;


  public function __construct($firstname, $lastname, $username, $password, $email) {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;


  }
//провери дали користи валидни каратери
  private function ValidChars () {
         if (!preg_match("/^[a-zA-Z]*$/", $this->firstname)||!preg_match("/^[a-zA-Z]*$/", $this->lastname)) {
          header("Location: signup.php?error=invalid");
            exit();
          }
            else {
                $this->ValidMail();
              }
            }

  //Провери дали се празни
 public function CheckEmpty() {
      if(empty( $this->firstname)||empty($this->lastname)|| empty($this->username)||empty($this->password) ||empty($this->email)) {
      header('Location: signup.php?error=empty');
      exit();
    } else {

        $this->ValidChars();
      }
    }

        //проверува дали мејот е валиден
    private function Validmail () {
                if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                  header("Location: signup.php?error=email");
                    exit();
                  } else {
                  $this->isItTaken();
                  }
                }
    private function isItTaken() {
                $conn= Conn::getInstance();
                $sth =$conn->conncetion->prepare('SELECT username
                FROM user WHERE username=:username' );

                $sth->bindParam(':username', $this->username);

                $sth->execute();

                if ($sth->rowCount()>0) {
                      header("Location: signup.php?error=user_taken");
                        exit();

                      } else {

                        $this->insert();
                      }
                    }
              private function insert ( ) {
                //пасордот се хашира
              ;

              $conn= Conn::getInstance();
              //$sth =$conn->conncetion->prepare('INSERT INTO user (first_name, last_name, email, username, password) VALUES (:first, :last, :email, :username, :password)');
              $sth =$conn->conncetion->prepare('INSERT INTO user (first_name, last_name, username, password, email) VALUES (:first, :last, :username, :password, :email)');

              $first = $this->firstname;
              $last= $this->lastname;
              $username= $this->username;
              $email= $this->email;
              $password= md5($this->password);

              // $sth->bindParam(':first', $first);
              // $sth->bindParam(':last', $password);
              // $sth->bindParam(':username', $username);
              // $sth->bindParam(':password', $password);
              // $sth->bindParam(':email;', $email);

              $sth->execute(array(
                ':first'=>$first,
                ':last'=>$last,
                ':username'=>$username,
                ':password'=>$password,
                ':email'=>$email
              ));

              header("Location: signup.php?message=done");
              exit();
              }



  }
