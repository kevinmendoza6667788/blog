<?php
include 'partials/header.php';

// Buscar categorías en la base de datos
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// Recuperar los datos del formulario si el formulario no era válido
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

// Eliminar los datos de la sesión
unset($_SESSION['add-post-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Agregar Publicación</h2>

        <?php if (isset($_SESSION['add-post'])) : ?>
            <div class="alert__messsage error">
                <p>
                    <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" value="<?= $title ?>" name="title" placeholder="Título">
            
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>

            <textarea rows="10" value="<?= $body ?>" name="body" placeholder="Cuerpo"></textarea>

            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured">
                    <label for="is_featured" checked>Destacado</label>
                </div>
            <?php endif ?>

            <div class="form__control">
                <label for="thumbnail">Agregar miniatura</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>

            <button type="submit" name="submit" class="btn">Agregar Publicación</button>
        </form>
    </div>
</section>

<?php
// Asegúrate de que la ruta del footer sea correcta
include 'partials/footer.php';
?>
