<div class="sidebar-header">
                <h3>Docente</h3>
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
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Materia didáctico</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Gestionar</a>
                        </li>
                        <li>
                            <a href="#">Enviar</a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#tareasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tareas</a>
                    <ul class="collapse list-unstyled" id="tareasSubmenu">
                        <li>
                            <a href="#">Enviar</a>
                        </li>
                        <li>
                            <a href="#">Recibidas</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="">Planificación</a>
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