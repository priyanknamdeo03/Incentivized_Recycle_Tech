<?php

    header('location:finalloginpage.html');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];

    //Database Connection 
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error)
    {
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into registration1(firstname, lastname, gender, email, password,number)
            values(?, ?, ?, ?, ?, ?) ");
	    $stmt->bind_param("sssssi",$firstname, $lastname ,$gender ,$email , $password ,$number);
        $stmt->execute();
        echo "Registeration Successfully.....";
        $stmt->close();
        $conn->close();
    }
?>