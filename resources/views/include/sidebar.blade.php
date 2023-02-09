<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar" style="background-color: #2c3e50;">
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('app-assets') }}/images/logo/logo-white.png">
            </div>
        </div>
        <div class="text-logo lead-rqm">
            Rumah Qur'an <br> Al-Mubarok
        </div>

        <h1 class="logo-wrapper"><a class=""></a><a class="navbar-toggler" href="#"><i class="material-icons"
                    style="color: white">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold"><a href="JavaScript:void(0)"><i class="material-icons">home</i><span class="menu-title"
                    data-i18n="Templates">Home</span></a>
        </li>
        @if(session('userData')['level']!='ortu')
        <li class="bold"><a href="/mutabaah/lihat"><i class="material-icons">chrome_reader_mode</i><span
                    class="menu-title" data-i18n="Templates">Mutaba'ah</span></a>
        </li>
        @endif
        @if(session('userData')['level']=='admin')
        <li class="bold"><a href="/santri/lihat"><i class="material-icons">people</i><span class="menu-title"
                    data-i18n="Templates">Santri</span></a>
        </li>
        <li class="bold"><a href="/guru/lihat"><i class="material-icons">person</i><span class="menu-title"
                    data-i18n="Templates">Guru</span></a>
        </li>
        <li class="bold"><a href="/kelas/lihat"><i class="material-icons">class</i><span class="menu-title"
                    data-i18n="Templates">Kelas</span></a>
        </li>
        @endif
        @if(session('userData')['level']!='ortu')
        <li class="bold"><a href="#" class="collapsible-header waves-effect waves-cyan "><i class="material-icons">dvr</i><span class="menu-title"
                    data-i18n="Templates">Nilai</span></a>
            <div class="collapsible-body" style="">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="" href="/nilai/lihat"
                            tabindex="0"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="Nilai">Nilai</span></a>
                    </li>
                    <li><a class="" href="/summary-nilai/lihat"
                            tabindex="0"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="Summary Nilai">Summary Nilai</span></a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        {{-- <li class="bold"><a href="/mapel/lihat"><i class="material-icons">stars</i><span class="menu-title"
                    data-i18n="Templates">Mapel</span></a>
        </li> --}}
        @if(session('userData')['level']=='admin')
        <li class="bold"><a href="/tahunajaran/lihat"><i class="material-icons">stars</i><span class="menu-title"
                    data-i18n="Templates">Tahun Ajaran</span></a>
        </li>
        <li class="bold"><a href="/informasi/lihat"><i class="material-icons">notifications</i><span
                    class="menu-title" data-i18n="Templates">Informasi</span></a>
        </li>
        @endif
        <li class="bold"><a href="/"><i class="material-icons">arrow_forward</i><span class="menu-title"
                    data-i18n="Templates">Logout</span></a>
        </li>

    </ul>
    <div class="navigation-background"></div><a
        class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
        href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
