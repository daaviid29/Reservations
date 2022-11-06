<style>
    .resource-img{
        width: 70px;
        height: 70px;
        border-radius: 50px;
    }
</style>
<title>Usuario | Reservar</title>
<div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Usuario</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Recursos</li>
                  </ol>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-light mt-3 text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Localización</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['resources'] as $resource): ?>
                    
                    <tr class="clickableRow align-middle">
                        <th scope="row"><?= $resource->id; ?></th>
                        <td><img src="<?= $resource->image; ?>" class="resource-img" alt="img-resource"></td>
                        <td><?= $resource->name ?></td>
                        <td><?= $resource->description ?></td>
                        <td><?= $resource->location ?></td>
                        <td>
                            <div>
                                <a href="#" class="btn btn-success" title="Nuevo" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="changeValue(<?= $resource->id; ?>)">
                                    <span class="d-xl-inline-block">Reservar</span>
                                    <input type="hidden" value="<?= $resource->id; ?>">
                                </a>
                            </div>
                            <!--<button type="button" class="btn btn-danger">Cancelar</button>-->
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" class="text-start">Reservar recurso</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <form action="" id="reservar-form" method="POST" enctype="multipart/form-data">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <!--<label for="titulo-pelicula" class="form-label" name="">Día de la Reserva</label>
                                        <select class="form-select" aria-label="Default select example" id="dayofweek" onchange="changeTimeSlot();">
                                            <option selected disabled>-- Selecciona una opción --</option>
                                            <option value="Lunes">Lunes</option>
                                            <option value="Martes">Martes</option>
                                            <option value="Miercoles">Miercoles</option>
                                            <option value="Jueves">Jueves</option>
                                            <option value="Viernes">Viernes</option>
                                            <option value="Sábado" disabled>Sábado</option>
                                            <option value="Domingo" disabled>Domingo</option>
                                        </select>-->
                                        <label for="genero-pelicula" class="form-label">Fecha de la Reserva</label>
                                        <input type="date" name="fecha-reserva" class="form-control" id="date-select" onchange="changeTimeSlot()">
                                    </div>
                                <div class="col-md-6 ms-auto">
                                    <label for="genero-pelicula" class="form-label">Time Slot</label>
                                    <select class="form-select" aria-label="Default select example" id="timeslot" name="timeslot-resource">
                                        <option selected disabled>-- Selecciona una opción --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <label for="genero-pelicula" class="form-label">Observaciones</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description-resource"></textarea>
                                    <label for="floatingTextarea2"></label>
                                </div>
                            </div>    
                            <!--<div class="row mt-4">
                                <span id="prueba"></span>
                            </div>-->
                            <div class="modal-footer mt-2">
                                <input type="submit" class="btn btn-primary" value="Reservar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var timeslot = <?php echo json_encode($data['timeslots']); ?> 
    //console.log(allReservations);

    function changeTimeSlot(){
        let fechaComoCadena = document.getElementById('date-select').value;
        let diaSeleccionado = document.getElementById('dayofweek');
        let numeroDia = new Date(fechaComoCadena).getDay();
        let nombreDia = dias[numeroDia];
        let timeslots = document.getElementById('timeslot');   
        let dayofweekarray = [];

        for(var i = 0; i < timeslot.length; i++){
            if(timeslot[i]['dayofweek'] == nombreDia){
                dayofweekarray.push(timeslot[i]);
            }
        }

        //console.log(dayofweekarray);

        document.getElementById("timeslot").innerHTML= "";
        let option = document.createElement("option");
        option.text = "-- Selecciona una opción --";
        option.value = "selected" + " disabled";
        timeslots.add(option);

        for(var i = 0; i < dayofweekarray.length; i++){
            let option = document.createElement("option");
            option.text = dayofweekarray[i]['starttime'] + " | " + dayofweekarray[i]['endtime'];
            option.value = dayofweekarray[i]['id'];
            console.log(option)
            timeslots.add(option);
        }

    }

    function changeValue(idModificar){
        myModal.show();
        document.getElementById("reservar-form").action = "?controller=ResourcesController&action=reservarRecurso&id=" + idModificar; 
    }

</script>