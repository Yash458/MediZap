<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
    body {
        background-color: #F4ECF7;
    }

    .container {
        width: 590px;
        height: 600px;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        background-color: white;
        border-radius: 15px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
    }

    label,
    input {
        margin: 15px;
    }

    input:focus {
        outline: none;
    }

    input[type=text] {
        border: none;
        border-top-style: hidden;
        border-left-style: hidden;
        border-right-style: hidden;
        border-bottom: 2px solid green;
    }

    input[type=password] {
        border: none;
        border-bottom: 2px solid green;
    }
    </style>

    <?php
                $_SESSION['loggedIn']=false;

    require "dbcon.php";
        if( $_SERVER["REQUEST_METHOD"]=="POST")
        {
        $name = $_POST['UserName'];
        $email = $_POST['email'];
        $PhoneNo = $_POST['PhoneNo'];
        $password = $_POST['password'];
        $address = $_POST['UserAddress'];
        $DOB = $_POST['DOB'];

      $sql = "INSERT INTO USERS(UserEmail, UserPhoneNo, UserPassword, UserAddress, UserName) values( '$email', $PhoneNo,   '$password', '$address','$name'); ";
      echo "'$email', '$password', '$name', '$PhoneNo', '$address'";
      $sql ="INSERT INTO `users` ( `userEmail`, `userPassword`, `userName`, `userPhoneNo`, `userAddress`, `userDOB`) VALUES ( '$email', '$password', '$name', '$PhoneNo', '$address', '$DOB')" ; 
      $result = mysqli_query($conn, $sql);
        
        if($result==true){
            echo "The details were submitted sucessfully!";
                           session_start();
                $_SESSION['UserName'] = $name;
         
                header('location: index.php');
 
        }else{
            $_SESSION['loggedIn']=false;
            
            echo "The query was not excuted due to error: ";
            echo mysqli_error($conn)."<br>";
        }
    }  
    ?>

    <?php


    ?>
    <div class="container">
        <h1
            style="text-align: center; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);padding: 20px; margin-bottom: 40px; background-color: #27AE60; color: white; border-radius: 15px 15px 0px 0px;">
            Registration</h1>
        <form action="login.php" method="get">
            <button style="float:right">Existing User</button>
        </form>
        <form action="register.php" method="post">
            <label for="UserName">Name</label>
            <input type="text" name="UserName" placeholder="Name">
            <br>

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email">
            <br>
            <label for="UserPhoneNo">Phone Number:</label>
            <input type="text" name="PhoneNo" placeholder="Phone Number">
            <br>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password">
            <br>

            <label for="password">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"
                onchange="checkPassword()">
            <br>
            <label for="UserAddress">Address: </label>
            <input type="text" name="UserAddress" placeholder="Address">
            <br>
            <label for="DOB">DOB</label>
            <input type="date" name="DOB">
            <input type="submit" value="Login">

        </form>
    </div>
    <script>
    function checkPassword() {
        // console.log("hello")
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirmPassword').value;
        if (password !== confirmPassword) {
            alert("Passwords do not match")
        } else {
            console.log("OKAY")
        }
    }
    </script>
</body>

</html>