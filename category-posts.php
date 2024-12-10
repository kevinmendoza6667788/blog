<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}

?>

<header class="category__title">
    <h2>
        <?php
        // Buscar categoría de la tabla categories usando category_id del post
        $category_id = $id;
        $category_query = "SELECT * FROM categories WHERE id=$id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        echo $category['title'];
        ?>
    </h2>
</header>
<!-- =================== FIN DE CATEGORÍA ============== -->

<?php if (mysqli_num_rows($posts) > 0): ?>
    <section class="posts">
        <div class="container posts__container">

            <?php while ($post = mysqli_fetch_assoc($posts)): ?>
                <article class="post">
                    <div class="post__thumbnail">
                        <img src="./images/<?= $post['thumbnail'] ?>" alt="Miniatura del post">
                    </div>
                    <div class="post__info">

                        <h3 class="post__title">
                            <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                        </h3>
                        <p class="post__body">
                            <?= substr($post['body'], 0, 150) ?>...
                        </p>
                        <div class="post__autor">

                            <?php
                            // Buscar autor de la tabla users usando author_id
                            $author_id = $post['author_id'];
                            $author_query = "SELECT * FROM users WHERE id=$author_id";
                            $author_result = mysqli_query($connection, $author_query);
                            $author = mysqli_fetch_assoc($author_result);
                            ?>

                            <div class="post__autor-avatar">
                                <img src="./images/<?= $author['avatar'] ?>" alt="Avatar de <?= $author['firstname'] ?>">
                            </div>
                            <div class="post__autor-info">
                                <h5><?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                                <small>
                                    <?php
                                    setlocale(LC_TIME, 'es_ES.UTF-8'); // Configurar el idioma a español
                                    $fecha_publicacion = strftime("%d de %b de %Y, %H:%M", strtotime($post['date_time']));
                                    echo ucfirst($fecha_publicacion); // Capitalizar la primera letra
                                    ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </article>

            <?php endwhile ?>

        </div>
    </section>

<?php else: ?>
    <div class="alert__messsage error lg">
        <p>No se encontraron publicaciones en esta categoría.</p>
    </div>
<?php endif ?>

<section class="category__buttons">
    <div class="container category__buttons-container">

        <?php
        $all_categories_query = "SELECT * FROM categories";
        $all_categories = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>

            <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
        <?php endwhile ?>

    </div>
</section>
<!-- ==================== FIN DE BOTONES DE CATEGORÍA ==========-->

<?php
include 'partials/footer.php';
?>
