<title>Usuario | Calendario</title>
    <div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Usuario</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calendario</li>
              </ol>
          </div>
        </div>
        <div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" class="text-start">Reservar recurso</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="?controller=ResourcesController&action=reservarRecurso&id=<?= $resource->id; ?>" method="POST" enctype="multipart/form-data" id="form">
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
                          <input type="date" name="fecha-reserva" class="form-control" id="start" onchange="changeTimeSlot()">
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
                          <textarea class="form-control" placeholder="Leave a comment here" id="remarks" style="height: 100px" name="description-resource"></textarea>
                          <label for="remarks"></label>
                        </div>
                    </div>    
                    <div class="modal-footer mt-2">
                      <input type="submit" class="btn btn-info" value="Cancelar">
                      <input type="submit" class="btn btn-danger" value="Eliminar">
                      <input type="submit" class="btn btn-primary" id="btnAccion" value="Reservar">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <div id="calendario"></div>
    </div>
</section>

<script>
  
  const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
  let frm = document.getElementById('form');
  const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
  var resources = <?php echo json_encode($data['allReservations']); ?>  
  var timeslot = <?php echo json_encode($data['timeslots']); ?>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'es',
          headerToolbar: {
            left: 'prev, next, today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, listWeek'
          },
          events: resources,
          dateClick: function(info){
            console.log(info);
            document.getElementById('start').value = info.dateStr;
            myModal.show();    
          }
        });
        calendar.render();
        frm.addEventListener('submit', function(e){
          e.preventDefault();
          const dayofweek = document.getElementById('dayofweek').value;
          const timeslot = document.getElementById('timeslot').value;
          const remarks = document.getElementById('remarks').value;

          if(dayofweek == '' || timeslot == '' || remarks == ''){
            swal({
              title: "Oops...",
              text: "¡Todos los campos son requeridos!",
              icon: "error",
              button: "Ok",
            });
          }else{
            
          }
        });
    });

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

        /*document.getElementById("timeslot").innerHTML= "";
        let option = document.createElement("option");
        option.text = "-- Selecciona una opción --";
        option.value = "selected" + " disabled";
        timeslots.add(option);*/

        for(var i = 0; i < dayofweekarray.length; i++){
            let option = document.createElement("option");
            option.text = dayofweekarray[i]['starttime'] + " | " + dayofweekarray[i]['endtime'];
            option.value = dayofweekarray[i]['id'];
            console.log(option)
            timeslots.add(option);
        }

    }
    
</script>