<?php
include 'partials/header.php';

//buscar categorías de la base de datos
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);

?>

<section class="dashborad">

    <?php if (isset($_SESSION['add-category-success'])): //ver categoría agregada correctamente
    ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['add-category'])): //ver categoría NO agregada correctamente
    ?>
        <div class="alert__messsage error container">
            <p>
                <?= $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['edit-category-success'])): //categoría editada correctamente
    ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['edit-category'])): //categoría NO editada correctamente
    ?>
        <div class="alert__messsage error container">
            <p>
                <?= $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['delete-category-success'])): //categoría eliminada correctamente
    ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </p>
        </div>

    <?php endif ?>

    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php">
                        <i class="uil uil-pen"></i>
                        <h5>Agregar post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="uil uil-postcard"></i>
                        <h5>Gestionar posts</h5>
                    </a>
                </li>

                <?php if (isset($_SESSION['user_is_admin'])) : ?>

                    <li>
                        <a href="add-user.php">
                            <i class="uil uil-user-plus"></i>
                            <h5>Agregar usuario</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php">
                            <i class="uil uil-users-alt"></i>
                            <h5>Gestionar usuarios</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php">
                            <i class="uil uil-edit"></i>
                            <h5>Agregar categoría</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php" class="active">
                            <i class="uil uil-list-ul"></i>
                            <h5>Gestionar categorías</h5>
                        </a>
                    </li>

                <?php endif ?>

            </ul>
        </aside>

        <main>
            <h2>Gestionar categorías</h2>

            <?php if (mysqli_num_rows($categories) > 0) : ?>

                <table>
                    <thead>
                        <th>Título</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>

                        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>

                            <tr>
                                <td><?= $category['title'] ?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Editar</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Eliminar</a></td>
                            </tr>

                        <?php endwhile ?>

                    </tbody>
                </table>

            <?php else: ?>
                <div class="alert__message error">
                    <?= "Categoría no encontrada" ?>
                </div>
            <?php endif ?>

        </main>

    </div>
</section>

<?php
include '../partials/footer.php';
?>
