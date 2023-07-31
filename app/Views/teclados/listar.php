<?=$cabecera;?>

<a class="btn btn-success" href="<?=base_url('crear')?>">Crear nuevo teclado</a>

<br>
<br>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($teclados as $teclado): ?>
                <tr>
                    <td><?php echo $teclado ['id'];?></td>
                    <td>
                        <img class="img-thumbnail" width="100" src="<?=base_url('uploads/'.$teclado['imagen'])?>" alt="teclado">
                        
                    </td>
                    <td><?php echo $teclado ['nombre'];?></td>
                    <td>
                        <a href="<?=base_url('editar/'.$teclado['id'])?>" class="btn btn-info" type="button">Editar</a>
                        <a href="<?=base_url('eliminar/'.$teclado['id'])?>" class="btn btn-danger" type="button">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
<?=$pie;?>

