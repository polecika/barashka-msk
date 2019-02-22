<?php
$link = mysqli_connect("localhost", "u0475271_default", "d5UdhV!X", "u0475271_default")
or die ('ERROR CONNECT MYSQL');
if (!mysqli_set_charset($link, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($link));
    exit();
}


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>