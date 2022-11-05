<style>
    .resource-img{
        width: 100px;
        height: 100px;
        border-radius: 50px;
    }
</style>
<title>Usuario | Mis Reservas</title>
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Usuario</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Mis reservas</li>
                  </ol>
          </div>
        </div>

        <div class="table-responsive">
        <table class="table table-hover table-light mt-3 text-center">
            <thead>
                <tr>
                    <th scope="col">Día de la semana</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tramo horario</th>
                    <th scope="col">Nombre del recurso</th>
                    <th scope="col">Imagen del recurso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['myreservations'] as $reservation): ?>
                <tr class="clickableRow align-middle">
                    <td><?= $reservation->dayofweek ?></td>
                    <td><?= $reservation->date ?></td>
                    <td><?= $reservation->starttime ?> | <?= $reservation->endtime ?></td>
                    <td><?= $reservation->nameresource ?></td>
                    <td><img src="<?= $reservation->image ?>" class="resource-img" alt="img-resource"></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#" onclick="confirmarBorrado(<?= $user->id ?>)"><i class="fa-solid fa-trash"></i>&nbsp; Cancelar Reserva</a></li>                                     
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