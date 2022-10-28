
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Reservas</li>
                  </ol>
          </div>
        </div>
        <div class="table-responsive">
        <table class="table table-hover table-light mt-3 text-center">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Día de la semana</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tramo horario</th>
                    <th scope="col">Nombre del recurso</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['allReservations'] as $reservation): ?>
                
                <tr class="clickableRow">
                    <td><?= $reservation->username; ?></td>
                    <td><?= $reservation->dayofweek ?></td>
                    <td><?= $reservation->date ?></td>
                    <td><?= $reservation->starttime ?> | <?= $reservation->endtime ?></td>
                    <td><?= $reservation->name ?></td>
                    <!--<td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash"></i>&nbsp; Borrar</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Modificar</a></li>
                            </ul>
                        </div>
                    </td>-->
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</section>