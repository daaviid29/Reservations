<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="Assets/css/custom-admin.css">
    <link rel="stylesheet" href="Assets/fullcalendar/css/main.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>
    <body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">I.E.S Celia Viñas</div>
        <!--<i class='bx bx-menu' id="btn" ></i>-->
        <i class="fa-solid fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
          <!--<i class='bx bx-search' ></i>-->
          <i class="fa-solid fa-magnifying-glass bx-search"></i>
         <input type="text" placeholder="Buscar...">
         <span class="tooltip">Buscar</span>
      </li>
      <li>
       <a href="?controller=ResourcesController&action=resourcesUser">
         <i class="fa-regular fa-folder"></i>
         <span class="links_name">Recursos</span>
       </a>
       <span class="tooltip">Recursos</span>
     </li>
     <!--<li>
       <a href="#">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Messages</span>
       </a>
       <span class="tooltip">Messages</span>
     </li>-->
     <li>
       <a href="?controller=CalendarController&action=mostrarCalendario">
         <i class="fa-regular fa-calendar"></i>
         <span class="links_name">Calendario</span>
       </a>
       <span class="tooltip">Calendario</span>
     </li>
     <li>
       <a href="#">
         <i class="fa-solid fa-gear"></i>
         <span class="links_name">Configuración</span>
       </a>
       <span class="tooltip">Configuración</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="image/profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <!--<i class="fa-solid fa-outdent bx bx-log-out" id="log_out"></i>-->
         <a class="fa-solid fa-outdent bx bx-log-out" id="log_out" href="?controller=UsersController&action=cerrarSesion"></a>
         <!--<i class='bx bx-log-out' id="log_out" ></i>-->
     </li>
    </ul>
  </div>