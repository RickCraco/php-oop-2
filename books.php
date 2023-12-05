<?php

include __DIR__ . '/Views/header.php';
include __DIR__ . '/Model/Book.php';

?>

<section class="container">
    <h2>Books</h2>
    <div class="row">
        <?php
        foreach($books as $book){
            $book->printCard();
        }
        ?>
    </div>
</section>

<?php

include __DIR__ . '/Views/footer.php';

?>