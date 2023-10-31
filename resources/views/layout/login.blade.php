<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            margin-top: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center login-container">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        <form method="POST" action="{{url('add-login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <a href="{{url('registration')}}">new ragistration</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
