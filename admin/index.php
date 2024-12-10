<?php
include 'partials/header.php';

// Buscar cada post de cada usuario
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE author_id=$current_user_id ORDER BY id DESC";
$posts = mysqli_query($connection, $query);
?>

<section class="dashborad">

    <?php if (isset($_SESSION['add-post-success'])): // Agregar post correctamente ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['edit-post-success'])): // Editar post correctamente ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['edit-post'])): // Editar post NO correctamente ?>
        <div class="alert__messsage error container">
            <p>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['delete-post-success'])): // Eliminar post correctamente ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
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
                    <a href="index.php" class="active">
                        <i class="uil uil-postcard"></i>
                        <h5>Gestionar post</h5>
                    </a>
                </li>

                <?php if (isset($_SESSION['user_is_admin'])): ?>

                    <li>
                        <a href="add-user.php">
                            <i class="uil uil-user-plus"></i>
                            <h5>Agregar usuario</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php">
                            <i class="uil uil-users-alt"></i>
                            <h5>Gestionar usuario</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php">
                            <i class="uil uil-edit"></i>
                            <h5>Agregar categoría</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php">
                            <i class="uil uil-list-ul"></i>
                            <h5>Gestionar categoría</h5>
                        </a>
                    </li>

                <?php endif ?>

            </ul>
        </aside>

        <main>
            <h2>Dashboard</h2>

            <?php if (mysqli_num_rows($posts) > 0): ?>

                <table>
                    <thead>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>

                        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                            <!-- Obtener cada título de categoría de cada post de la tabla de categorías -->

                            <?php
                            $category_id = $post['category_id'];
                            $category_query = "SELECT title FROM categories WHERE id=$category_id";
                            $category_result = mysqli_query($connection, $category_query);
                            $category = mysqli_fetch_assoc($category_result);
                            ?>

                            <tr>
                                <td><?= $post['title'] ?></td>
                                <td><?= $category['title'] ?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Editar</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Eliminar</a></td>
                            </tr>

                        <?php endwhile ?>

                    </tbody>
                </table>
            <?php else: ?>

                <div class="alert__messsage error">
                    <?= "No se encontraron posts" ?>
                </div>
            <?php endif ?>


        </main>

    </div>
</section>

<?php
include '../partials/footer.php';
?>
