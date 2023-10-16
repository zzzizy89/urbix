<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
  
    <style>
        /* Estilos personalizados */
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: "Roboto Mono", monospace !important;
            background: #0D1117 !important;
            color: #f5f5dc !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 400px;
        }

        .profile {
            margin-top: 30px;
            text-align: center;
        }

        .user-stats p {
            margin: 5px 0;
        }

        .user-stats img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .user-menu {
            text-align: center;
            margin-top: 20px;
        }

        .user-menu form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .user-menu label,
        .user-menu input,
        .user-menu textarea {
            width: 100%;
            max-width: 350px;
            margin-bottom: 10px;
        }

        .user-menu button {
            width: 100%;
            max-width: 350px;
        }
    </style>
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
                    <input type="text" id="new-username" name="new_username" required>
                    <label for="new-email">New Email:</label>
                    <input type="text" id="new-email" name="new_email" required>
                    <label for="new-bio">New Bio:</label>
                    <textarea id="new-bio" name="new_bio" rows="4"></textarea>
                    <label for="profile-image">Profile Image:</label>
                    <input type="file" id="profile-image" name="profile_image">
                    <button type="submit">Change Username, Email, Bio, and Profile Image</button>
                </form>
                <div class="btn-box btns">
    <a href="<?= base_url('home') ?>"><button type="submit" class="btn">Inicio</button></a>
</div>

<div class="btn-box btns">
    <a href="<?= base_url('logout') ?>"><button type="submit" class="btn">Logout</button></a>
</div>
            </div>
        </div>
    </div>
</body>

</html>
