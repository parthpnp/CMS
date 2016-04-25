<?php
session_start();
if($_SESSION['fh_email']==null)
{
    header("Location: login.php");
}

?>
<htmh>
    <head>
        <title>Searching</title>

        <link rel="stylesheet" href="css/foundation.min.css">

    </head>

    <body>

    <?php include("menubar.html"); ?>

    <div class="off-canvas-wrapper">

        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

            <div class="off-canvas-content" data-off-canvas-content>
                <div class="title-bar hide-for-large">
                    <div class="title-bar-left">
                        <button class="menu-icon" type="button" data-open="my-info"></button>
                        <span class="title-bar-title">Menu</span>
                    </div>
                </div>
                <div class="callout primary">
                    <div class="row column">
                        <h4>family Head Searching</h4>
                    </div>
                </div>



            <form name="searchbyname" action="search.php" method="post">
                <table>
                    <tr>
                        <td>
            <input id="nameid" name="name" placeholder="Search By name" type="text"></td>
            <td><input type="submit" value="Search" class="button" ></td>

        </form>

        <form name="searchbycity" action="search.php" method="post">
            <td>
            <input name="occupation" placeholder="Search By Occupation" type="text"></td>
            <td><input type="submit" value="Search" class="button"></td>
        </form>
                </tr>
                </table>
        <?php

        if(!empty($_POST['name'])) {
           
            include("connection.php");
            $name = $_POST['name'];
            $sql = "SELECT * FROM family_head WHERE name LIKE '%$name%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table border='1'>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Mobile</td>
                <td>Address</td>
                <td>Occupation</td>
                <td>Gender</td>
            </tr>";

                while ($row = $result->fetch_assoc()) {
                    $urlname = $row['emailid'];
                    echo "<tr>
                    <td><a href='details.php?name=$urlname'>" . $row["name"] . "</td>
                    <td>" . $row["emailid"] . "</td>
                    <td>" . $row["mobile"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["occupation"] . "</td>
                    <td>" . $row["gender"] . "</td>
                  </tr>";
                }

                echo "</table>";
            } else {
                echo "No Match Found";
            }
            $conn->close();
        }
        ?>

                <?php

                if(!empty($_POST['occupation'])) {
                    include("connection.php");
                    $occupation = $_POST['occupation'];

                    $sql = "SELECT * FROM family_head WHERE occupation LIKE '%$occupation%'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        echo "<table border='1'>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Mobile</td>
                <td>Address</td>
                <td>Occupation</td>
                <td>Gender</td>
            </tr>";

                        while ($row = $result->fetch_assoc()) {
                            $urlname = $row['emailid'];
                    echo "<tr>
                    <td><a href='details.php?name=$urlname'>" . $row["name"] . "</td>
                    <td>" . $row["emailid"] . "</td>
                    <td>" . $row["mobile"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["occupation"] . "</td>
                    <td>" . $row["gender"] . "</td>
                  </tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No Match Found";
                    }
                    $conn->close();
                }
                ?>


    </body>

</htmh>