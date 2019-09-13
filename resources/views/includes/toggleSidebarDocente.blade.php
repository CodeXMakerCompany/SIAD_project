<div class="sidebar-header">
                <h3>Docente</h3>
            </div>
            
            <ul class="list-unstyled components">
                

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Material didáctico</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{ route('docente.material') }}">Gestionar</a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#tareasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tareas</a>
                    <ul class="collapse list-unstyled" id="tareasSubmenu">
                        <li>
                            <a href="{{ route('show.tareas') }}">Enviar</a>
                        </li>
                        <li>
                            <a href="{{ route('mostrar.alumnos') }}">Recibidas</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('mostrar.alumnos') }}">Evaluación</a>
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