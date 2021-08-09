<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
    <style>
        .container 
        {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            padding: 20px 25px;
            width: 700px;
        }
    </style>
    <title>Register</title>
</head>
<body>

    <div class="container">
        <h1 class="h1 text-center">Register User</h1>
        <form action="{{ route('user_create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" name="name" id="inputName">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1">
            </div>

            <div class="mb-3">
                <label for="inputRole" class="form-label">Role</label>
                <select name="role" id="inputRole" class="form-control">
                  <option value="Owner">Owner</option>
                  <option value="Admin">Admin</option>
                  <option value="Staff">Staff</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        
        </form>
    </div>

</body>
</html>