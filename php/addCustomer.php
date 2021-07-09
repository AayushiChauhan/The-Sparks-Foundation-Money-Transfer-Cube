<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
    <title>TSFMTC | Add Customer</title>
<style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
.form_customer
{
    width:100vw;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content: center;
    text-align:center;
    background-image: url("\img\ -Q1p7bh3SHj8-unsplash.jpg");
    background-repeat:no-repeat;
    
}
.center_div
{
    width:70vw;
    height:60vh;
    background-image: url("\img\ -Q1p7bh3SHj8-unsplash.jpg");
    background-repeat:no-repeat;
    background-size:100%;
    padding:20px 0 0 0;
    box-shadow:0 10px 20px 0 rgba(0,0,0,0.03);
    border-radius:10px;
    margin-left:35vh;
    margin-right:65vh;
    
    color:aliceblue;

}
h1
{
    font-size:30px;
    color:#000;
    text-align:center;
    margin-top:-20px;
    margin-bottom:20px;
}
input{
    border: 2px solid black;
    margin: 10px;
    padding: 10px;

}

#Submit {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: black;
  background-color: #ffd6ba;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}
#Submit:hover {background-color: #C49799}
#Submit:active {
  background-color: #C49799;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 1.5em;
            background-color:bisque;
            color:black;
            text-align: center;
            }
</style>
</head>
<body>
    <div class="container">
    <div class="logo" style="font-family: 'Courgette', cursive;
        font-family: 'EB Garamond', serif; font-size: 45px; font-weight: 500; color:#ef476f;">TSFMTC</div>
        <div class="navbar">
            <div class="iconbar" onclick="Show()">
                <i></i>
                <i></i>
                <i></i>
            </div>
            <ul id="nav-list">
                <li class="close"><span onclick="Hide()">X</span></li>
                <li><a href="..\index.html">Home</a></li>
                <li><a href="addCustomer.php">Add Customer</a></li>
                <li><a href="viewCustomer.php">View Customers</a></li>
                <li><a href="https://www.thesparksfoundationsingapore.org/">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <script>
        function InvalidMsg(textbox) {
  
            if (textbox.value === '') {
                textbox.setCustomValidity
                      ('Entering an email-id is necessary!');
            } else if (textbox.validity.typeMismatch) {
                textbox.setCustomValidity
                      ('Please enter an email address which is valid!');
            } else {
                textbox.setCustomValidity('');
            }
  
            return true;
        }
    </script>
<div class="form_customer">
    <h1>Add customer details below</h1>
    <div class="center_div">

    <form name="formCustomer" method="post" >
        <p><label for="name">Enter Customer Name</label><br>
            <input type="text" id="name" name="name" placeholder="Name" required="required"
            oninvalid="this.setCustomValidity('Please enter Username')"
            oninput="this.setCustomValidity('')" >
        </p>
        <p><label for="email">Enter Customer Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email" required
            oninvalid="InvalidMsg(this);" 
            oninput="InvalidMsg(this);" 
            >
        </p>
        <p><label for="balance">Enter your balance</label><br>
            <input type="text" id="balance" name="balance" required placeholder="eg. 1000" oninvalid="this.setCustomValidity('Please enter balance!')"
            oninput="this.setCustomValidity('')">
        </p>
        
        <p>
            <input type="submit" name="Submit" id="Submit" value="Add">
        </p>
    </form>
</div>
<footer> Copyright &copy; 2021 - Aayushi Chauhan</footer>

</div>

<?php
    $name = filter_input(INPUT_POST,'name');
    $email = filter_input(INPUT_POST,'email');
    $baln = filter_input(INPUT_POST,'balance');
    
    
    
        
        if (!empty($name)){
            if (!empty($baln)){
            include 'connection.php';
            if (mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
            }
            else{
            $sql = "INSERT INTO customers (fldName, fldEmail, bal)
            values ('$name','$email','$baln')";
            if ($con->query($sql)){
                // echo '<script>alert("This customer is added succesfully")</script>';
                ?>
                <script>
                Swal.fire('Done','Customer added succesfully','success')
                </script>
                <?php

            }
            $conn->close();
            }
            }
            else{?>
            <script>alert(" Please enter your balance in order to proceed.")</script>;<?php
            die();
            }
            }
            else{?>
            <script>alert("Username field should not be empty! "\n" Please enter your name in order to proceed.")</script>;
            <?php   die();
            
            }
    
?>
    
</body>
</html>