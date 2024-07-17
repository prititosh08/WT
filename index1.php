<?php
if(isset($_POST['name']) && isset($_POST['password_1'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "course"; // Adjust the database name as necessary

    // Create a connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the input data
    $name = $_POST['name'];
    $password_1 = $_POST['password_1'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM login WHERE name = ? AND password_1 = ?");
    $stmt->bind_param("ss", $name, $password_1);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if we have a match
    if($result->num_rows > 0){
        // Successful login
        header("Location: main.html");
    } else {
        // Failed login
        echo "Invalid username or password.";
    }

    // Close the statement and the connection
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
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
        }

        .login-form input[type="submit"]:hover {
            background-color: #183819;
        }
    </style>
</head>
<body>
    <a href="index.php" class="register-button">Register</a>
    <div class="login-form">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
            <label for="name">Username:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="password_1">Password:</label>
            <input type="password" id="password_1" name="password_1"><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <script>
        function validateForm() {
            var Username = document.getElementById("name").value;
            var password_1 = document.getElementById("password_1").value;

            if (Username == "" || password_1 == "") {
                alert("Username and password are required.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
