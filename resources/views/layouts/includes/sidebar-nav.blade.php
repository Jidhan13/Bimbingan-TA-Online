<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                @if(auth()->user()->role == 'admin')
                <li><a href="/admin" class=""><i class="lnr lnr-user"></i> <span>Admin</span></a></li>
                <li><a href="/mahasiswa" class=""><i class="lnr lnr-user"></i> <span>Mahasiswa</span></a></li>
                <li><a href="/dosen" class=""><i class="lnr lnr-user"></i> <span>Dosen</span></a></li>
                @endif

                @if (auth()->user()->role == 'mahasiswa')
                <li><a href="/bimbingan" class=""><i class="lnr lnr-pencil"></i> <span>Bimbingan</span></a></li>
                @elseif(auth()->user()->role == 'dosen')
                <li><a href="/bimbingan/dosen" class=""><i class="lnr lnr-pencil"></i> <span>Bimbingan</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
