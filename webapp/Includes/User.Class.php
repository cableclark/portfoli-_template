<?php
Class User
 {

 public function sample () {
    if(isset($_SESSION["u_id"])) {
    $db=conn::getInstance();
    $conncetion = $db->conncetion;

    $rez = $conncetion->query("select first_name, last_name, admin from user");
    foreach($rez as $red) {
        if ($red["admin"]==1) {
      echo "<button>". $red["first_name"] . " ". $red["last_name"]. "</b> ". "</button> </br>";
          } else
      echo $red["first_name"] . " ". $red["last_name"]. "<br>";
      }
  }
  else echo "You are not logged in!";
  }





}
