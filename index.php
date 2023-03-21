<?php
$insert=false;
if(isset($_POST['name'])){
    
    $server="localhost";
    $username = "root";
    $password="";
    
    //create a database connection
    $con=mysqli_connect($server,$username,$password);
    

   // check for connection succsses
    if(!$con){
        die("connection to database failed due to". mysqli_connect_error());
    }
    //echo "success connecting to the database";

    //Collect post variables
    $name  =$_POST['name'];
    $address=$_POST['address'];
    $age   =$_POST['age'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $desc =$_POST['desc'];
    $sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `address`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$address', '$email', '$phone', ' $desc', current_timestamp());";
    //echo $sql;
    
    //Execute the query
    if($con->query($sql)==true){
        //echo "successfully inserted";

        //flag for successfull insertion
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    //close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="nn.jpeg" alt="farming is the economy">
    <div class="container">
        <h1>FOR ANNADATA KISAAN</h1>
        <p>Enter your detailes and get your choice at a affordable price</p>
        <?php
        if($insert == true){
        echo "<p class='message'>thank you for submiting this form we are happy to see you joining us</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="address" id="address" placeholder="enter your location">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter any other information here"></textarea>
       
            
            <a class="btn" href="project.html">SUBMIT</a>
            


        </form>

    </div>
    <script src="index.js"></script>
    
    
</body>
</html>