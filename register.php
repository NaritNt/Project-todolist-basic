<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login_style.css">
    <style>
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            background-color: #f6f6f6;
            border: none;
            color: #0d0d0d;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 5px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: #fff;
            border-bottom: 2px solid #5fbae9;
        }

        input[type="text"]:placeholder,
        input[type="email"]:placeholder,
        input[type="password"]:placeholder {
            color: #cccccc;
        }
    </style>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="https://startinfinity.s3.us-east-2.amazonaws.com/production/blog/post/15/main/xXMabYYezGITsPPA8PduAZXEmXvz0Xr71FEQGqy4.png" id="icon" alt="User Icon" />
            </div>

            <?php if (isset($_SESSION['error'])) : ?>
                <?php include('errors.php'); ?>
                <div class="success">
                    <p style="color:red;">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <!-- Login Form -->
            <form action="register_db.php" method="post">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
                <input type="email" id="email" class="fadeIn third" name="email" placeholder="email" required>
                <input type="password" id="password_1" class="fadeIn second" name="password_1" placeholder="password" required>
                <input type="password" id="password_2" class="fadeIn third" name="password_2" placeholder="confirm password" required>
                <input type="submit" class="fadeIn fourth" name="register" value="Sign up">
            </form>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="login.php">Login</a>
            </div>

        </div>
    </div>
</body>

</html>