<title>Administración | Recursos</title>
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Recursos</li>
                  </ol>
          </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-auto mb-2">
                    <a href="#" class="btn btn-success" title="Nuevo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus fa-fw" aria-hidden="true"></i>
                                <span class="d-none d-xl-inline-block">Nuevo Recurso</span>
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo recurso</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="index.php?controller=ResourcesController&action=crearResource" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label for="titulo-pelicula" class="form-label">Nombre del recurso</label>
                                                    <input type="text" class="form-control" id="titulo-pelicula" aria-describedby="emailHelp" name="name-resources" required>
                                                    <div class="invalid-feedback">
                                                        Nombre del recurso incorrecto
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ms-auto">
                                                    <label for="genero-pelicula" class="form-label">Localización del recurso</label>
                                                    <input type="text" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="location-resources" required>
                                                    <div class="invalid-feedback">
                                                        Localización del recurso incorrecta
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                            <label for="genero-pelicula" class="form-label">Descripción del recurso</label>
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description-resources" required></textarea>
                                                    <label for="floatingTextarea2"></label>
                                                    <div class="invalid-feedback">
                                                        Descripción del recurso incorrecta
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4 mt-2">
                                                <div class="input-group mb-4">
                                                    <input type="file" class="form-control" id="upload-files" name="file-resources" required accept="image/*">
                                                    <label class="input-group-text" for="upload-files">Subir</label>
                                                    <div class="invalid-feedback">
                                                        Debes de subir una imagen
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer mt-2">
                                                <input type="submit" class="btn btn-primary" value="Añadir recurso">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                </div>
                <div class="col-sm mb-2">
                    <form class="input-group" action="?controller=ResourcesController&action=buscarResource" method="POST" enctype="multipart/form-data">
                        <input class="form-control" type="text" name="query" value="" autocomplete="off" placeholder="Buscar">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-secondary" id="btn-search">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </button>
                        </span>
                    </form>
                </div>
                <div class="col-sm-auto text-right mb-2">
                    <a type="input" class="btn btn-danger" onclick="confirmarBorrado();">
                        <i class="fa-solid fa-trash"></i> Eliminar Recursos
                    </a>
                </div>
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-hover table-light mt-3 text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Localización</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['resources'] as $resource): ?>
                
                <tr class="clickableRow align-middle">
                    <th scope="row"><?= $resource->id; ?></th>
                    <td><?= $resource->name ?></td>
                    <td><?= $resource->description ?></td>
                    <td><?= $resource->location ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <!--<li><a class="dropdown-item" href="?controller=ResourcesController&action=borrarResource&id=<?= $resource->id ?>"><i class="fa-solid fa-trash"></i>&nbsp; Borrar</a></li>-->
                                <li><a class="dropdown-item" href="#" onclick="confirmarBorrado(<?= $resource->id ?>)"><i class="fa-solid fa-trash"></i>&nbsp; Borrar</a></li>
                                <li><a class="dropdown-item" href="?controller=ResourcesController&action=mostrarResource&id=<?= $resource->id ?>"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Modificar</a></li>
                                <!--<li><hr class="dropdown-divider"></li>-->                           
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php $paginacion->render(); ?>
    </div>
</div>
</section>
    <script>

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()

        function confirmarBorrado(idResource){
            swal({
                title: "¿Estás seguro?",
                text: "Si borras este recurso no podrás recuperarlo y dejará de tener uso en el resto de la aplicación",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("¡Recurso borrado correctamente!", {
                    icon: "success",
                    });
                    setTimeout(() => {
                        window.location.href = "?controller=ResourcesController&action=borrarResource&id=" + idResource;
                    }, 2000);
                } else {
                    swal("¡Su recurso no ha sido borrado!");
                }
            });
        }


    </script>