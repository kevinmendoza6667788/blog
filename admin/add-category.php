<?php
include 'partials/header.php';

// Obtener datos inválidos
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Agregar Categoría</h2>
        
        <?php if (isset($_SESSION['add-category'])): ?>
            <div class="alert__messsage error">
                <p>
                    <?= $_SESSION['add-category']; 
                    unset($_SESSION['add-category']);
                    ?>
                </p>
            </div>
        <?php endif ?>

        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="post">
            <input type="text" value="<?= $title ?>" name="title" placeholder="Título">
            <textarea rows="4" value="<?= $description ?>" name="description" placeholder="Descripción"></textarea>
            <button type="submit" name="submit" class="btn">Agregar Categoría</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
