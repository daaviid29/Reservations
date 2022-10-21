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

    <?php foreach($data['getResource'] as $resource): ?>  

    <div class="container mt-5">
        <div class="container-breadcum row mt-5">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item"><a href="?controller=ResourcesController&action=mostrarResources">Recursos</a></li>
                          <li class="breadcrumb-item active" aria-current="page"><?= $resource->name?></li>
                  </ol>
          </div>
        </div>

    <div class="container mb-5">
    <div class="row">
        <div class="col-sm-5 col-md-6">
            <img src="<?= $resource->image?>" width="85%">
        </div>
        <form action="index.php?controller=ResourcesController&action=actualizarResource&id=<?= $resource->id?>" method="POST" enctype="multipart/form-data" class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                <div class="row g-3 mt-5">
                    <div class="col">
                        <label for="titulo-pelicula" class="form-label">Nombre del recurso</label>
                        <input type="text" class="form-control" placeholder="<?= $resource->name?>" name="name-resources" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="genero-pelicula" class="form-label">Localización del recurso</label>
                        <input type="text" class="form-control" placeholder="<?= $resource->location?>" name="location-resources" aria-label="Last name">
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="genero-pelicula" class="form-label">Descripción del recurso</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="akmsk" id="floatingTextarea2" style="height: 100px" name="description-resources"></textarea>
                        <label for="floatingTextarea2"><?= $resource->description?></label>
                    </div>
                </div>

                <div class="row mt-4 mt-2">
                    <div class="input-group mb-4">
                        <input type="file" class="form-control" id="upload-files" name="file-resources" required="required" accept="image/*">
                        <label class="input-group-text" for="upload-files">Subir</label>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="input-group mb-4">
                    <input type="submit" class="btn btn-primary" value="Actualizar Recurso">
                    </div>
                </div>
        </form>
    </div>
    </div>
    <?php endforeach; ?>
<?php require_once "Themplates/footer.php" ?>