<!-- 
                                                         
,--. ,--.                ,--------.            ,--.      
|  .'   / ,---. ,--. ,--.'--.  .--',---.  ,---.|  ,---.  
|  .   ' | .-. : \  '  /    |  |  | .-. :| .--'|  .-.  | 
|  |\   \\   --.  \   '     |  |  \   --.\ `--.|  | |  | 
`--' '--' `----'.-'  /      `--'   `----' `---'`--' `--' 
                `---'                                     -->

<?=$cabecera;?>


<div class="card">
        <div class="card-body">
                <h5 class="card-title">Ingresar datos del Teclado</h5>
                <p class="card-text">

                        <form method="post" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">

                                <input type="hidden" name="id_producto" value="<?=$producto['id_producto']?>">

                                <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input id="nombre" value="<?=$producto['nombre']?>" class="form-control" type="text" name="nombre">
                                </div>
                                <div class="form-group">
                                        <label for="precio">Precio:</label>
                                        <input id="precio" value="<?=$producto['precio']?>" class="form-control" type="text" name="precio">
                                </div>

                                <div class="form-group">
                                        <label for="descripcion_prod">Descripción:</label>
                                        <input id="descripcion_prod" value="<?=$producto['descripcion_prod']?>" class="form-control" type="text" name="descripcion_prod">
                                </div>

                                <div class="form-group">
                                        <label for="imagen">Imagen:</label>
                                        <br>
                                        <img class="img-thumbnail" width="100" src="<?=base_url('uploads/'.$producto['imagen'])?>" alt="teclado">
                                        <input id="imagen" class="form-control-file" type="file" name="imagen">
                                </div>

                                <div class="form-group">
                                <label for="tipoprod">Tipo:</label>
                                <select id="tipoprod" class="form-control" name="tipoprod">
                                        <?php foreach ($tipos as $tipo): ?>
                                        <option value="<?= $tipo['id_tipoprod'] ?>" <?= ($tipo['id_tipoprod'] == $producto['id_tipoprod']) ? 'selected' : '' ?>><?= $tipo['tipo'] ?></option>
                                        <?php endforeach; ?>
                                </select>
                                </div>                           

                                <button class="btn btn-success" type="submit">Actualizar</button>
                                <a href="<?=base_url('listar');?>" class="btn btn-info">Cancelar</a>

                        </form>

                </p>
        </div>
</div>

<?=$pie;?>
