<title>Administración | Tramos Horarios</title>
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Espacios de Tiempo</li>
                  </ol>
          </div>
        </div>
          <!-- FORM ADD NEW TIMESLOT -->
        <div class="container">
            <div class="row">
                <div class="col-md-auto mb-2">
                <a href="#" class="btn btn-success" title="Nuevo" data-bs-toggle="modal" data-bs-target="#examplemodal">
                    <i class="fas fa-plus fa-fw" aria-hidden="true"></i>
                    <span class="d-none d-xl-inline-block">Nuevo TimeSlot</span>
                </a>
                <div class="modal fade" id="examplemodal" tabindex="-1" aria-labelledby="examplemodalLabel" aria-hidden="true" data-bs-keyboard="false">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo Timeslot</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="?controller=TimeSlotsController&action=crearTimeSlot" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <!--<div class="row mt-3">
                                    <label for="titulo-pelicula" class="form-label">Día de la Semana</label>
                                    <select class="form-select" aria-label="Default select example" name="dayofweek-timeslots" require>
                                        <option selected disabled value="">-- Selecciona un día de la semana --</option>
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sábado" disabled>Sábado</option>
                                        <option value="Domingo" disabled>Domingo</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>-->
                                <div class="row mt-3 ms-auto">
                                    <label for="validationCustom04" class="form-label">Día de la Semana</label>
                                    <select class="form-select" id="validationCustom04" name="dayofweek-timeslots" required>
                                        <option selected disabled value="">-- Selecciona un día de la semana --</option>
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sábado" disabled>Sábado</option>
                                        <option value="Domingo" disabled>Domingo</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Selecciona un día válido
                                    </div>
                                </div>
                                <div class="row mt-4 mb-5">
                                    <div class="col-md-6">
                                        <label for="titulo-pelicula" class="form-label">Tiempo de Inicio</label>
                                        <input type="time" class="form-control" id="titulo-pelicula" aria-describedby="emailHelp" name="starttime-timeslots" required>
                                        <div class="invalid-feedback">
                                            Selecciona una hora de inicio válida
                                        </div>
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <label for="genero-pelicula" class="form-label">Tiempo de Finalización</label>
                                        <input type="time" class="form-control" id="genero-pelicula" aria-describedby="emailHelp" name="endtime-timeslots" required>
                                        <div class="invalid-feedback">
                                            Selecciona una hora de finalización válida
                                        </div>
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
                </div>
                <div class="col-sm mb-2">
                    <form class="input-group" action="?controller=TimeSlotsController&action=buscarTimeSlot" method="POST" enctype="multipart/form-data">
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
                        <i class="fa-solid fa-trash"></i> Eliminar TimeSlots
                    </a>
                </div>
            </div>
        </div>

    <div class="table-responsive mt-2">
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
                                <li><a class="dropdown-item" href="#" onclick="confirmarBorrado(<?= $timeslot->id ?>);" ><i class="fa-solid fa-trash"></i>&nbsp; Borrar</a></li>
                                <li><a class="dropdown-item" href="#" onclick="getInfo(<?= $timeslot->id ?>);"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Modificar</a></li>
                                <!--<li><hr class="dropdown-divider"></li>-->                           
                            </ul>
                        </div>
                    </td>
                    <div> 
                </tr>
            <?php endforeach; ?>
            <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editmodal" class="text-start">Editar Recurso</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" enctype="multipart/form-data" id="edit-form" class="needs-validation" novalidate>

                        <!-- Mandar el ID al controlador del recurso que tiene que modificar -->
                        <input type="hidden" value="" id="id" name="id">
                        
                        <div class="row mt-3 ms-auto">
                            <label for="day-select" class="form-label">Día de la Semana</label>
                                <select class="form-select" id="day-select" name="day-select" required>
                                    <option selected disabled value="">-- Selecciona un día de la semana --</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miercoles">Miercoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sábado" disabled>Sábado</option>
                                    <option value="Domingo" disabled>Domingo</option>
                                </select>
                            <div class="invalid-feedback">
                                Selecciona un día válido
                            </div>
                        </div>
                        <div class="row mt-4 mb-5">
                            <div class="col-md-6">
                                <label for="starttime" class="form-label">Tiempo de Inicio</label>
                                <input type="time" class="form-control" id="starttime" aria-describedby="emailHelp" name="starttime" required>
                            <div class="invalid-feedback">
                                Selecciona una hora de inicio válida
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto">
                            <label for="endtime" class="form-label">Tiempo de Finalización</label>
                                <input type="time" class="form-control" id="endtime" aria-describedby="emailHelp" name="endtime" required>
                            <div class="invalid-feedback">
                                Selecciona una hora de finalización válida
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-primary" onclick="enviarDatos()">Modificar timeslot<button>
                            <input type="submit" id="sendForm" value="Modificar timeslot" style="display: none !important;">
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div> 
            </tbody>
        </table>
        <?php $paginacion->render(); ?>
    </div>
</div>
</section>
<script>
    const myModal = new bootstrap.Modal(document.getElementById('editmodal'));
    const dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
    var daySelect = document.getElementById('day-select');
    var starttime = document.getElementById('starttime');
    var endtime = document.getElementById('endtime');
    var id = document.getElementById('id');
    var timeSlots = <?php echo json_encode($data['timeslots']); ?> 

    console.log(timeSlots);
    console.log(dias);

    function getInfo(idtimeslot){        
        let infoTimeSlot = [];
        let days = [];

        for(var i = 0; i < timeSlots.length; i++){
            if(timeSlots[i]['id'] == idtimeslot){
                infoTimeSlot.push(timeSlots[i]);
            }
        }

        console.log(infoTimeSlot);

        for(var i = 0; i < dias.length; i++){
            if(dias[i] != infoTimeSlot[0]['dayofweek']){
                days.push(dias[i]);
            }
        }

        console.log(infoTimeSlot);

        daySelect.innerHTML= "";
        let option = document.createElement("option");
        option.text = infoTimeSlot[0]['dayofweek'];
        option.value = infoTimeSlot[0]['dayofweek'];
        daySelect.add(option);

        for(var i = 0; i < days.length; i++){
            let option = document.createElement("option");
            option.text = days[i];
            option.value = days[i];
            daySelect.add(option);
        }
        
        starttime.value = infoTimeSlot[0]['starttime'];
        endtime.value = infoTimeSlot[0]['endtime'];
        id.value = <?= $timeslot->id ?>;
       

        myModal.show();
    
    }

    function enviarDatos(){
        let idModificar = document.getElementById('id').value;
        document.getElementById("edit-form").action = "?controller=TimeSlotsController&action=actualizarTimeSlot&id=" + idModificar; 
        swal({
                title: "¿Estás seguro?",
                text: "Si modificas este Tramo Horario se modificará también en los recursos que hayan sido reservados",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("¡Tramo Horario modificado correctamente!", {
                    icon: "success",
                    });
                    setTimeout(() => {
                        document.getElementById("sendForm").click()
                        //window.location.href = "" + ;
                    }, 2000);
                } else {
                    swal("¡Su Tramo Horario no ha sido modificado!");
                }
            });
    }

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

    function confirmarBorrado(idTimeSlot){
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
                        window.location.href = "?controller=TimeSlotsController&action=borrarTimeSlot&id=" + idTimeSlot;
                    }, 2000);
                } else {
                    swal("¡Su recurso no ha sido borrado!");
                }
            });
    }
</script>