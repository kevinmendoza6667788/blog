<?php
include 'partials/header.php';

// Obtener las categorías
$categories_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $categories_query);

// Obtener el post a editar
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['edit-post-error'] = "Post no encontrado.";
        header('location: ' . ROOT_URL . 'admin/');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'admin/');
    die();
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Editar Publicación</h2>

        <!-- Mostrar mensaje de error -->
        <?php if (isset($_SESSION['edit-post'])) : ?>
            <div class="alert__message error">
                <p><?= $_SESSION['edit-post'];
                    unset($_SESSION['edit-post']); ?></p>
            </div>
        <?php endif; ?>

        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Titulo" required>
            <select name="category" required>
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $post['category_id'] ? 'selected' : '' ?>>
                        <?= $category['title'] ?>
                    </option>
                <?php endwhile ?>
            </select>
            <textarea rows="10" name="body" placeholder="Contenido" required><?= $post['body'] ?></textarea>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" <?= $post['is_featured'] ? 'checked' : '' ?>>
                <label for="is_featured">Destacado</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Cambiar Miniatura</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Actualizar Publicación</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
