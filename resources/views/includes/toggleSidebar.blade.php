<div class="sidebar-header">
                <h3>Administrador</h3>
            </div>
            
            <ul class="list-unstyled components">
                @auth
                logged user stuff here:
                <p>{{ Auth::user() }}</p>
                @else
                guest stuff here
                @endauth
                <p>{{ Auth::user()->email }}</p>

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Alumnos</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Añadir</a>
                        </li>
                        <li>
                            <a href="#">Eliminar</a>
                        </li>
                        <li>
                            <a href="#">Actualizar</a>
                        </li>
                        <li>
                            <a href="#">Ver</a>
                        </li>
                    </ul>
                </li>
                
                <li class="active">
                    <a href="#docenteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Docentes</a>
                    <ul class="collapse list-unstyled" id="docenteSubmenu">
                        <li>
                            <a href="#">Añadir</a>
                        </li>
                        <li>
                            <a href="#">Eliminar</a>
                        </li>
                        <li>
                            <a href="#">Actualizar</a>
                        </li>
                        <li>
                            <a href="#">Ver</a>
                        </li>
                    </ul>
                </li>
                
                <li class="active">
                    <a href="#administrativoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrativos</a>
                    <ul class="collapse list-unstyled" id="administrativoSubmenu">
                        <li>
                            <a href="#">Añadir</a>
                        </li>
                        <li>
                            <a href="#">Eliminar</a>
                        </li>
                        <li>
                            <a href="#">Actualizar</a>
                        </li>
                        <li>
                            <a href="#">Ver</a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#admCarreraSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cordinador de carrera</a>
                    <ul class="collapse list-unstyled" id="admCarreraSubmenu">
                        <li>
                            <a href="#">Añadir</a>
                        </li>
                        <li>
                            <a href="#">Eliminar</a>
                        </li>
                        <li>
                            <a href="#">Actualizar</a>
                        </li>
                        <li>
                            <a href="#">Ver</a>
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