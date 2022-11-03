<title>Administración | Inicio</title>
<div class="container mt-5">
    <div class="container-breadcum row">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb"
            class="mt-5 position-relative top-5 start-50 translate-middle text-center col-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Administración</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inicio</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <p class="mb-2 h6">Recursos</p>
                            <h2 class="mb-1 "><?= $data['resources'][0]->registros ?></h2>
                            <!--<p class="mb-0 text-muted"><span class="text-success">(+0.35%) <i class="fe fe-arrow-up text-success"></i></span>Increase</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <p class="mb-2 h6">Usuarios</p>
                            <h2 class="mb-1 "><?= $data['users'][0]->registros ?></h2>
                            <!--<p class="mb-0 text-muted"><span class="text-success">(+0.35%) <i class="fe fe-arrow-up text-success"></i></span>Increase</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <p class="mb-2 h6">Tramos Horarios</p>
                            <h2 class="mb-1 "><?= $data['timeslots'][0]->registros ?></h2>
                            <!--<p class="mb-0 text-muted"><span class="text-success">(+0.35%) <i class="fe fe-arrow-up text-success"></i></span>Increase</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <p class="mb-2 h6">Total Reservas</p>
                            <h2 class="mb-1 "><?= $data['reservations'][0]->registros ?></h2>
                            <!--<p class="mb-0 text-muted"><span class="text-success">(+0.35%) <i class="fe fe-arrow-up text-success"></i></span>Increase</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>