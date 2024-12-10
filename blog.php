<?php
include 'partials/header.php';

// Verificar si se ha enviado una búsqueda
$search_query = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = filter_var($_GET['search'], FILTER_SANITIZE_STRING);
    $search_query = "WHERE title LIKE '%$search_term%'";
}

// Consultar los posts, con o sin filtro de búsqueda
$query = "SELECT * FROM posts $search_query ORDER BY date_time DESC";
$posts = mysqli_query($connection, $query);
?>

<section class="search__bar">
    <form action="blog.php" method="GET" class="container search__bar-container">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="search" placeholder="Buscar..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn">Ir</button>
        </div>
    </form>
</section>

<!-- =================== FIN DE LA BARRA DE BÚSQUEDA ============== -->

<section class="posts <?= $featured  ? '' : 'section__extra-margin' ?>">
    <div class="container posts__container">

        <?php while ($post = mysqli_fetch_assoc($posts)): ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>" alt="Miniatura del post">
                </div>
                <div class="post__info">
                    <?php
                    // Buscar categoría de la tabla categories usando category_id del post
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
                </div>
            </article>

        <?php endwhile ?>

    </div>
</section>

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

<?php
include 'partials/footer.php';
?>
