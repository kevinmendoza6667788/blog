<?php
include 'partials/header.php';

//buscar todos los usuarios en la base de datos, pero no del actual usuario
$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
$users = mysqli_query($connection, $query);

?>

<section class="dashborad">

    <?php if (isset($_SESSION['add-user-success'])): //ver usuario agregado correctamente
    ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['edit-user-success'])) : //ver usuario editado correctamente
    ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['delete-user'])) : //si usuario NO se ha eliminado correctamente
    ?>
        <div class="alert__messsage error container">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </p>
        </div>

    <?php elseif (isset($_SESSION['delete-user-success'])) : //usuario eliminado correctamente
    ?>
        <div class="alert__messsage succes container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
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
                        <a href="manage-users.php" class="active">
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
                        <a href="manage-categories.php">
                            <i class="uil uil-list-ul"></i>
                            <h5>Gestionar categorías</h5>
                        </a>
                    </li>
                <?php endif ?>

            </ul>
        </aside>

        <main>
            <h2>Gestionar usuarios</h2>
            <?php if (mysqli_num_rows($users) > 0) : ?>

                <table>
                    <thead>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Admin</th>
                    </thead>
                    <tbody>

                        <?php while ($user = mysqli_fetch_assoc($users)) : ?>

                            <tr>
                                <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Editar</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Eliminar</a></td>
                                <td><?= $user['is_admin'] ? 'Sí' : 'No' ?></td>
                            </tr>

                        <?php endwhile ?>

                    </tbody>
                </table>
            <?php else: ?>

                <div class="alert__messsage error">
                    <?= "Usuarios no encontrados" ?>
                </div>
            <?php endif ?>

        </main>

    </div>
</section>

<?php
include '../partials/footer.php';
?>
