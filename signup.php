<?php include("menubar-login.html") ?>
<?php
    if(isset($_POST['signup']))
    {
        if(!empty($_FILES["fileToUpload"]["tmp_name"]))
        {
            $target_dir = "Uploads/";
            $target_file = $target_dir."profile_".$_POST["emailid"]. basename($_FILES["fileToUpload"]["name"]); 
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
                $uploadOk = 1; 
            }

           if ($_FILES["fileToUpload"]["size"] > 3000000) 
            {
                echo "Sorry, your file is too large.";   
                $uploadOk = 0; 
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";   
                $target_file="img/c1.jpg";
                $uploadOk = 1; 
            }
            if ($uploadOk == 0)
            {
                echo "Sorry, your file was not uploaded."; // if everything is ok, try to upload file
            } 
            else
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                {
                    $path=$target_dir."profile_".$_POST["emailid"]. basename($_FILES["fileToUpload"]["name"]);
                }
                else 
                {
                    echo "Sorry, there was an error uploading your file.";   
                }
            }                      
        }
        else
        {
             $path="img/logo.png";
        }
    
    include("connection.php");
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $emailid = $_POST["emailid"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $occupation = $_POST["occupation"];
    $gender = $_POST["gender"];
	 $sql="INSERT INTO family_head (`name`,`profile_pic`, `mobile`, `emailid`, `password`,`address`,`occupation`,`gender`) VALUES ('$name','$path','$mobile','$emailid','$password','$address','$occupation','$gender');";
	 $conn->query($sql) or  trigger_error($conn->error."[$sql]"); 
	echo "<script type= 'text/javascript'>alert('Account Created Successfully');</script>";
    header("Location: login.php");
	$conn->close();
    }

?>    
<html>
    <head>    
    <title>Sign Up | Community Management System</title>
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
                
<center><h3>Sign Up Here to Join the Community!!</h3></center>
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
             <input type="text" name="address" placeholder="Address" />
         </div>
      </div>

      <div class="row">
         <div class="large-12 columns">
             <input type="text" name="occupation" placeholder="Occupation" />
         </div>
      </div>

      <div class="row">
         <div class="large-12 columns">
             <select name="gender">
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
          <input type="submit" class="button expand" name="signup" value="Sign Up"/>
        </div>
          
      </div>
    </form>
  </div>
</div>
                      <p>Already Have Account<br><a href="login.php">Click Here to Login</a></p>

</div>

</div>
            </center>
        
<?php include("footer.html"); ?>
    </body>
</html>

