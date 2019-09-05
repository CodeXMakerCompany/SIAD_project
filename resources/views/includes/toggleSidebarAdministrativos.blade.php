<div class="sidebar-header">
                <h3>Administrativo</h3>
            </div>
            
            <ul class="list-unstyled components">
                @auth
                logged user stuff here:
                <p>{{ Auth::user() }}</p>
                @else
                guest stuff here
                @endauth
                <p>{{ Auth::user()->email }}</p>

                <li>
                    <a href="">Planificación de actividades</a>
                </li>

                <li>
                    <a href="">Publicar</a>
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