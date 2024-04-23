<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo" class="navbar-logo center">
            </div>
            <div class="col">
                <a class="navbar-brand left" href="#">
                    <span class="d-block">Service des affaires Juridique</span>
                    <span class="d-block text-center">et de Partenariat</span>
                </a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../par" type="submit">قائمة الشراكات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/par/create">إضافة الشراكات</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
