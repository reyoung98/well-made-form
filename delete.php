<?php

require_once 'DBBlackbox.php';
require_once 'Album.php';

// find the existing record in the database
$id = $_GET['id'];

// somehow delete the record from the database
delete($id);

header('Location: list.php');