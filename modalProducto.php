<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./Controllers/cargar.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select class="form-select" aria-label="Default select example" name="categoriaProd" required>
                            <option value="" selected disabled>Categoria</option>
                            <option value="Bicicletas">Bicicletas</option>
                            <option value="Motos">Motos</option>
                            <option value="Alquileres">Alquileres</option>
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input name="nombreProd" required class="form-control" type="text" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input name="precioProd" required class="form-control" type="number"  step=0.01>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input name="cantidadProd" required class="form-control" type="number" >
                    </div>
                    <input type="submit" class="btn btn-primary" value="Cargar">
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>