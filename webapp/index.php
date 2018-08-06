<?php include_once("Includes/header.php");
?>

<div id="field">

<?php
if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET['id']);
        $news->pagenav($id);

      } else {
$news->fetchNews();
}
?>

</div>
