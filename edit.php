
<?php
session_start();
if($_SESSION['fh_email']==null)
{
    header("location:login.php");
}
?>
<?php include("menubar.html"); ?>
<!DOCTYPE html>
    <head>
    <title>Visiting Card Management System</title>
        
        <link href="css/app.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation-flex.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation-rtl.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation.min.css" rel="stylesheet" type="text/css" />

    </head>
<script>
</script>	
    <style>
    ::-webkit-input-placeholder
	{
		color:black;
	}
body {
  background: #F0F0F3;
}
.login-box {
  background: #fff;
  border: 1px solid #ddd; 
  
  margin-bottom:10px;
margin-left:10px;
margin-right:10px;
margin-up:10px;
  width:70%;
}
    
</style>
    <body>
<?php include("sidebar.php"); ?>
<center>
<div >
  <div class="login-box">
  <div class="row">
  <div class="large-12 columns">

<form method="post">
        <img src="img/logo.png" style="hight:75px; width:75px">
                        <h4>Edit Visiting Card</h4>
<table style="width:40%;">
    <?php
        include("connection.php");
        $u_email=$_SESSION['fh_email'];
        $pid=$_COOKIE["fmid"];
		//$sql = "";
		$sql = "SELECT * FROM family_member WHERE fh_emailid = '$u_email' AND fmid = '$pid'";
		$result = $conn->query($sql);
        $row = $result->fetch_assoc();
       
echo "    
<tr>
	<td align=\"center\">
		Person
		
		<div  class=\"row\">
        		<div class=\"large-12 columns\">
         			<input type=\"text\" name=\"name\" placeholder=\"Full Name\" value=".$row["name"]." />
         		</div>
		</div>     
		<div class=\"row\">
			<div class=\"large-12 columns\">
             			<input type=\"text\" name=\"education\" placeholder=\"Designation\" value=".$row["education"]." />
         		</div>
      		</div>
            
	       <div class=\"row\">
               		<div class=\"large-12 columns\">
             			<input type=\"text\" name=\"mobile\" placeholder=\"Contact Number\" value=".$row["mobile"]." />
         		</div>
      		</div>
	        <div class=\"row\">
         		<div class=\"large-12 columns\">
		             <input type=\"text\" name=\"address\" placeholder=\"Address\" value=".$row["address"]." />
         		</div>
     		 </div>
	        <div class=\"row\">
         		<div class=\"large-12 columns\">
		             <input type=\"text\" name=\"emailid\" placeholder=\"Email ID\" value=".$row["emailid"]." />
         		</div>
     		 </div>
	        <div class=\"row\">
         		<div class=\"large-12 columns\">
		             <input type=\"text\" name=\"gender\" placeholder=\"Website\" value=".$row["gender"]." />
         		</div>
     		 </div>
             <div class=\"row\">
         		<div class=\"large-12 columns\">
		             <input type=\"text\" name=\"occupation\" placeholder=\"Website\" value=".$row["occupation"]." />
         		</div>
     		 </div>
             <div class=\"row\">
         		<div class=\"large-12 columns\">
		             <input type=\"text\" name=\"relationship\" placeholder=\"Website\" value=".$row["relationship"]." />
         		</div>
     		 </div>
   
		
	</td>
</tr>" ;
?>    
<tr>
<td style="background-color:#CCCCCC" align="center" colspan="2">
	<div style="margin-top:20px" class="row">
        		<div class="large-12 large-centered columns">
				
          			<input type="submit" class="button expand" value="Save" name="save"/>
        		</div>
		</div>	
</td>
</tr>
</table>        
        
        
    </form>
  </div>
</div>
                      

</div>

</div>
            </center>
    </body>

<?php
            
            if(isset($_POST['save']))
            { 
                include("connection.php");
                $pid = $_COOKIE["fmid"];
                $email=$_SESSION['fh_email'];
                $name=$_POST["name"];
                $education=$_POST["education"];
                $mobile=$_POST["mobile"];
                $address=$_POST["address"];
                $emailid=$_POST["emailid"];
                $gender=$_POST["gender"];
                $occupation=$_POST["occupation"];
                $relationship=$_POST["relationship"];
                $sql = "update family_member SET name='$name',education='$education',mobile='$mobile',address='$address',emailid='$emailid',gender='$gender',occupation='$occupation',relationship='$relationship' where fmid='$pid' AND fh_emailid='$email'";
                //echo "<script>alert($sql)</script>";
                $result = $conn->query($sql) or trigger_error($conn->error."[$sql]");
                //echo "<script> location.replace(\"AddCard.php\"); </script>";
                header("Location: userprofile.php " );
                $conn->close();
            }
    ?>	
</html>