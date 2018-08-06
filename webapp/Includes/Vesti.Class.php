<?php
Class Vesti {

  public $naslov;
  public $text;
  public $datum;
  public $kategorija;
  public $avtor;

  public function fetchNews () {
    $conn= conn::getInstance();
      $sth =$conn->conncetion->query('SELECT vesti.naslov, vesti.text, vesti.date
      FROM vesti');

          $name= isset($_SESSION['user'])? '<br> Enter your comment, ' . $_SESSION['user'] . '<form> <textarea rows="5" name="comment" placeholder= "Comment here..."> </textarea></form> <br><br>  <form action="" method="POST" id ="formsign">

                <button type="submit" name= "post"> Post </button>
            </form> <br>':"";

    foreach($sth as $red)
        echo '<h2>'.  $red["naslov"] . '</h2>' .
        '<p>' . $red["text"] . '<i>' . $red['date'] . '</i></p> '. $name;

      }





      public function fetchMenu () {
        $conn= conn::getInstance();
          $sth =$conn->conncetion->query('SELECT id, kategorija FROM vezbaIT.kategorija;');

        foreach($sth as $red)
            echo '<li><a href=index.php?id='. urlencode($red["id"]) . '>'.  $red["kategorija"] . '</a></li>';


          }
    public function pagenav ($id) {
            $conn= conn::getInstance();
              $sth =$conn->conncetion->prepare('SELECT vesti.naslov, vesti.text, vesti.date, vesti.kategorija
              FROM vesti WHERE kategorija =?;');

              $sth->execute([$id]);



            $res= $sth->fetchAll(PDO::FETCH_CLASS, 'Vesti');


           foreach($res as $red) {

                echo  '<h2>'. $red->naslov . "</h2> <p>". $red->text . "<i>" . $red->datum . "</i></p> "  ;
              //'<p>' . $red['text'] . '</p> '. ' <p> <i> Posted on: ' . $red['date'] . '</i></p>'  ;
              }

}
}
