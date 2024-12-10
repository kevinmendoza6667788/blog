<?php
include 'partials/header.php';

// Buscar el post destacado en la base de datos
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

// Buscar las últimas 9 publicaciones en la base de datos
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>

<?php if (mysqli_num_rows($featured_result) == 1): ?>
    <section class="featured">
        <div class="container featured__container">
            <div class="post post__thumbnail">
                <img src="./images/<?= $featured['thumbnail'] ?>" alt="Miniatura destacada">
            </div>
            <div class="post__info">
                <?php
                // Buscar la categoría del post destacado
                $category_id = $featured['category_id'];
                $category_query = "SELECT * FROM categories WHERE id=$category_id";
                $category_result = mysqli_query($connection, $category_query);
                $category = mysqli_fetch_assoc($category_result);
                ?>

                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $featured['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                <h2 class="post__title">
                    <a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a>
                </h2>
                <p class="post__body">
                    <?= substr($featured['body'], 0, 300) ?>...
                </p>
                <div class="post__autor">
                    <?php
                    // Buscar el autor del post destacado
                    $author_id = $featured['author_id'];
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
                            $fecha_publicacion = strftime("%d de %b de %Y, %H:%M", strtotime($featured['date_time']));
                            echo ucfirst($fecha_publicacion); // Capitalizar la primera letra
                            ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

<!-- ==================== FIN DE DESTACADO ==========-->

<section class="posts <?= $featured  ? '' : 'section__extra-margin' ?>">
    <div class="container posts__container">
        <?php while ($post = mysqli_fetch_assoc($posts)): ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>" alt="Miniatura del post">
                </div>
                <div class="post__info">
                    <?php
                    // Buscar la categoría del post
                    $category_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>

                    <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                    <h3 class="post__title">
                        <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p class="post__body">
                        <?= substr($post['body'], 0, 150) ?>...
                    </p>
                    <div class="post__autor">
                        <?php
                        // Buscar el autor del post
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
<!-- ==================== FIN DE POSTS ==========-->

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

<?php include "partials/footer.php"; ?>
