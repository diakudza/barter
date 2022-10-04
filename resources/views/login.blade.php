@extends('components.base')

@section('title',"Логин")

@section('content')

<section class="container authentication pt-5 d-flex flex-row justify-content-between" id="authentication">

    <div class="login">

        @if (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
        @endif

        <form method="post" action="{{ route('auth') }}">
            <legend>Войти</legend>
            <!--div class="social">
                <a href="#" class="social"><svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_707_15884)">
                            <path d="M19 10.2226C19 9.56371 18.9465 8.90129 18.8326 8.25311H9.69043V11.9855H14.9257C14.7085 13.1892 14.0104 14.2541 12.9883 14.9308V17.3525H16.1117C17.9458 15.6644 19 13.1714 19 10.2226Z" fill="#4285F4" />
                            <path d="M9.69065 19.6924C12.3047 19.6924 14.5092 18.8341 16.1154 17.3526L12.9921 14.9308C12.1231 15.522 11.0012 15.8568 9.69421 15.8568C7.16561 15.8568 5.02164 14.1508 4.25237 11.8573H1.0293V14.3538C2.67467 17.6268 6.02596 19.6924 9.69065 19.6924Z" fill="#34A853" />
                            <path d="M4.24859 11.8573C3.84259 10.6535 3.84259 9.35002 4.24859 8.14627V5.64972H1.02907C-0.345629 8.38844 -0.345629 11.6151 1.02907 14.3538L4.24859 11.8573Z" fill="#FBBC04" />
                            <path d="M9.69065 4.1433C11.0725 4.12193 12.408 4.6419 13.4088 5.59635L16.176 2.82914C14.4238 1.18377 12.0982 0.279169 9.69065 0.30766C6.02595 0.30766 2.67467 2.37328 1.0293 5.64978L4.24881 8.14632C5.01451 5.84921 7.16204 4.1433 9.69065 4.1433Z" fill="#EA4335" />
                        </g>
                        <defs>
                            <clipPath id="clip0_707_15884">
                                <rect width="19.0001" height="19.3848" fill="white" transform="translate(0 0.307617)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a href="#" class="social"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.58983 5.46146C8.09401 5.23933 7.55983 5 6.66667 5C3.33333 5 2.50003 8.3335 2.5 11.6667C2.49998 14.9998 5 19.1667 6.66667 19.1667C7.64298 19.1667 8.33333 18.8808 8.90525 18.6438C9.30967 18.4763 9.65483 18.3333 10 18.3333C10.3452 18.3333 10.6903 18.4763 11.0948 18.6438C11.6667 18.8808 12.357 19.1667 13.3333 19.1667C14.5231 19.1667 16.1376 17.0434 16.9641 14.6156C17.0472 14.3711 16.8775 14.1189 16.6282 14.0515C15.2101 13.6683 14.1667 12.3727 14.1667 10.8333C14.1667 9.38083 15.0958 8.14525 16.3921 7.68856C16.6383 7.60182 16.7902 7.33223 16.6742 7.09838C16.05 5.84004 15.0067 5 13.3333 5C12.4402 5 11.906 5.23933 11.4102 5.46146C10.9808 5.65384 10.5802 5.83333 10 5.83333C9.41983 5.83333 9.01925 5.65384 8.58983 5.46146Z" fill="#23262F" />
                        <path d="M10 3.95831C10 2.23242 11.3991 0.833313 13.125 0.833313C13.2401 0.833313 13.3333 0.926588 13.3333 1.04165C13.3333 2.76754 11.9342 4.16665 10.2083 4.16665C10.0932 4.16665 10 4.07337 10 3.95831Z" fill="#23262F" />
                    </svg>
                </a>
                <a href="#" class="social"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21.5C12 21.7761 12.2241 22.0013 12.4999 21.9877C17.7905 21.7272 22 17.3552 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 16.6251 5.13989 20.5168 9.40433 21.6598C9.70966 21.7417 10 21.5044 10 21.1883V14H9C8.44771 14 8 13.5523 8 13C8 12.4477 8.44772 12 9 12H10V10C10 8.34315 11.3431 7 13 7H14C14.5523 7 15 7.44772 15 8C15 8.55229 14.5523 9 14 9H13C12.4477 9 12 9.44772 12 10V12H14C14.5523 12 15 12.4477 15 13C15 13.5523 14.5523 14 14 14H12V21.5Z" fill="#315DF7" />
                    </svg>
                </a>
            </div-->
            @csrf
            <span>Используйте свой аккаунт</span>

            <div class="mb-3 email">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" class="@error('password') is-invalid @enderror">
            </div>
            <a href="#">Забыли пароль?</a>
            <button type="submit" class="btn bthEnter bth-login btn-primary">Войти</button>
        </form>
    </div>

    <div class="registration">
        <form method="post" action="{{ route('registration') }}" enctype="multipart/form-data">
            <legend>Создать акаунт</legend>
            <!--div class="social">
                <a href="#" class="social"><svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_707_15884)">
                            <path d="M19 10.2226C19 9.56371 18.9465 8.90129 18.8326 8.25311H9.69043V11.9855H14.9257C14.7085 13.1892 14.0104 14.2541 12.9883 14.9308V17.3525H16.1117C17.9458 15.6644 19 13.1714 19 10.2226Z" fill="#4285F4" />
                            <path d="M9.69065 19.6924C12.3047 19.6924 14.5092 18.8341 16.1154 17.3526L12.9921 14.9308C12.1231 15.522 11.0012 15.8568 9.69421 15.8568C7.16561 15.8568 5.02164 14.1508 4.25237 11.8573H1.0293V14.3538C2.67467 17.6268 6.02596 19.6924 9.69065 19.6924Z" fill="#34A853" />
                            <path d="M4.24859 11.8573C3.84259 10.6535 3.84259 9.35002 4.24859 8.14627V5.64972H1.02907C-0.345629 8.38844 -0.345629 11.6151 1.02907 14.3538L4.24859 11.8573Z" fill="#FBBC04" />
                            <path d="M9.69065 4.1433C11.0725 4.12193 12.408 4.6419 13.4088 5.59635L16.176 2.82914C14.4238 1.18377 12.0982 0.279169 9.69065 0.30766C6.02595 0.30766 2.67467 2.37328 1.0293 5.64978L4.24881 8.14632C5.01451 5.84921 7.16204 4.1433 9.69065 4.1433Z" fill="#EA4335" />
                        </g>
                        <defs>
                            <clipPath id="clip0_707_15884">
                                <rect width="19.0001" height="19.3848" fill="white" transform="translate(0 0.307617)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a href="#" class="social"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.58983 5.46146C8.09401 5.23933 7.55983 5 6.66667 5C3.33333 5 2.50003 8.3335 2.5 11.6667C2.49998 14.9998 5 19.1667 6.66667 19.1667C7.64298 19.1667 8.33333 18.8808 8.90525 18.6438C9.30967 18.4763 9.65483 18.3333 10 18.3333C10.3452 18.3333 10.6903 18.4763 11.0948 18.6438C11.6667 18.8808 12.357 19.1667 13.3333 19.1667C14.5231 19.1667 16.1376 17.0434 16.9641 14.6156C17.0472 14.3711 16.8775 14.1189 16.6282 14.0515C15.2101 13.6683 14.1667 12.3727 14.1667 10.8333C14.1667 9.38083 15.0958 8.14525 16.3921 7.68856C16.6383 7.60182 16.7902 7.33223 16.6742 7.09838C16.05 5.84004 15.0067 5 13.3333 5C12.4402 5 11.906 5.23933 11.4102 5.46146C10.9808 5.65384 10.5802 5.83333 10 5.83333C9.41983 5.83333 9.01925 5.65384 8.58983 5.46146Z" fill="#23262F" />
                        <path d="M10 3.95831C10 2.23242 11.3991 0.833313 13.125 0.833313C13.2401 0.833313 13.3333 0.926588 13.3333 1.04165C13.3333 2.76754 11.9342 4.16665 10.2083 4.16665C10.0932 4.16665 10 4.07337 10 3.95831Z" fill="#23262F" />
                    </svg>
                </a>
                <a href="#" class="social"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21.5C12 21.7761 12.2241 22.0013 12.4999 21.9877C17.7905 21.7272 22 17.3552 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 16.6251 5.13989 20.5168 9.40433 21.6598C9.70966 21.7417 10 21.5044 10 21.1883V14H9C8.44771 14 8 13.5523 8 13C8 12.4477 8.44772 12 9 12H10V10C10 8.34315 11.3431 7 13 7H14C14.5523 7 15 7.44772 15 8C15 8.55229 14.5523 9 14 9H13C12.4477 9 12 9.44772 12 10V12H14C14.5523 12 15 12.4477 15 13C15 13.5523 14.5523 14 14 14H12V21.5Z" fill="#315DF7" />
                    </svg>
                </a>
            </div-->
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{old('name')}}" class="@error('name') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" class="@error('password') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Подтвердите пароль" class="@error('password_confirmation') is-invalid @enderror">
            </div>

            <button type="submit" class="btn bthEnter bth-reg btn-primary">Зарегистрироваться</button>
        </form>
    </div>

    <div class="overlap-container">
        <div class="overlap">
            <div class="overlap-panel overlap-left">
                <h2 class="overlap-title overlap-title-reg">С возвращением!</h2>
                <p class="overlap-content">У вас уже есть аккаунт? <br> Нажмите "войти"!</p>
                <button class="overlap-button overlapEnt" id="signIn">Войти</button>
            </div>

            <div class="overlap-panel overlap-right">
                <h2 class="overlap-title overlap-title-login">Привет!</h2>
                <p class="overlap-content">Нет аккаунта? <br> Нажмите "зарегистрироваться"!</p>
                <button class="overlap-button overlapReg" id="signUp">Зарегистрироваться</button>
            </div>
        </div>
    </div>

</section>

@endsection