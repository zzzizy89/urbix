<?php
$is_admin = (session('user')->rol == 1);
// verifica si el usuario es administrador
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/account/dashboard.css');?>">
    <title>Your Profile</title>
</head>
<body>

    <div class="container">
        <div class="profile">
            <h2>Welcome <?= session('user')->name; ?></h2>
            <div class="user-stats">
                <p><strong>Name:</strong> <?= session('user')->name; ?></p>
                <p><strong>Email:</strong> <?= session('user')->email; ?></p>
                <p><strong>Bio:</strong> <?= session('user')->bio; ?></p>
                <img src="<?= base_url('uploads/' . session('user')->perfil); ?>" alt="Profile Image">
            </div>

            <div class="user-menu">
                <h2>User Menu</h2>
                <form action="<?= base_url('update') ?>" method="post" enctype="multipart/form-data">
                    <label for="new-username">New Username:</label>
                    <input type="text" id="new-username" name="new_username">
                    <label for="new-bio">New Bio:</label>
                    <textarea id="new-bio" name="new_bio" rows="4"></textarea>
                    <label for="profile-image">Profile Image:</label>
                    <input type="file" id="profile-image" name="profile_image">
                    <button type="submit">Change Username, Bio, and Profile Image</button>
                </form>

                <!-- Botón "Listar Periféricos" solo para el administrador con el correo electrónico 'admin@example.com' -->
                <?php if ($is_admin): ?>
                    <div class="btn-box btns1">
                        <a href="<?= base_url('listar') ?>"><button type="submit" class="btn">Listar Periféricos</button></a>
                    </div><br>
                <?php endif; ?>

                <!-- Resto de tus botones -->
                <div class="btn-box btns">
                    <a href="<?= base_url('intro_inicio') ?>"><button type="submit" class="btn">Inicio</button></a>
                </div> <br>

                <div class="btn-box btns">
                    <a href="<?= base_url('logout') ?>"><button type="submit" class="btn">Logout</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- script para el cursor -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const cursor = document.querySelector(".cursor");

    document.addEventListener("mousemove", function (e) {
        const x = e.pageX - cursor.offsetWidth / 2;
        const y = e.pageY - cursor.offsetHeight / 2;

        cursor.style.transform = `translate(${x}px, ${y}px)`;
    });
});

</script>


</html>

