<?php
require("config.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Customers</title>
	
</head>
<body>
  
  <style >
   @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background: linear-gradient(-180deg, #4481eb 10%, #04befe 100%);
  padding: 0 10px;
}
.wrapper{
  max-width: 600px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color:#4481eb;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: #757575;
   margin-right: 10px;
  font-size: 14px;
}

.wrapper .form .inputfield .input,
.wrapper .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.wrapper .form .inputfield .textarea{
  width: 100%;
  height: 100px;
  resize: none;
}

.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
}


.wrapper .form .inputfield .input:focus,
.wrapper .form .inputfield .textarea:focus,
.wrapper .form .inputfield .custom_select select:focus{
  border: 1px solid #fec107;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: #757575;
}
.wrapper .form .inputfield .check{
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  cursor: pointer;
}
.wrapper .form .inputfield .check input[type="checkbox"]{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.wrapper .form .inputfield .check .checkmark{
  width: 15px;
  height: 15px;
  border: 1px solid #04befe;
  display: block;
  position: relative;
}
.wrapper .form .inputfield .check .checkmark:before{
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 5px;
  height: 2px;
  border: 2px solid;
  border-color: transparent transparent #fff #fff;
  transform: rotate(-45deg);
  display: none;
}
.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark{
  background: #04befe;
}

.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper .form .inputfield .btn{
  width: 100%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background:  #04befe;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}
.wrapper .form .inputfield .btn:hover{
  background: #4481eb;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
}

@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}
</style>
<form method="POST" action="">

<div class="wrapper">
    <div class="title">
      Customer Updation 
    </div>

    <div class="form">
      <div class="inputfield">
          <input type="text" class="input" placeholder="Enter Name to Search " name="cname" >
       </div>
       <div class="inputfield">
        <input type="submit" value="Search"  name="Search"  class="btn">
      </div>

    
<?php
  
        if (isset($_POST['Search']))
         {
          $cname=$_POST['cname'];
          $query="select * from tbl_customer where cname='$cname'";
          $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
          $row=mysqli_fetch_array($result);
          $cid=$row['cid'];
          $cname=$row['cname'];
          $cage=$row['cage'];
          $cmail=$row['cmail'];
          $cphone=$row['cphone'];
          $caddress=$row['caddress'];
          $landmark=$row['landmark'];
          $newspaper=$row['newspaper'];
         
          $_SESSION['cname']=$cname;
           
  echo "<div class='inputfield'>
          <label> Customer Id</label>
          <input type='text' class='input' value='$cid' name='cid' required >
       </div>  
        <div class='inputfield'>
          <label>Name</label>
          <input type='text' class='input' value='$cname' name='cname' required>
       </div>   
       <div class='inputfield'>
         <label>Age</label>
          <input type='text' class='input' value='$cage' name='cage' required>
       </div>  
        <div class='inputfield'>-
          <label>Email Address</label>
          <input type='text' class='input' value='$cmail' name='cmail' required>
       </div> 
      <div class='inputfield'>
          <label>Phone Number</label>
          <input type='text' class='input' value='$cphone' name='cphone' required>
       </div> 
      <div class='inputfield'>
          <label>Address</label>
          <textarea class='textarea' value='$caddress' name='caddress' required> $caddress</textarea>
       </div> 
      <div class='inputfield'>
          <label>Land Mark</label> 
          <input type='text' class='input' value='$landmark' name='landmark' required>
       </div> 

       
       <div class='inputfield'>
          <label>News Paper</label>
          <input type='text' value='$newspaper' class='input' name='newspaper' required>
       </div> ";

     }
       ?>
      
      <div class="inputfield">
        <input type="submit" value="Update" name="Update" class="btn">
      </div>
      <div class="inputfield">
        <input type="submit" value="Cancel"  name="Cancel"  class="btn">
      </div>
    </div>
</div>

<?php
$cname1=$_SESSION['cname'];
if (isset($_POST['Update']))
 {
           $cid=$_POST['cid'];
          $cname=$_POST['cname'];
          $cage=$_POST['cage'];
          $cmail=$_POST['cmail'];
          $cphone=$_POST['cphone'];
          $caddress=$_POST['caddress'];
          $landmark=$_POST['landmark'];
          $newspaper=$_POST['newspaper'];
        $query="Update tbl_customer set cid='$cid',cname='$cname1',cage='$cage',cmail='$cmail',cphone='$cphone',caddress='$caddress',landmark='$landmark',newspaper='$newspaper' where cname='$cname1'";
       
        $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
    
     
        echo "Sucess";
      
   
}
?>
</form>
</body>
</html>