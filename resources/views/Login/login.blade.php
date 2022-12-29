<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/style-login.css')); ?>">
</head>
<body>
    
    <div class="login-box">
        <h1>Login</h1>
        <div class="logo-container">
            <i class="uil uil-shop"></i>
        </div>
        <form name="Login">
            <div class="textbox">
             <div class="input-area">
               <i class="uil uil-user"></i>
               <input type="text" placeholder="Username" required>
              </div>
            </div>

          <div class="textbox">
            <div class=" input-area">
              <i class="uil uil-lock"></i>
              <input type="password" placeholder="Password" required>
            </div>
          </div>
          <button>Log In</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>