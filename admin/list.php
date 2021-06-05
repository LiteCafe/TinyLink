<?php
include '../config/database.php';

$questionsql = $dbprefix.'links';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$questionsql;

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

        echo ('<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td><a class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent" href="//'.$row['long_url'].'" target="_blank"><i class="mdui-icon material-icons">&#xe315;</i></a></td>
        <td>'.$row['short_url_code'].'</td>
        <td>
            <a class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent" href="./edit?lid='.$row['id'].'"><i class="mdui-icon material-icons">&#xe315;</i></a>
            <a class="mdui-btn mdui-btn-icon mdui-ripple mdui-color-theme-accent" href="./delete?lid='.$row['id'].'"><i class="mdui-icon material-icons">&#xe872;</i></a>
        </td>
');
      echo('</tr>');
    }
} else 
{
    echo "";
}

mysqli_close($con);


?>