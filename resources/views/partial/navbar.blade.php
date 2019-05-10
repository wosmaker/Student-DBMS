<nav class="navbar navbar-expand-md  navbar-dark fixed-top box-shadow" >
        <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 20px; color: #ffffff;">SDBR</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nbar" aria-controls="nbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nbar">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2"  data-toggle="modal" data-target="#login">{{ __('Login') }}</button>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <button class="btn btn-outline-warning my-2 my-sm-0 mr-sm-2" data-toggle="modal" data-target="#register">{{ __('Register') }}</button>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class=" btn btn-outline-info nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class=" dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                    <!-- This menu is hidden in bigger devices with d-sm-none.
                The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
                <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Tasks</a>
                    <a class="dropdown-item" href="#">Etc ...</a>
                </div>
            </ul>
        </div>
</nav>

@include('partial.modal-login')
@include('partial.modal-register')
