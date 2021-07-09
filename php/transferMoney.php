
<!DOCTYPE html>
<html>
<head>
<title>Transfer Money</title>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css">
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
                <li><a href="../index.html">Home</a></li>
                <li><a href="addCustomer.php">Add Customer</a></li>
                <li><a href="viewCustomer.php">View Customers</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>

<?php
include 'connection.php';
$ids=$_GET['id'];
$showquery="select * from `customers` where ID=($ids) ";
$showdata=mysqli_query($con,$showquery);
if (!$showdata) {
  printf("Error: %s\n", mysqli_error($con));
  exit();
}
$arrdata=mysqli_fetch_array($showdata);

?> 

<div class="form_customer">
  <h2>Transfer Details</h2>
    <div class="center_div">
      <form name="formCustomer" method="post" >
        <p><label for="sender_name">Sender's Name</label>
        <input type="text"  name="sender_name" value="<?php echo $arrdata['fldName']; ?>" required placeholder="Enter your name"/>
        </p>
        <p>
        <label for="receiver_name">Receiver's Name</label>
        <input type="text"  name="receiver_name" value="" required placeholder="Enter Receiver's name"
        oninvalid="this.setCustomValidity('Receiver\'s name is must')"
        oninput="this.setCustomValidity('')" 
        />
        </p>
        <p>
        <label for="balance">Amount</label>
        <input type="text" id="balance" name="balance" required placeholder="Amount to be transferred"
        oninvalid="this.setCustomValidity('Please enter amount here!')"
        oninput="this.setCustomValidity('')"
        >
        </p>
        <p>
        <input type="submit" name="submit" id="Submit" value="Transfer it">
        </p>
      </form>
    </div>    
</div>
<?php
include 'connection.php';

 if(isset($_POST['balance'])){
    $Sender_name=$_POST['sender_name'];
    $Sender=$_POST['balance'];
    $Receiver_name=$_POST['receiver_name'];
    
    $ids=$_GET['id'];
    $senderquery="select * from `customers` where ID=$ids ";
    $senderdata=mysqli_query($con,$senderquery);
  
    if (!$senderdata) {
     printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $arrdata=mysqli_fetch_array($senderdata);
     
    //receiverquery
    $receiverquery="select * from `customers` where fldName='$Receiver_name' ";
    $receiver_data=mysqli_query($con,$receiverquery);
   
    if (!$receiver_data) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $receiver_arr=mysqli_fetch_array($receiver_data);
    $id_receiver=$receiver_arr['ID'];

    if($arrdata['bal'] >= $Sender)
    { 
      

      $decrease_sender=$arrdata['bal'] - $Sender;
      $increase_receiver=$receiver_arr['bal'] + $Sender;
       $query="UPDATE `customers` SET `ID`=$ids,`bal`= $decrease_sender  where `ID`=$ids ";
       $rec_query="UPDATE`customers` SET `ID`=$id_receiver,`bal`= $increase_receiver where  `ID`=$id_receiver ";
       $res= mysqli_query($con,$query);
       $rec_res= mysqli_query($con,$rec_query);
      
       if($res && $rec_res)
      {
       ?>
       <script>
       Swal.fire("Done!", "Transaction Successful!", "success");
        </script> 
    
      <?php
   
      }
      else
      {
      ?>
           <script>
       Swal.fire("Error!", "Error Occured!", "error");
        </script> 

      <?php
      
      }
    }
  

  else
 {
  ?>
    <script>
       Swal.fire("Insufficient Balance", "Transaction Not  Successful!", "warning");
        </script> 
  <?php
   
 }
 }

// $name1=$_POST['sname']?? '';
// $name2=$_POST['rname']?? '';
// $amount=$_POST['balance']?? '';

// // $bal1="SELECT bal FROM customers where fldName='$name1'";
// // $bal2="SELECT bal FROM customers where fldName='$name2'";
// // $balance1=$bal1-$bal2;
// // $balance2=$bal1+$bal2;
// $sql = "UPDATE customers SET bal=(bal-$amount) WHERE fldName='$name1'";
// $sql = "UPDATE customers set bal=
// CASE 
// WHEN fldName=$name1 THEN '$balance1'
// WHEN fldName=$name2 THEN '$balance2'
// END";

// //$sql = "SELECT ID, fldName, fldEmail, bal FROM customers";
// //$result = $conn->query($sql);
// if ($conn->query($sql)){
//     echo "Money Transfered succefully from " .$name1. " to ".$name2." !";
//     }
//     else{
//     echo "Error: ". $sql ."
//     ". $conn->error;
//     }
//     $conn->close();
?>

</body>
</html>
