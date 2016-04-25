<?php
session_start();
if($_SESSION['ch_email']==null)
{
    header("Location: ch_login.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Commnuity Head | CMS</title>
<link rel="stylesheet" href="css/foundation.min.css">
</head>
<body>
<div class="off-canvas-wrapper">

<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
                        <?php include("menubar1.html") ?>
<div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas data-position="left" style="height:100%">

<div class="row column">

<br>
    <?php
        $emailid = $_SESSION['ch_email'];
        include("connection.php");
		$sql = "SELECT * FROM community_head where emailid= '$emailid' ";
		$result = $conn->query($sql);
	
        while($row = $result->fetch_assoc())
        {
                echo "<div class=\"column\">
                <img style=\"height:150px; width:160px;\"; class=\"thumbnail\" src=\"".$row["profile_pic"]."\" \"></div>";
                echo "<h5>Name: ".$row["name"]."</h5>";
                echo "<p>Email id:- ".$row["emailid"]."</p>";               
        }
    
    ?>
<!--<img class="thumbnail" src="img/profilepic.jpg">-->

</div>
</div>
<div class="off-canvas-content" data-off-canvas-content>
<div class="title-bar hide-for-large">
<div class="title-bar-left">
<button class="menu-icon" type="button" data-open="my-info"></button>
<span class="title-bar-title">Menu</span>
</div>
</div>
<div class="callout primary">
<div class="row column">
<h4>Family Heads</h4>
</div>
</div>
    <div class="row small-up-2 medium-up-3 large-up-4">
    <?php
        
        $emailid = $_SESSION['ch_email'];
        include("connection.php");
		$sql = "SELECT * FROM family_head";
		$result = $conn->query($sql);
	//	if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
        echo "<div class=\"column\">
                <img style=\"height:110px; width:160px;\"; class=\"thumbnail\" src=\"".$row["profile_pic"]."\" onclick=\"f1(".$row["emailid"].")\">
                <h5>".$row["name"]."</h5>
                </div>";
    }
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
   
</html>
