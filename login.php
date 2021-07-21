<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediZap</title>
</head>

<style>
body {
    background-color: #F4ECF7;
}

.container {
    width: 350px;
    height: 520px;
    margin-top: 60px;
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

a:link {
    color: black;
}
</style>

<body>
    <?php

    require "dbcon.php";
    function redirectFunction($loc){
        header($loc);

    }
    function alert($msg){

        echo "<script>alert('";
        echo $msg;
        echo "');</script>";

    }

        if( $_SERVER["REQUEST_METHOD"]=="POST")
        {
        $email = $_POST['email'];
        echo "The entered email is:".$email;
        echo "<br>";
        $password = $_POST['password'];
        $sql = "SELECT userPassword, userName, userID from USERS where userEmail=$email or userPhoneNo=$email";
        $result = mysqli_query($conn, $sql);
        // echo var_dump($result)."is the result";
        // echo "Count".count(mysqli_fetch_assoc($result));
        // if(count(mysqli_fetch_assoc($result))==0)
        // {
            // echo "No such user exists!";
            // alert("No such user exists");
            // redirectFunction("location: login.php");

            
        // }
        // echo "The count of rows returned is".count(mysqli_fetch_assoc($result));
        echo "<br>";
        // echo "Var dump:".var_dump(mysqli_fetch_assoc($result));
      while ($row=mysqli_fetch_assoc($result) ) {
          echo $row['userName'].="userNANME";
        $password1=$row["userPassword"];
        $UserName=$row["userName"];
        $userID=$row["userID"];

        
    }
    echo "Username=".$UserName.",Password=".$password." and password1".$password1;
            if($password1 == $password){
                echo " LOGGING IN";
                session_start();
                $_SESSION['userName'] = $UserName;
                $_SESSION['userID'] = $userID;
                header('location: index.php');
                $_SESSION['loggedIn']=true;
        
        
            }
            else{
                echo "WRONG PASSWORD";
            }
    }  

    ?>
    <div class="container">
        <h1
            style="text-align: center; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);padding: 20px; margin-bottom: 40px; background-color: #27AE60; color: white; border-radius: 15px 15px 0px 0px;">
            Login</h1>

        <form action="register.php" method="get">
            <button style="float:right">New User</button>
        </form>
        <form action="login.php" method="post">
            <label for="email">Email/Phone</label>
            <input type="text" name="email" placeholder="Email or Phone" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input type="submit" value="Login">

        </form>
    </div>
</body>

</html>