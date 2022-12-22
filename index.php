<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
     <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <title>Signup</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            min-height: 100vh;
            background-color: #f2f2f2;
            display: grid;
            place-content: center;
        }

        .sign-up{
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
        }

        .sign-up header{
            padding: 10px 5px;
            border-bottom: 1px solid #D3D3D3;
            margin-bottom: 10px;
        }

        .form-group{
            margin-bottom: 10px;
        }

        .form-group input{
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            outline: none;
            border: 1px solid #D3D3D3;
            font-size: 16px;
        }

        .btn-group{
            width: 100%;
        }

        .btn-group button{
            width: 100%;
            padding: 10px 0;
            text-align: center;
            font-size: 16px;
            border: none;
            background-color: #16afa3;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <section class="sign-up">
        <header>
            <h1>Sign Up</h1>
        </header>
        <form action="actions/actions.php" method="post">
            <div class="form-group">
                <label for="fname">Full Name</label>
                <input type="text" name="fname">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password">
            </div>
            <div class="btn-group">
                <button type="submit" name="create-user">Submit</button>
            </div>
        </form>
    </section>

    <?php
    if(isset($_SESSION['success'])){
        echo('
        <script>
        Swal.fire({
            icon: "success",
            title: "Success!",
            text : "'.$_SESSION['success'].'",
            showConfirmButton: false,
            timer: 1500,
        });
      </script>
      ');

      unset($_SESSION['success']); //success
    }

    if(isset($_SESSION['error'])){
        echo('
        <script>
        Swal.fire({
            icon: "error",
            title: "Error!",
            text : "'.$_SESSION['error'].'",
            showConfirmButton: false,
            timer: 1500,
        });
      </script>
      ');
      unset($_SESSION['error']);
    }
    ?>
    
</body>
</html>