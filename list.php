<?php

require_once 'DBBlackbox.php';
require_once 'Album.php';

$albums = select(null, null, 'Album'); 

?>

<?php include 'menu.php'; ?>

<ul>
    <?php foreach($albums as $album) : ?>
        <li>
            <?= $album->name ?> by <?= $album->author ?> - <?= $album->year; ?>
            <a href="edit.php?id=<?=$album->id?>">Edit</a>
            
            <form action="delete.php?id=<?=$album->id?>" method="post" 
            onsubmit="if (!confirm('Do you really want to delete this album?')) return false">
                <button>Delete</button>
            </form>

        </li>
    <?php endforeach; ?>
</ul>

