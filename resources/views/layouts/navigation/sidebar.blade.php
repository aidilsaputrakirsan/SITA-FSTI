<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">
                    <span class="menu-text">Menu</span>
                </li>

                <li class="{{ Request::is('dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="fas fa-tachometer-alt text-primary"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                @if(auth()->user()->isDosen())
                <li class="{{ Request::is('data-pengajuan*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-clipboard-list text-success"></i>
                        <span data-key="t-apps">Data Pengajuan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('data-pengajuan:judul-ta') }}">
                                <i class="far fa-file-alt text-info"></i>
                                <span data-key="t-daftar-judul">Daftar Judul</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('data-pengajuan:bimbingan') }}">
                                <i class="fas fa-chalkboard-teacher text-warning"></i>
                                <span data-key="t-bimbingan">Bimbingan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('data-pengajuan:seminar-proposal') }}">
                                <i class="fas fa-presentation text-danger"></i>
                                <span data-key="t-seminar-proposal">Seminar Proposal</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('data-pengajuan:sidang-ta') }}">
                                <i class="fas fa-user-graduate text-primary"></i>
                                <span data-key="t-sidang-ta">Sidang TA</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(auth()->user()->isTendik() || auth()->user()->isKoorpro())
                <li class="{{ Request::is('periode*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-calendar-alt text-purple"></i>
                        <span data-key="t-apps">Periode</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('periode-sempro') }}">
                                <i class="fas fa-calendar-check text-info"></i>
                                <span data-key="t-periode-sempro">Periode Sempro</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('periode-ta') }}">
                                <i class="fas fa-calendar-week text-success"></i>
                                <span data-key="t-periode-ta">Periode TA</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('jadwal*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-clock text-orange"></i>
                        <span data-key="t-components">Jadwal</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('jadwal:sempro:index') }}" data-key="t-jadwal-sempro">
                                <i class="fas fa-calendar-day text-pink"></i>
                                Jadwal Sempro
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('jadwal:sidang-ta:index') }}" data-key="t-jadwal-ta">
                                <i class="fas fa-calendar-plus text-indigo"></i>
                                Jadwal TA
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('data*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users text-info"></i>
                        <span data-key="t-components">Data User</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('data-dosen:index') }}" data-key="t-dosen">
                                <i class="fas fa-user-tie text-primary"></i>
                                Dosen
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('data-mahasiswa:index') }}" data-key="t-mahasiswa">
                                <i class="fas fa-user-graduate text-warning"></i>
                                Mahasiswa
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(auth()->user()->isMahasiswa())
                <li class="{{ Request::is('ta*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-graduation-cap text-success"></i>
                        <span data-key="t-pages">Pengajuan TA</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('ta:pengajuan') }}" data-key="t-m-pengajuan-judul">
                                <i class="fas fa-file-signature text-info"></i>
                                Pengajuan Judul
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ta:bimbingan') }}" data-key="t-m-bimbingan">
                                <i class="fas fa-comments text-warning"></i>
                                Bimbingan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ta:sempro') }}" data-key="t-m-seminar-proposal">
                                <i class="fas fa-tasks text-danger"></i>
                                Seminar Proposal
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ta:sidang-ta') }}" data-key="t-m-sidang">
                                <i class="fas fa-award text-primary"></i>
                                Sidang TA
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="menu-title mt-2" data-key="t-components">
                    <span class="menu-text">Tugas Akhir</span>
                </li>
                <li>
                    <a href="{{ route('prosedur:index') }}" class="waves-effect">
                        <i class="fas fa-list-ol text-info"></i>
                        <span data-key="t-horizontal">Prosedur TA</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referensi:index') }}" class="waves-effect">
                        <i class="fas fa-book text-danger"></i>
                        <span data-key="t-referensi">Referensi TA</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('katalog:index') }}" class="waves-effect">
                        <i class="fas fa-bookmark text-warning"></i>
                        <span data-key="t-katalog">Katalog TA</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>