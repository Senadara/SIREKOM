<nav class="navbar navbar-expand-lg px-3" style="background-color: #922E2C">
    <a class="navbar-brand " href="#">
        <img src="{{ asset('assets/img/Logo.svg') }}" alt="SIREKOM" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <g fill="none">
                    <path
                        d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                    <path fill="white"
                        d="M20 18a1 1 0 0 1 .117 1.993L20 20H4a1 1 0 0 1-.117-1.993L4 18h16Zm0-7a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2h16Zm0-7a1 1 0 1 1 0 2H4a1 1 0 0 1 0-2h16Z" />
                </g>
            </svg>
        </span>
    </button>
    <div class="collapse navbar-collapse p-2" id="navbarNavAltMarkup">
        <div class="me-auto"></div>
        <div class="navbar-nav align-items-center">
            <a class="nav-link ms-3 text-white active" aria-current="page" href="/admin/dashboard">Data Pendaftar</a>
            <a class="nav-link ms-3 text-white active" aria-current="page" href="/admin/lomba">Data Lomba</a>
            <a class="nav-link ms-3 text-white active" aria-current="page" href="/">Dashboard</a>
            <a href="" class="mx-4 profile-link link-underline link-underline-opacity-0 "><img
                    src="{{ asset('assets/img/profile.svg') }}" alt="Profile" width="50" height="50"></a>
        </div>
    </div>
</nav>
