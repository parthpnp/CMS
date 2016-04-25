<div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas data-position="left" style="height:100%">
<div class="row column">
<br>


<?php
        $emailid = $_SESSION['fh_email'];
        include("connection.php");
		$sql = "SELECT * FROM family_head where emailid= '$emailid' ";
		$result = $conn->query($sql);
	
        while($row = $result->fetch_assoc())
        {
                $emailid = $row["emailid"];
                $mobile = $row["mobile"];
                $address = $row["address"];
                $occupation = $row["occupation"];
                $gender = $row["gender"];
                echo "<div class=\"column\">
                <img style=\"height:150px; width:160px;\"; class=\"thumbnail\" src=\"".$row["profile_pic"]."\" \"></div>";
                echo "<h5>Welcome ".$row["name"]."</h5>";
                echo "<h5>Email Id : ".$emailid."</h5>";
                echo "<h5>Mobile :  ".$mobile."</h5>";
                echo "<h5>Address : ".$address."</h5>";
                echo "<h5>Occupation : ".$occupation."</h5>";
                echo "<h5>Gender : ".$gender."</h5>";
                
        }
    
    ?>
</div>
</div>