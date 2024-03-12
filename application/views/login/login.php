<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="login.css"> -->
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            margin: 0 auto;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .login-form h1 {
            margin-bottom: 10px;
            color: #333;
        }

        .login-form p {
            margin-bottom: 20px;
            color: #777;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            width: 100%;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            padding: 15px;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .bottom-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            color: #777;
        }

        .bottom-text p {
            margin-bottom: 10px;
        }

        .bottom-text a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .bottom-text a:hover {
            color: #0056b3;
        }

        button[type="submit"] a {
            display: inline-block;
            background-color: #4267B2;
            /* Facebook Blue */
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        button[type="submit"] a:hover {
            background-color: #3b5998;
            /* Darker Facebook Blue on hover */
        }


        /* Responsive */
        @media screen and (max-width: 600px) {
            .login-container {
                width: 100%;
                border-radius: 0;
            }


        }
    </style>
</head>

<body>

    <div class="login-container">
        <?php if ($this->input->get('error') == 1): ?>
            <div class="alert alert-danger" role="alert">
                invalid email and password
            </div>
        <?php endif; ?>
        <form class="login-form" action="<?php echo base_url('/login/do_login'); ?>" method="post">
            <h1>Login Form</h1>
            <!-- <p>Please login to your account</p> -->
            <div class="input-group">
                <input type="text" id="email" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit">Login</button>
            <br>

            <button type="submit"><a href="<?php echo $this->facebook->login_url(); ?>">facebook</a></button>


        </form>
    </div>
    </div>
    </div>

</body>

</html>