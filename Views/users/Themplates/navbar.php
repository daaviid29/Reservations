<style>
  .home-section{
    background: #eeeeee !important;
  }
  .modal-backdrop.show{
    z-index: 1;
  }
  .modal-backdrop{
    z-index: 0 !important;
    --bs-backdrop-bg: none !important;
  }
  .mt-5{
    margin-top: 4rem !important;
  }
  p.dropdown-toggle.container-fluid.mt-3 {
    /*color: #ffffff !important;*/
    color: #11101D !important;
  }
</style>
<section class="home-section">
  <nav class="navbar navbar-dark fixed-top bg-dark mb-5">
        <div class="container-fluid">
          <a class="navbar-brand">  </a>
          <div>
            <p type="button" class="dropdown-toggle container-fluid mt-3" data-bs-toggle="dropdown">
              <i class="fa-solid fa-user"></i>
            </p>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" type="button">Mi perfil</a></li>
              <li><a class="dropdown-item" type="button">Configuración</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" type="button">Cerrar sesión</a></li>
            </ul>
          </div>
      </div>
  </nav>