<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="{{asset('administrator/logo-gunadarma.png')}}" alt="Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        {{-- <form class="navbar-form navbar-left" method="GET" action="/mahasiswa/search">
            <div class="input-group">
                <input type="text" name="search" value="{{('search')}}" class="form-control" placeholder="Search dashboard...">
                <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
            </div> --}}
        </form>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{auth()->user()->photo}}"
                    class="img-circle" alt="Avatar">
                    <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">

                        @if(auth()->user()->role == 'admin')
                        <li><a href="admin/{{auth()->user()->id}}/profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        @elseif(auth()->user()->role == 'dosen')
                        <li><a href="dosen/{{auth()->user()->id}}/profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        @elseif(auth()->user()->role == 'mahasiswa')
                        <li><a href="mahasiswa/{{auth()->user()->id}}/profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        @endif

                        <li><a href="/messages"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                        <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
