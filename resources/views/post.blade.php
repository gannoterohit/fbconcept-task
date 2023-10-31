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
                        <h3 class="card-title text-center">post</h3>
                       
                        <form role="form" action="{{ url('post-image') }}" method="POST" enctype="multipart/form-data">
                    
                            @csrf
                            <div class="form-group">
                                <label for="username">post image</label>
                                <input type="file" class="form-control" id="image" placeholder="Upload image" name="image">
                            </div>
                         
                            <button type="submit" class="btn btn-primary btn-block">post</button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
