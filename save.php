<?php

require_once 'DBBlackbox.php';
require_once 'Album.php';

// // start the session
// session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $album = find( $id, 'Album');
} else {
    $id = null;
    $album = new Album;
}
var_dump($id);
var_dump($album);


 
// update entity from request
$album->name = $_POST['name'] ?? $album->name;            // null coalescing operator
$album->author = $_POST['author'] ?? $album->author;
$album->num_songs = $_POST['num_songs'] ?? $album->num_songs;
$album->year = $_POST['year'] ?? $album->year;
// ...
 
// somehow insert the entity into the database and generate a unique ID
// here done using DBBlackbox
if ($id) {
    update($id, $album);
} else {
    $id = insert($album);
}


// $_SESSION['success_message'] = 'Song successfully saved!';

// redirect to edit page
header('Location: edit.php?id=' . $id);