<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                  </ol>
          </div>
        </div>

        <a href="#" class="btn btn-success" title="Nuevo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus fa-fw" aria-hidden="true"></i>
                    <span class="d-none d-xl-inline-block">Nuevo</span>
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo usuario</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?controller=UsersController&action=crearUsuario" method="POST" enctype="multipart/form-data">
                                <div class="row mt-3">
                                    <div class="col-md-6 ms-auto">
                                        <label for="genero-pelicula" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="realname-user" required="required">
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <label for="genero-pelicula" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="lastname-user">
                                    </div>
                                </div>

                                <div class="row mt-4 mt-2">
                                    <div class="ms-auto">
                                        <label for="genero-pelicula" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="email-user">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="titulo-pelicula" class="form-label">Nombre del usuario</label>
                                        <input type="text" class="form-control" id="titulo-pelicula" aria-describedby="emailHelp" name="username-user" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="genero-pelicula" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="password-user" required="required">
                                    </div>
                                </div>

                                <div class="row mt-4 mt-2">
                                    <div class="input-group mb-4">
                                        <input type="file" class="form-control" id="upload-files" name="file-user" required="required" accept="image/*">
                                        <label class="input-group-text" for="upload-files">Subir</label>
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

        <table class="table table-hover table-light mt-3 text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fotografía</th>
                    <th scope="col">Nombre y Apellidos</th>
                    <!--<th scope="col">Email</th>-->
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
                    <!--<td><?= $user->email ?></td>-->
                    <td><?= $user->username ?></td>
                    <td><?= $user->type ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="?controller=UsersController&action=borrarUser&id=<?= $user->id ?>"><i class="fa-solid fa-trash"></i>&nbsp; Borrar</a></li>
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
</section>