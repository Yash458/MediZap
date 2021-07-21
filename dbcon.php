<?php     // Creating a connection with the database
                $servername ="localhost";
        $username="root";
        $password="";
        $database="MediZap";

        // Create a connection
        $conn= mysqli_connect($servername, $username, $password,$database);
                // Die if connection was not successful 
        if(!$conn)
            die("Sorry the db connection failed due to some error in connection".mysqli_connect_error());
        // die function quits the program there and then
        
        // echo "Connection was successful.";  

        ?>