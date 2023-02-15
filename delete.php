<?php

require_once 'DBBlackbox.php';
require_once 'Album.php';

session_start();

// find the existing record in the database
$id = $_GET['id'];

// somehow delete the record from the database
delete($id);

$_SESSION['success_message'] = 'Album successfully deleted';

header('Location: list.php');