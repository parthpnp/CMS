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
<title>Family Head | CMS</title>
<link rel="stylesheet" href="css/foundation.min.css">
</head>
<body>
<div class="off-canvas-wrapper">

<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
                        <?php include("menubar.html") ?>
                        <?php include("sidebar.php") ?>

<div class="off-canvas-content" data-off-canvas-content>
<div class="title-bar hide-for-large">
<div class="title-bar-left">
<button class="menu-icon" type="button" data-open="my-info"></button>
</div>
</div>
<div class="callout primary">
<div class="row column">
<h4>His/Her Family Members</h4>
</div>
</div>
    <div class="row small-up-2 medium-up-3 large-up-4">
    <?php
        
        $emailid = $_GET['name'];
        include("connection.php");
		$sql = "SELECT * FROM family_member where fh_emailid= '$emailid' ";
		$result = $conn->query($sql);
	//	if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
        echo "<div class=\"column\">
                <img style=\"height:110px; width:160px;\"; class=\"thumbnail\" src=\"".$row["profile_pic"]."\" onclick=\"f1(".$row["fmid"].")\">
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
    <script>

    function f1(x)
        {
            
            document.cookie="fmid="+x;
             window.location.href = "ViewMembersReadonly.php";
        }
    </script>
    
</html>
