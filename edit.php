<?php

require_once 'Album.php';
require_once 'DBBlackbox.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $album = find( $id, 'Album');
} else {
    $id = null;
    $album = new Album;
}  

var_dump($album);

?>

<?php include 'menu.php'; ?>

<form action="save.php<?= $id ? '?id='.$id : '' ?>" method="post">   
  
    Name:<br>
    <input type="text" name="name" value="<?= $id ? htmlspecialchars((string)$album->name) : '' ?>"><br>
    <br>
 
    Author:<br>
    <input type="text" name="author" value="<?= $id ? htmlspecialchars((string)$album->author) : '' ?>"><br>
    <br>
 
    Number of songs:<br>
    <input type="number" name="num_songs" value="<?= $id ? htmlspecialchars((string)$album->num_songs) : '' ?>"><br>
    <br>
 
    Year:<br>
    <input type="number" name="year" value="<?= $id ? htmlspecialchars((string)$album->year) : '' ?>"><br>
    <br>
 
    <button type="submit">Save</button>
 
</form>


