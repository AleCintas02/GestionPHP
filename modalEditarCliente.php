<div class="modal fade" id="editCliente<?php echo $datos['dni']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form action="./Controllers/editarCliente.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">DNI</label>
                        <input   name="dni" type="number" class="form-control" required value="<?php echo $datos['dni'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" required value="<?php echo $datos['nombre'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input name="apellido" type="text" class="form-control" required value="<?php echo $datos['apellido'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input name="correo" type="email" class="form-control" required value="<?php echo $datos['correo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input name="telefono" type="number" class="form-control" required value="<?php echo $datos['telefono'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de instalacion</label>
                        <input name="fecha" type="date" class="form-control" required value="<?php echo $datos['fecha'] ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Cargar">
                </form>
            </div>
            <div class="modal-footer">
            <p class="alert alert-info">Para editar el DNI consulte con el desarrollador</p>
            </div>
        </div>
    </div>
</div>