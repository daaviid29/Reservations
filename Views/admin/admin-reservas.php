<title>Administración | Reservas</title>
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Reservas</li>
                  </ol>
          </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-auto mb-2">
                <a href="#" class="btn btn-success" title="Nuevo" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus fa-fw" aria-hidden="true"></i>
                    <span class="d-none d-xl-inline-block">Nueva Reserva</span>
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo Timeslot</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm mb-2">
                    <form class="input-group" action="?controller=TimeSlotsController&amp;action=buscarTimeSlot" method="POST" enctype="multipart/form-data">
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
                        <i class="fa-solid fa-trash"></i> Eliminar Reservas
                    </a>
                </div>
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
<script>
    function confirmarBorrado(){
            swal({
                title: "¿Estás seguro?",
                text: "¿Desea borrar TODAS las reservas?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("¡Reservas borradas correctamente!", {
                    icon: "success",
                    });
                    setTimeout(() => {
                        window.location.href = "?controller=ResourcesController&action=deleteAllReservations";
                    }, 2000);
                } else {
                    swal("¡Sus reservas no han sido borradas!",{
                        icon: "error"
                    });
                }
            });
        }
</script>