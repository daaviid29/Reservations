<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/jpg" href="Assets/Brand/Logo PNG/Favicon.png"/>
    <title>Login</title>
  </head>
  <body class="bg-dark">
    <section>
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item img-1 min-vh-100 active">
                        <div class="carousel-caption d-none d-md-block">
                          
                        </div>
                      </div>
                      <div class="carousel-item img-2 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                          
                        </div>
                      </div>
                      
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Siguiente</span>
                    </button>
                  </div>
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">
                    <img src="Assets/Brand/Logo PNG/Logo Celia Viñas.png" class="img-fluid" width="25%">
                </div>
                <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
                    <h1 clas="font-weight-bold mb-4">Bienvenido de vuelta</h1>
                    <form class="mb-5" action="index.php?controller=UsersController&action=iniciarSesion" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                          <label for="exampleInputEmail1" class="form-label font-weight-bold">Nombre de Usuario</label>
                          <input type="text" class="form-control bg-dark-x border-0" placeholder="Ingresa tu nombre de usuario" name="username-email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                          <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" name="password-login" id="exampleInputPassword1">
                          <a href="#" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                        </div>
                        <input type="submit" class="btn btn-primary w-100" value="Iniciar Sesión">
                      </form>
                      <!--<p class="font-weight-bold text-center text-muted">O inicia sesión con</p>
                      <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-outline-light flex-grow-1 ms-2"><i class="fa-brands fa-google lead mx-2"></i>Google</button>
                        <button type="submit" class="btn btn-outline-light flex-grow-1 mx-2"><i class="fa-brands fa-facebook-f lead mx-2"></i>Facebook</button>
                      </div>-->
                </div>
                <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                    <!--<p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p> <a href="#" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>-->
                </div>
            </div>
        </div>
      <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>
        <div class="toast-container top-0 end-0 p-3">
          <div id="liveToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
                <div class="toast-header">
                <img src="Assets/Toasts/toast-danger.png" class="rounded me-2" alt="error" width="20" height="20">

                  <strong class="me-auto">Bootstrap</strong>
                  <small class="text-muted">just now</small>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                  See? Just like this.
                </div>
          </div>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script>
      const toastTrigger = document.getElementById('liveToastBtn')
      const toastLiveExample = document.getElementById('liveToast')
      if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
          const toast = new bootstrap.Toast(toastLiveExample)

          toast.show()
        })
      }  
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>