<html>
<body>
<?php
    $userid1 = $_POST['userid'];
    $passid1 = $_POST['passid'];
    $username1 = $_POST['username'];
    $address1 = $_POST['address'];
    $country1 = $_POST['country'];
    $zip1 = $_POST['zip'];
    $email1 = $_POST['email'];
    $gender = $_POST['sex'];
    $en1 = $_POST['en'];
    $nonen1 = $_POST['nonen'];
    $desc1 = $_POST['desc'];
    if ($en1 == "english" && $nonen1 == "non-english") {
        $checkbox1 = $en1 + "and" + $nonen1;
    } else if ($en1 == "english") {
        $checkbox1 = $en1;
    } else if ($nonen1 == "non-english") {
        $checkbox1 = $nonen1;
    }
    $con = mysql_connect("127.0.0.1", "root", "");
    if ($con) {
        print "<br>" . "connected to mysql";
    }
    $db_con = mysql_select_db("validdatabase", $con);
    if ($db_con) {
        print "<br>" . "connected to database";
        print "<br>";
        print "<br>" . "---------------database data--------------" . "<br>";
        $sql = "INSERT INTO `validdatabase`.`data_validation` (
            `userid` ,
            `password` ,
            `name` ,
            `address` ,
            `country` ,
            `zipcode` ,
            `email` ,
            `sex` ,
            `language` ,
            `about`
        ) VALUES ('$userid1', '$passid1', '$username1', '$address1', '$country1', '$zip1', '$email1', '$gender', '$checkbox1', '$desc1')";
        $result = mysql_query($sql);
        $sql1 = "SELECT * FROM `data_validation`";
        $result1 = mysql_query($sql1);
        while ($data = mysql_fetch_assoc($result1)) {
            print "<br>";
            print $data['userid'] . "<br>";
            print $data['password'] . "<br>";
            print $data['name'] . "<br>";
            print $data['address'] . "<br>";
            print $data['country'] . "<br>";
            print $data['zipcode'] . "<br>";
            print $data['email'] . "<br>";
            print $data['sex'] . "<br>";
            print $data['language'] . "<br>";
            print $data['about'] . "<br>";
            print "<br>";
        }
    }
?>
</body>
</html>
