<?php
require("config.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Agents</title>
	
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
      Agent Updation 
    </div>

    <div class="form">
      <div class="inputfield">
          <input type="text" class="input" placeholder="Enter Name to Search " name="name" >
       </div>
       <div class="inputfield">
        <input type="submit" value="Search"  name="Search"  class="btn">
      </div>

    
<?php
  
        if (isset($_POST['Search']))
         {
          $name=$_POST['name'];
          $query="select * from tbl_agents where name='$name'";
          $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
          $row=mysqli_fetch_array($result);
          $agentid=$row['agentid'];
          $name=$row['name'];
          $password=$row['password'];
          $age=$row['age'];
          $email=$row['email'];
          $phone=$row['phone'];
          $address=$row['address'];
          $pin=$row['pin'];
          $area=$row['area'];
           $role=$row['role'];
          $_SESSION['name']=$name;
           
  echo "<div class='inputfield'>
          <label>Customer Id</label>
          <input type='text' class='input' value='$agentid' name='agentid' required >
       </div>  
        <div class='inputfield'>
          <label>Name</label>
          <input type='text' class='input' value='$name' name='name' required>
       </div>  
       <div class='inputfield'>
          <label>Password</label>
          <input type='text' class='input' value='$password' name='password' required>
       </div>  
         
      
        <div class='inputfield'>
         <label>Age</label>
          <input type='text' class='input' value='$age' name='age' required>
       </div> 
        <div class='inputfield'>-
          <label>Email Address</label>
          <input type='text' class='input' value='$email' name='email' required>
       </div> 
      <div class='inputfield'>
          <label>Phone Number</label>
          <input type='text' class='input' value='$phone' name='phone' required>
       </div> 
      <div class='inputfield'>
          <label>Address</label>
          <textarea class='textarea' value='$address' name='address' required> $address</textarea>
       </div> 
      <div class='inputfield'>
          <label>Pin Code</label> 
          <input type='text' class='input' value='$pin' name='pin' required>
       </div> 
        <div class='inputfield'>
          <label>Distribution Area</label>
          <select name='area'class='custom_select'>
          <option  value='$area'>Muvatupuzha</option>
          <option  value='Muvatupuzha'>Muvatupuzha</option>
          <option value='kollam'>Kollam</option>
           <option value='Idukki'>Idukki</option>
           <option value='Mukkudam'>Mukkudam</option>
        </select>
       </div>

       
       <div class='inputfield'>
          <label>Role</label>
          <input type='text' value='$role' class='input' name='role' required>
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
$name1=$_SESSION['name'];
if (isset($_POST['Update']))
 {
          $agentid=$_POST['agentid'];
          $name1=$_POST['name'];
          $password=$_POST['password'];
          $age=$_POST['age'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $address=$_POST['address'];
          $pin=$_POST['pin'];
          $role=$_POST['role'];
          $area=$_POST['area'];
        $query="Update tbl_agents set agentid='$agentid',name='$name1',password='$password',age='$age',email='$email',phone='$phone',address='$address',pin='$pin',role='$role',area='$area' where name='$name1'";
        $query1="update tbl_login set username='$name1',password='$password',role='$role' where username='$name1'";
        $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
     $result1=mysqli_query($con,$query1) or die("query failed....".mysqli_error($con));
      if ($result && $result1) {
        echo "Sucess";
      }
   
}
?>
</form>
</body>
</html>