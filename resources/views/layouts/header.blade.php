<header class="header">
    <div class="container">
        <div class="hovermenu ttmenu">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown ttmenu-half"><a href="/">Home</a></li>
                        <li><a href="/users">User list</a></li>
                        <li><a href="/quiz">Quiz</a></li>
                        <li><a href="/homework">Homework</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li><a class="btn btn-primary" href="{{ route('login') }}"><i
                                        class="fa fa-sign-in"></i>Login/Register</a></li>
                        @else
                            <li><a class="btn btn-primary" href="/account"><i class="fa"></i>Hello,
                                    {{ Auth::user()->username }}</a></li>
                            <li>
                                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
