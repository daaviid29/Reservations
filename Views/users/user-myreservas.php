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
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['myreservations'] as $reservation): ?>
                <tr class="clickableRow">
                    <td><?= $reservation->dayofweek ?></td>
                    <td><?= $reservation->date ?></td>
                    <td><?= $reservation->starttime ?> | <?= $reservation->endtime ?></td>
                    <td><?= $reservation->nameresource ?></td>
                    <td><img src="<?= $reservation->image ?>" class="resource-img" alt="img-resource"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</section>