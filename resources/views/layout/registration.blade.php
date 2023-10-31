<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f4f4f4;
    }

    .registration-form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="registration-form">
            <h2 class="text-center mb-4">Registration</h2>

            <form action="{{url('add-registration')}}" method="post">
                @csrf


                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Enter your full name"
                        name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password"
                        name="password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password"
                        name="confirmPassword">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <a href="{{url('login')}}"> Already Ragistration</a>
        </div>
    </div>
</body>

</html>