<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Recovery Password - Tasty Food</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="font-weight-light my-4">Password Recovery</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Enter your email address and we will send you a
                                        link to reset your password.</div>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="text" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" placeholder="Email" value="{{ $email }}" required>
                                            @error('email')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">New Password</label>
                                            <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPasswordConfirmation">Confirm Password</label>
                                            <input class="form-control py-4" id="inputPasswordConfirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login-basic.html">Return to login</a>
                                            <button class="btn btn-primary" type="submit">Reset Password</button>
                                        </div>
                                        @if(session('status'))
                                            <div>{{ session('status') }}</div>
                                        @endif
                                    </form>
                                </div>
                                {{-- <div class="card-footer text-center">
                                        <div class="small"><a href="register-basic.html">Need an account? Sign up!</a></div>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Tasty Food 2023</div>
                        {{-- <div class="col-md-6 text-md-right small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
