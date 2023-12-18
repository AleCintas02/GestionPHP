<div class="modal fade" id="modalVender<?php echo $listar['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php 
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $fechaActual = date('d-m-Y');
            
            ?>
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Vender "<?php echo $listar['nombre']; ?>" <?php echo $listar['categoria']; ?> <br>Precio unitario: $<?php echo $listar['precio']; ?> <br>Stock total: <?php echo $listar['cantidad']; ?> </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./Controllers/vender.php" method="post">
                    <input hidden="true" type="number" name="id" value="<?php echo $listar['id']; ?>">
                    <input hidden="true"type="number" name="precio" step=0.01 value="<?php echo $listar['precio']; ?>">
                    <input hidden="true" type="text" name="producto" value="<?php echo $listar['nombre']; ?>">
                    <input hidden="true" type="text" name="categoria"  value="<?php echo $listar['categoria']; ?>">
                    <div class="mb-3">
                        <label class="form-label">DNI Cliente</label>
                        <input name="dni_cliente" required class="form-control" type="number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Cliente</label>
                        <input name="nombre_cliente" required class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Cliente</label>
                        <input name="apellido_cliente" required class="form-control" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono Cliente</label>
                        <input name="telefono_cliente" required class="form-control" type="number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo Cliente</label>
                        <input name="correo_cliente" required class="form-control" type="email">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Cantidad que desea vender</label>
                        <input name="cantidadProd" required class="form-control" type="number">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Vender">
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>