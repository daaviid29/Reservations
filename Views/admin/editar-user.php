<?php require_once "Themplates/sidebar.php" ?>


<section class="home-section">
    <?php require_once "Themplates/navbar.php" ?>

    <style>
        body{
            background-color: #eeeeee !important;
        }
        .mt-5{
            margin-top: 4rem !important;
        }
    </style>
    <?php foreach($data['getUser'] as $user): ?>  
    <div class="container mt-5">
        <div class="container-breadcum row mt-5">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item"><a href="?controller=UsersController&action=mostrarUsuarios">Usuarios</a></li>
                          <li class="breadcrumb-item active" aria-current="page"><?= $user->realname ?>&nbsp;<?= $user->lastname ?></li>
                  </ol>
          </div>
        </div>

    <div class="container mb-5">
    <div class="row">
        <div class="col-sm-5 col-md-6">
            <img src="<?= $user->image?>" width="85%">
        </div>
        <form action="?controller=UsersController&action=actualizarUser&id=<?= $user->id?>" method="POST" enctype="multipart/form-data" class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                <div class="row g-3 mt-5">
                    <div class="col">
                        <label for="titulo-pelicula" class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="<?= $user->realname?>" name="realname-user" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="genero-pelicula" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" placeholder="<?= $user->lastname?>" name="lastname-user" aria-label="Last name">
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col">
                        <label for="genero-pelicula" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" placeholder="<?= $user->username?>" name="username-user" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="genero-pelicula" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="<?= $user->email?>" name="email-user" aria-label="Last name">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="genero-pelicula" class="form-label">Rol</label>
                        <select class="form-select" aria-label="Default select example" name="role-user">
                            <option value="-" disabled="disabled" selected="selected">-- Selecciona una opción --</option>
                            <option value="0">Administrador</option>
                            <option value="1">Usuario</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-4 mt-2">
                    <div class="input-group mb-4">
                        <input type="file" class="form-control" id="upload-files" name="file-user" required="required" accept="image/*">
                        <label class="input-group-text" for="upload-files">Subir</label>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="input-group mb-4">
                    <input type="submit" class="btn btn-primary" value="Actualizar usuario">
                    </div>
                </div>
        </form>
    </div>
    </div>
    <?php endforeach; ?>
<?php require_once "Themplates/footer.php" ?>