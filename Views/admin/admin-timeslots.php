
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Espacios de Tiempo</li>
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
                          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo Timeslot</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="?controller=TimeSlotsController&action=crearTimeSlot" method="POST" enctype="multipart/form-data">
                                <div class="row mt-3">
                                    <label for="titulo-pelicula" class="form-label">Día de la Semana</label>
                                    <select class="form-select" aria-label="Default select example" name="dayofweek-timeslots">
                                        <option selected disabled>-- Seleccionau un día de la semana --</option>
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sábado" disabled>Sábado</option>
                                        <option value="Domingo" disabled>Domingo</option>
                                    </select>
                                </div>
                                <div class="row mt-4 mb-5">
                                    <div class="col-md-6">
                                        <label for="titulo-pelicula" class="form-label">Tiempo de Inicio</label>
                                        <input type="time" class="form-control" id="titulo-pelicula" aria-describedby="emailHelp" name="starttime-timeslots" required="required">
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <label for="genero-pelicula" class="form-label">Tiempo de Finalización</label>
                                        <input type="time" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="endtime-timeslots" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer mt-4">
                                    <input type="submit" class="btn btn-primary" value="Añadir timeslot">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
    <div class="table-responsive">
        <table class="table table-hover table-light mt-3 text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Día de la semana</th>
                    <th scope="col">Tiempo de Inicio</th>
                    <th scope="col">Tiempo de Finalización</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['timeslots'] as $timeslot): ?>
                
                <tr class="clickableRow">
                    <th scope="row"><?= $timeslot->id; ?></th>
                    <td><?= $timeslot->dayofweek ?></td>
                    <td><?= $timeslot->starttime ?></td>
                    <td><?= $timeslot->endtime ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="?controller=TimeSlotsController&action=borrarTimeSlot&id=<?= $timeslot->id ?>"><i class="fa-solid fa-trash"></i>&nbsp; Borrar</a></li>
                                <li><a class="dropdown-item" href="?controller=TimeSlotsController&action=mostrarTimeSlote&id=<?= $timeslot->id ?>"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Modificar</a></li>
                                <!--<li><hr class="dropdown-divider"></li>-->                           
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