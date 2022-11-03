<style>
    .user-img{
        width: 50px;
        height: 50px;
        border-radius: 50px;
    }
</style>
<title>Administración | Usuarios</title>
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                  </ol>
          </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-auto mb-2">
                    <a href="#" class="btn btn-success" title="Nuevo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus fa-fw" aria-hidden="true"></i>
                                <span class="d-none d-xl-inline-block">Nuevo Usuario</span>
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="index.php?controller=UsersController&action=crearUsuario" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                            <div class="row mt-3">
                                                <div class="col-md-6 ms-auto">
                                                    <label for="genero-pelicula" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="realname-user" required>
                                                    <div class="invalid-feedback">
                                                        Selecciona un nombre válido
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ms-auto">
                                                    <label for="genero-pelicula" class="form-label">Apellidos</label>
                                                    <input type="text" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="lastname-user">
                                                    <div class="invalid-feedback">
                                                        Selecciona un apellido válido
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                <label for="genero-pelicula" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="email-user" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="genero-pelicula" class="form-label">Rol</label>
                                                    <select class="form-select" aria-label="Default select example" name="role-user" required>
                                                        <option value="" disabled selected>-- Selecciona una opción --</option>
                                                        <option value="1">Usuario</option>
                                                        <option value="0">Administrador</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Debes de elegir un rol de usuario
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <label for="titulo-pelicula" class="form-label">Nombre del usuario</label>
                                                    <input type="text" class="form-control" id="titulo-pelicula" aria-describedby="emailHelp" name="username-user" required>
                                                    <div class="invalid-feedback">
                                                        Selecciona un nombre de usuario válido
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="genero-pelicula" class="form-label">Contraseña</label>
                                                    <input type="password" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="password-user" required>
                                                    <div class="invalid-feedback">
                                                        Elige una contraseña
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4 mt-2">
                                                <div class="input-group mb-4">
                                                    <input type="file" class="form-control" id="upload-files" name="file-user" required accept="image/*">
                                                    <label class="input-group-text" for="upload-files">Subir</label>
                                                    <div class="invalid-feedback">
                                                        Debes de subir una imágen
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer mt-2">
                                                <input type="submit" class="btn btn-primary" value="Añadir usuario">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                </div>
                <div class="col-sm mb-2">
                    <form class="input-group" action="?controller=UsersController&action=buscarUsuario" method="POST" enctype="multipart/form-data">
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
                    <th scope="col">Fotografía</th>
                    <th scope="col">Nombre y Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['users'] as $user): ?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><img src="<?= $user->image ?>" alt="user" class="user-img"></td>
                    <td><?= $user->realname ?>&nbsp;<?= $user->lastname ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->username ?></td>
                    <td>
                        <?php if($user->type == 0): ?>
                            <?= "Administrador"; ?>
                        <?php else: ?>
                            <?= "Usuario"; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#" onclick="confirmarBorrado(<?= $user->id ?>)"><i class="fa-solid fa-trash"></i>&nbsp; Borrar</a></li>
                                <li><a class="dropdown-item" href="?controller=UsersController&action=mostrarUser&id=<?= $user->id ?>"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Modificar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-key"></i>&nbsp; Resetear Contraseña</a></li>                                       
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
    
    function confirmarBorrado(idUser){
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
                        window.location.href = "?controller=UsersController&action=borrarUser&id=" + idUser;
                    }, 2000);
                } else {
                    swal("¡Su recurso no ha sido borrado!");
                }
            });
        }
</script>