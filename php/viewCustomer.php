<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css">
    <title>TSFMTC | View Customers</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

.main_div
{
    width:100%;
    height:100vh;
 
}

.display_table
{
    width:100vw;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content: center;
    text-align:center;
}
.center_div
{
    width:90vw;
    height:80vh;
    background-image:url('images/2.jpg');
    background-repeat:no-repeat;
    background-size:100%;
    padding:20px 0 0 0;
    box-shadow:0 10px 20px 0 rgba(0,0,0,0.03);
    border-radius:10px;
    margin-left:30px;
}
h1
{
    font-size:30px;
    color:#000;
    text-align:center;
    margin-top:-20px;
    margin-bottom:20px;
}
table
{
    border-collapse:collapse;
    background-color:black;
    box-shadow:0 10px 20px 0 rgba(0,0,0,0.03);
    border-radius: 10px;
    border-collapse:collapse;
    table-layout:fixed;
    opacity:0.7;
    color:#F7CC1A;
    font-weight:bold;
    margin:auto;
}
th,td
{
  border:1px solid #f2f2f2;
   padding:13px 32px;
  text-align:center;
  opacity:0.9;
  color:#04FB73 ; 
}
th{
    text-transform:uppercase;
    font-weight:500;
}
td
{
    font-size:14px;
}
a.tra-btn{
background-color:rgba(254, 255, 103, 1);
padding:13px 32px;

  color: black;
  text-decoration: none;
  text-transform: uppercase;

}
a.tra-btn:hover {
  background-color: #555;
  color:white;
}
footer {
            position:relative;
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


<div class="main_div">
 
       
      <div class="display_table">
             <h1>Customer Details</h1>
             <div class="center_div">
           <div class="table-responsive">
                <table>
                <thead>
                 <tr>
                 <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                    <th>Balance</th>
                  <th colspan="2">Transaction</th>
                </tr>
                </thead>
               <tbody>
              </div>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "task_1");
      // Check connection
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM customers ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                  
            
                ?>
                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['fldName'];?></td>
                    <td><?php echo $row['fldEmail'];?></td>
                    <td><?php echo $row['bal'];?></td>
                    <td><a href="transferMoney.php?id=<?php echo $row['ID'];?>" class='tra-btn'>Transact Now</a></td>
                </tr>
                <?php
                      } //while condition closing bracket
                    }  //if condition closing bracket
                ?>


</tbody>
</table>
</div>

</div>

</div>
<footer> Copyright &copy; 2021 - Aayushi Chauhan</footer>

</div>

</body>
</html>