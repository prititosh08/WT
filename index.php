<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "course";

    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con){
        die("Connection to this database failed due to ". mysqli_connect_error());
    }

    $name = $_POST['name'];
    $password_1 = $_POST['password_1'];
    
    $sql = "INSERT INTO `login` (`name`, `password_1`) VALUES ('$name', '$password_1');";

    if($con->query($sql) === true){
        $insert = true;
    } else {
        echo "Error inserting record: " . $con->error;
    }

    if($insert){
        header("Location: main.html");
        exit();
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 30px;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            margin: 0;
        }

        .register-button {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .register-button:hover {
            background-color: #183819;
        }

        .login-form {
            width: 30%;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .login-form:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            /* transform: translateY(-10px); */
        }

        .login-form h2 {
            margin-top: 0;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            font-size: 30px;
            width: 90%;
            padding: 15px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 4px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .login-form input[type="text"]:hover,
        .login-form input[type="password"]:hover {
            border-color: #4CAF50;
        }

        .login-form input[type="submit"] {
            width: 60%;
            margin: 40px auto;
            font-size: 40px;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form input[type="submit"]:hover {
            background-color: #183819;
        }
    </style>
</head>
<body>
    <a href="index1.php" class="register-button">Login</a>
    <div class="login-form">
        <h2>Register</h2>
        <form action="index.php" method="post" onsubmit="return validateForm()">
            <label for="name">Username:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="password_1">Password:</label>
            <input type="password" id="password_1" name="password_1"><br><br>
            <input type="submit" value="Register">
        </form>
    </div>
    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var password = document.getElementById("password_1").value;

            if (name == "" || password == "") {
                alert("User Name and Password are required.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
