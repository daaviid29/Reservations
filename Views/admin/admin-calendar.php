<title>Administración | Calendario</title>
    <div class="container mt-5">
        <div class="container-breadcum row">
          <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
                  <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Administración</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Calendario</li>
                  </ol>
          </div>
        </div>
        <div id="calendar"></div>
    </div>
</section>

<script>
  var resources = <?php echo json_encode($data['allReservations']); ?>  
  var timeslot = <?php echo json_encode($data['timeslots']); ?>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
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
</script>