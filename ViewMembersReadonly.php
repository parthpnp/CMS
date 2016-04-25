<?php
session_start();
if($_SESSION['fh_email']==null)
{
    header("Location: login.php");
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Welcome To Your Profile</title>
<link rel="stylesheet" href="css/foundation.min.css">
</head>
<body>
    <?php include("menubar.html") ?>
    <div class="off-canvas-wrapper">

<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
<?php include("sidebar.php") ?>
<div class="off-canvas-content" data-off-canvas-content>
<div class="title-bar hide-for-large">
<div class="title-bar-left">
<button class="menu-icon" type="button" data-open="my-info"></button>
<span class="title-bar-title"></span>
</div>
</div>
<div class="callout primary">
<div class="row column">
<h4>Hello! This is the Brief Introduction Type of Portfolio of Your Family.</h4>
</div>
</div>
    <div class="row small-up-2 medium-up-3 large-up-4">
    <?php
        include("connection.php");
		//$sql = "";
        $x= $_COOKIE["fmid"];
		$sql = "SELECT * FROM family_member where fmid=".$x;
		$result = $conn->query($sql);
	//	if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
            $education = $row["education"];
            $gender = $row["gender"];
            $mobile = $row["mobile"];
            $address = $row["address"];
            $emailid = $row["emailid"];
            $occupation = $row["occupation"];
            $relationship=$row["relationship"]; 
            $profile_pic = $row["profile_pic"];
            
// output data of each row
		echo "<center><table>";
        echo "<tr><td rowspan=8  style=\"width:400px\"> <img style=\"width:400px;\"; src=\"".$profile_pic."\" /></td>";
        echo "<td>Name :</td><td>".$name."</td></tr>";
        echo "<tr><td>Education :</td>  <td>".$education."</td></tr>";
        echo "<tr><td>Gender :</td>  <td>".$gender."</td></tr>";
        echo "<tr><td>mobile :</td>  <td>".$mobile."</td></tr>";
        echo "<tr><td>Address :</td>  <td>".$address."</td></tr>";
        echo "<tr><td>Email Id :</td>  <td>".$emailid."</td></tr>";
        echo "<tr><td>Occupation :</td>  <td>".$occupation."</td></tr>";
        echo "<tr><td>Relationship :</td>  <td>".$relationship."</td></tr>";
        
        echo "</center></table>";
        echo "<div class=\"row\">
        <div class=\"large-12 large-centered columns\">
          <input type=\"submit\" class=\"button expand\" name=\"login\" value=\"Back\" onclick=\"f2()\"/>
        </div>
      </div>";
	//}	
$conn->close();
      
    ?>

</div>
<hr>
</div>
    
</div>
</div>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
    <script>



        function f2()
        {
             window.location.href = "userprofile.php";
        }
    </script>

</html>
