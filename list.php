<style>
    <?php include "messages.css"; ?>
    <?php include "page.css"; ?>
</style>

<?php

require_once 'DBBlackbox.php';
require_once 'Album.php';

session_start();

$success_message = $_SESSION['success_message'] ?? null;

unset($_SESSION['success_message']);

$albums = select(null, null, 'Album'); 

?>

<?php include 'menu.php'; ?>

<main> 

<div class="list">
<?php if ($success_message) : ?>
    <div class="success_message">
        <?= $success_message ?>
    </div>
<?php endif; ?>

    <?php foreach($albums as $album) : ?>
        <div class="album">
            <?= $album->name ?> by <?= $album->author ?>  (<?= $album->year; ?>) - <?= $album->num_songs ?> songs
            <a class="edit" href="edit.php?id=<?=$album->id?>">Edit</a>
            
            <form action="delete.php?id=<?=$album->id?>" method="post" 
            onsubmit="if (!confirm('Do you really want to delete this album?')) return false">
                <button>Delete</button>
            </form>
    </div>
    <?php endforeach; ?>

</div>
</main>

