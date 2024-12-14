<?php
$con = mysqli_connect("localhost", "root", "", "ajax");
$comment = isset($_POST['comment']) ? $_POST['comment'] : 0;

$sql = "SELECT * FROM comments LIMIT 2 OFFSET $comment ";



// echo $sql;
// exit(0);
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>";
        echo '<b>' . $row["author"] . '</b><br>';
        echo $row["comment"];
        echo "</p>";
    }
} else {

    echo "";
}
