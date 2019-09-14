<div class="sidebar-header">
                <h3>Dashboard Docente</h3>
            </div>
            
            <ul class="list-unstyled components">


                <li>
                    <a href="{{ route('logout') }} "(click)="onClick()" class="logout">
                            {{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </ul>