<div class="sidebar-header">
                <h3>Administrador</h3>
            </div>
            
            <ul class="list-unstyled components">
                

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Alumnos</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{ route('admin.añadirAlumno') }}">Añadir</a>
                        </li>
                        <li>
                            <a href="{{ route('ver.alumnos') }}">Gestionar alumnos</a>
                        </li>
                    </ul>
                </li>
                
                <li class="active">
                    <a href="#docenteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Docentes</a>
                    <ul class="collapse list-unstyled" id="docenteSubmenu">
                        <li>
                            <a href="{{ route('admin.añadirDocente') }}">Añadir</a>
                        </li>
                        <li>
                            <a href="{{ route('ver.docentes') }}">Gestionar docentes</a>
                        </li>
                    </ul>
                </li>
                
                <li class="active">
                    <a href="#administrativoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrativos</a>
                    <ul class="collapse list-unstyled" id="administrativoSubmenu">
                        <li>
                            <a href="{{ route('admin.añadirAdministrativo') }}">Añadir</a>
                        </li>
                        <li>
                            <a href="{{ route('ver.administrativos') }}">Gestionar administrativos</a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#admCarreraSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cordinador de carrera</a>
                    <ul class="collapse list-unstyled" id="admCarreraSubmenu">
                        <li>
                            <a href="{{ route('admin.añadirCoordinador') }}">Añadir</a>
                        </li>
                        <li>
                            <a href="{{ route('ver.coordinador') }}">Gestionar coordinadores</a>
                        </li>
                    </ul>
                </li>


                
               



                <li>
                    <a href="{{ route('logout') }} "(click)="onClick()" class="logout">
                            {{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </ul>