<?php
require("config.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Customer Registration Form</title>
	
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
   background-image: linear-gradient(-180deg, #a759d1 25%, #8261ee 100%);
  padding: 0 10px;
}
.wrapper{
  max-width: 700px;
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
  color: #a759d1;
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
  height: 80px;
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
  border: 1px solid  #a759d1;
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
  background: #a759d1;
}

.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper .form .inputfield .btn{
  width: 100%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background: #8261ee;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}
.wrapper .form .inputfield .btn:hover{
  background: #a759d1;
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
      Customer  Registration Form
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Customer Id</label>
          <input type="text" class="input" name="cid">
       </div>  
        <div class="inputfield">
          <label> Name</label>
          <input type="text" class="input" name="cname">
       </div>   
        <div class="inputfield">
         <label>Age</label>
          <input type="text" class="input" name="cage">
       </div> 
        <div class="inputfield">
          <label>Email Address</label>
          <input type="text" class="input" name="cmail">
       </div> 
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input" name="cphone">
       </div> 
      <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="caddress"></textarea>
       </div> 
      <div class="inputfield">
          <label>Land Mark</label>
          <input type="text" class="input" name="landmark">
       </div> 
        <?php
       $query="select nname from tbl_newspaper";
       $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
     
    ?>
      <div class="inputfield">
          <label>News Paper</label>
          <select name="nname" class="custom_select">
          <?php
          while($row=mysqli_fetch_array($result))
          {
          
           ?>
            
          <option value="<?php echo ($row['nname'] ) ?>" >

          <?php echo($row['nname']) ?>  
          </option>
          <?php
        }
        ?>
        
          </select>
      
      
       </div> 
        
       <div class="inputfield terms">
          <label class="check">
            <input type="checkbox" name="magazine">
            <span class="checkmark"></span>
          </label>
          <p> Include Magazine</p>
       </div>  
     
      <div class="inputfield">
        <input type="submit" value="Register" name="Register" class="btn">
      </div>
      <div class="inputfield">
        <input type="submit" value="cancel" class="btn">
      </div>
    </div>
</div>	
	</form>

  <?php
  
if ( isset($_POST['Register']))
 {
$cid=$_POST['cid'];
$cname=$_POST['cname'];
$cage=$_POST['cage'];
$cmail=$_POST['cmail'];
$cphone=$_POST['cphone'];
$caddress=$_POST['caddress'];
$landmark=$_POST['landmark'];
$nname=$_POST['nname'];

$query= "insert into tbl_customer values($cid,'$cname',$cage,'$cmail',$cphone,'$caddress','$landmark','$nname')" ;
$result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
 echo "Sucess";
 
 }
 ?>
</body>
</html>