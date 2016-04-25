<?php include("menubar1.html") ?>

<?php
session_start();
if($_SESSION['ch_email']==null)
{
    header("Location: login.php");
}

?>
<html>
    <head>    
    <title>Delete Family Head | CMS</title>
        <link href="css/app.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation-flex.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation-rtl.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation.css" rel="stylesheet" type="text/css" />
        <link href="css/foundation.min.css" rel="stylesheet" type="text/css" />

    </head>
    
    <style>
    
body {
  background: #F0F0F3;
}
.login-box {
  background: #fff;
  border: 1px solid #ddd; 
  margin: 20px 0;
  padding: 20px 20px 0 20px;
}
    
</style>
    <body>
                
<center><h3>Delete Family Head From Community!!</h3></center>
<center>
<div class="large-3 large-centered columns">
  <div class="login-box">
  <div class="row">
  <div class="large-12 columns">
    <form action="" method="post">
        <img src="img/signup.png" style="hight:75px; width:75px">
                        <h4>Your Community Family Head</h4>
        
         
      
      <div class="row">
         <div class="large-12 columns">
				<select name="company">
					<option value=''>Select Family Head</option>
   <?php
		include("connection.php");
		//$sql = "";
		$sql = "SELECT * FROM family_head";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			echo "<option value='".$row["emailid"]."'>".$row["emailid"]."</option>";
    	}
		}
		else 
		{
    		echo "0 results";
		}
$conn->close();
?>
			  </select>
         </div>
      </div>


        
      

      <div class="row">
        <div class="large-12 large-centered columns">
          <input type="submit" class="button expand" name="delete" value="Delete Family Head"/>
          
        </div>
          
      </div>
    </form>
  </div>
</div>
      <?php
            if(isset($_POST['delete']))
            {  
                include("connection.php");
                $company=$_POST["company"];
                //echo "<script>alert(\"".$company."\")</script>";
                $sql = "DELETE FROM family_head WHERE emailid ='$company';";             
                $result = $conn->query($sql);
                
                echo "<script>alert(\"Deleted\")</script>";
                 //header('Location: '."delete.php");
                 header('Location: '.'dfh.php');
            }
      ?>
</div>

</div>
            </center>
        
<?php include("footer.html"); ?>
    </body>
    <script type="text/javascript">
    
    </script>
</html>

