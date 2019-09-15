<div class="sidebar-header">
                <h3>Administrativo</h3>
            </div>
            
            <ul class="list-unstyled components">
                
                <p>{{ Auth::user()->email }}</p>

                <li>
                    <a href="{{ route('show.events') }}">Planificación de actividades</a>
                </li>

                <li>
                    <a href="{{ route('administrativos.posts') }}">Publicar</a>
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