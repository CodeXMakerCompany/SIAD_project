<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
				
        	 @include('includes.toggleSidebar')
            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-docentes">
                <div class="container-fluid">

                    
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="nav navbar-nav ml-auto content-colorB">

                            <li class="dropstyle">
                                <a href="{{ route('admin.area') }}"><i class="fas fa-home"></i> Inicio</a>
                            </li>

                            <li class="dropdown dropstyle">
                                <a href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-file"></i>&nbsp;&nbsp;Catalogos <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="cuatrimestre.php">Cuatrimestres</a>
                                    </li>
                                    <li>
                                        <a href="grupos.php">Grupos</a>
                                    </li>
                                    <li>
                                        <a href="turnos.php">Turnos</a>
                                    </li>
                                    <li>
                                        <a href="asignaturas.php">Asignaturas</a>
                                    </li>
                                </ul>
                            </li>



                        <li class="dropdown  dropstyle">
                            <a href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-lock"></i> Administracion <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('admin.añadirDocente') }}">Admin de Docentes</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.añadirAlumno') }}">Admin de Estudiantes</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.añadirAdministrativo') }}">Admin Administrativos</a>
                                </li>
                            </ul>
                        </li>

                    <li class="dropdown dropstyle">
                        <a href="#" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-toolbox"></i>Herramientas </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-dropdown-link" href="{{ route('ver.administrativos') }}">Permisos</a>
                            </li>
                            <li>
                                <a class="nav-dropdown-link" href="{{ route('show.backups') }}">Backup BD</a>
                            </li>
                            <li>
                                <a class="nav-dropdown-link" href="{{ route('crear.mensaje') }}">Enviar mensaje</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropstyle">
                    <a href="{{ route('logout') }} "(click)="onClick()" class="logout">
                            <i class="fas fa-power-off"></i> {{ __('Logout') }}
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>           
                
                    <li>
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                            <span>Menu</span>
                        </button>
                    </li>
                        </ul>
                    </div>
                </div>
            </nav>


         <main class="py-4">
            @yield('content')
        </main>

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/logout.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>