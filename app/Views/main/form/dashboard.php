<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agrega los enlaces a tus archivos CSS y scripts JS aquí -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css');?>">
    <title>Perfil de Usuario</title>
</head>
<body>

<div class="container">
    <div class="profile">
        <div class="profile-header">
            <h2>Mi Perfil</h2>
            <button class="edit-profile-btn" onclick="enableEdit()">Editar</button>
        </div>
        <div class="profile-details">
            <div class="row">
                <div class="col-6">
                    <label for="user-id">User ID</label>
                    <input type="text" id="user-id" value="123" disabled>
                </div>
                <div class="col-6">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" value="Nombre de Usuario" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="usuario@ejemplo.com" disabled>
                </div>
                <div class="col-6">
                    <label for="phone">Teléfono</label>
                    <input type="tel" id="phone" value="1234567890" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="bio">Bio</label>
                    <textarea id="bio" rows="4" disabled>Tu descripción detallada</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="save-profile-btn" onclick="saveChanges()">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function enableEdit() {
        const inputs = document.querySelectorAll('input, textarea');
        inputs.forEach(input => input.removeAttribute('disabled'));
    }

    function saveChanges() {
        // Aquí puedes agregar la lógica para guardar los cambios en la base de datos
        alert("Cambios guardados con éxito");
    }
</script>

</body>
</html>
