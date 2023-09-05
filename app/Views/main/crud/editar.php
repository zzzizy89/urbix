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

                                <input type="hidden" name="id" value="<?=$teclado['id']?>">

                                <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input id="nombre" value="<?=$teclado['nombre']?>" class="form-control" type="text" name="nombre">
                                </div>

                                <div class="form-group">
                                        <label for="imagen">Imagen:</label>
                                        <br>
                                        <img class="img-thumbnail" width="100" src="<?=base_url('uploads/'.$teclado['imagen'])?>" alt="teclado">
                                        <input id="imagen" class="form-control-file" type="file" name="imagen">
                                </div>

                                <button class="btn btn-success" type="submit">Actualizar</button>
                                <a href="<?=base_url('listar');?>" class="btn btn-info">Cancelar</a>

                        </form>

                </p>
        </div>
</div>

<?=$pie;?>
