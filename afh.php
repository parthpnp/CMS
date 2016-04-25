<?php include("menubar1.html") ?>
<?php
    if(isset($_POST['signup']))
    {  
	$target_dir = "Uploads/";
    $target_file = $target_dir.$_POST["emailid"]. basename($_FILES["fileToUpload"]["name"]); 
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); 
    if($check !== false)
    {
        echo "File is an image - " . $check["mime"] . ".";  
        $uploadOk = 1; 
    }
    else
    {
        echo "File is not an image.";   
        $uploadOk = 0; 
    }
 // Check if file already exists
if (file_exists($target_file))
{
    //$target_file = $target_dir."1_".basename($_FILES["fileToUpload"]["name"]); //We can add id in 1_
} 
// Check file size 
if ($_FILES["fileToUpload"]["size"] > 3000000) 
{
    echo "Sorry, your file is too large.";   
    $uploadOk = 0; 
} // Allow certain file formats 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";   
    $uploadOk = 0; }
// Check if $uploadOk is set to 0 by an erro
if ($uploadOk == 0)
{
    echo "Sorry, your file was not uploaded."; // if everything is ok, try to upload file
} 
else
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        $path=$target_file;
        include("connection.php");
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $emailid = $_POST["emailid"];
        $password = $_POST["password"];
	$sql="INSERT INTO user (`name`,`image`, `mobile`, `emailid`, `password`) VALUES ('$name','$path', '$mobile','$emailid','$password');";
	$conn->query($sql) or  trigger_error($conn->error."[$sql]"); 
	
		echo "<script type= 'text/javascript'>alert('Account Created Successfully');</script>";
        header("Location: login.php");
		$conn->close();
	
    }
}
    }
?>
<html>
    <head>    
    <title>Sign Up for Family Head | CMS</title>
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
                
<center><h3>Add Family Head for Community !!</h3></center>
<center>
<div class="large-3 large-centered columns">
  <div class="login-box">
  <div class="row">
  <div class="large-12 columns">
    <form action="" method="post" enctype="multipart/form-data" multiple accept='image/*|audio/*|video/*'>
        <img src="img/signup.png" style="hight:75px; width:75px">
                        <h4>Fill Up Details</h4>
        
         <div class="row">
         <div class="large-12 columns">
             <input type="text" name="name" placeholder="Full Name" />
         </div>
      </div>
        
        <div class="row">
         <div class="large-12 columns">
             <input type="text" name="emailid" placeholder="Email Id" />
         </div>
      </div>
        
        <div class="row">
         <div class="large-12 columns">
             <input type="text" name="mobile" placeholder="Mobile Number" />
         </div>
      </div>
        
      <div class="row">
         <div class="large-12 columns">
             <input type="password" name="password" placeholder=" Password" />
         </div>
      </div>
      

        <div class="row">
         <div class="large-12 columns">
             <input type="password" name="con_password" placeholder="Retype Password" />
         </div>
      </div>

      <div class="row">
         <div class="large-12 columns">
             <input type="text" name="add" placeholder="Address" />
         </div>
      </div>

      <div class="row">
         <div class="large-12 columns">
             <input type="text" name="occ" placeholder="Occupation" />
         </div>
      </div>

      <div class="row">
         <div class="large-12 columns">
             <select >
	              <option value="" selected>Select Gender</option>
				  <option value="male">Male</option>
				  <option value="female">Female</option>
			  </select>
         </div>
      </div>


        <div class="row">
         <div class="large-12 columns">
             <input type="file" name="fileToUpload" id="fileToUpload">
         </div>
      </div>
        
      

      <div class="row">
        <div class="large-12 large-centered columns">
          <input type="submit" class="button expand" name="signup" value="Add Family Head"/>
        </div>
          
      </div>
    </form>
  </div>
</div>

</div>

</div>
            </center>
        
<?php include("footer.html") ?>
    </body>
    <script type="text/javascript">
   
    </script>
</html>

