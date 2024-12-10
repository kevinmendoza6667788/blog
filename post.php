<?php
include 'partials/header.php';

//buscar post de la base de datos
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}



?>

<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>
        <div class="post__autor">

            <?php
            //buscar autor de la tabla users usando author_id
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);

            ?>

            <div class="post__autor-avatar">
                <img src="./images/<?= $author['avatar'] ?>">
            </div>
            <div class="post__autor-info">
                <h5><?= "{$author['firstname']} {$author['lastname']}" ?> </h5>
                <small>
                    <?php
                    setlocale(LC_TIME, 'es_ES.UTF-8'); // Configurar el idioma a español
                    $fecha_publicacion = strftime("%d de %b de %Y, %H:%M", strtotime($post['date_time']));
                    echo ucfirst($fecha_publicacion); // Capitalizar la primera letra
                    ?>
                </small>
            </div>
        </div>
        <div class="singlepost__thumbnail">
            <img src="./images/<?= $post['thumbnail'] ?>" >
            <p>
                <?= $post['body'] ?>
            </p>

        </div>
    </div>
</section>

<!-- =================== END OF SINGLE POST ============== -->


<?php
include 'partials/footer.php';
?>