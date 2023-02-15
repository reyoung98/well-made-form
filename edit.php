<style>
    <?php include "messages.css"; ?>
    <?php include "page.css"; ?>
</style>

<?php

require_once 'Album.php';
require_once 'DBBlackbox.php';

session_start();

$success_message = $_SESSION['success_message'] ?? null;

unset($_SESSION['success_message']);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $album = find( $id, 'Album');
} else {
    $id = null;
    $album = new Album;
}  

?>

<?php include 'menu.php'; ?>

<main>

<div class="form-container">

<?php if ($id) : ?>
    <h1>Edit album</h1>
<?php else : ?>
    <h1>Create a new album</h1>
<?php endif; ?>

<?php if ($success_message) : ?>
    <div class="success_message">
        <?= $success_message ?>
    </div>
<?php endif; ?>

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

</div>

</main>

