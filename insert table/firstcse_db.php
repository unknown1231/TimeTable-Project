<?php
// this file inserts data into database. it takes input from firstcse.html
//there are some other comments too, some make sense, some don't. feel free to look at them
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timetable_subject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


/*
$period1 = $_POST['period1'];
$period2 = $_POST['period2'];
$period3 = $_POST['period3'];
$period4 = $_POST['period4'];
$period5 = $_POST['period5'];
$period6 = $_POST['period6'];
$period7 = $_POST['period7'];

$period1 = implode(" ", $period1);
$period2 = implode(", ", $period2);
$period3 = implode(", ", $period3);
$period4 = implode(", ", $period4);
$period5 = implode(", ", $period5);
$period6 = implode(", ", $period6);
$period7 = implode(", ", $period7);
*/


$n=1;
$day="";


if(isset($_POST['submit']))
{

while($n<7)
{
$period1="period".$n."1";
$period2="period".$n."2";
$period3="period".$n."3";
$period4="period".$n."4";
$period5="period".$n."5";
$period6="period".$n."6";
$period7="period".$n."7";

echo $n;

switch($n)
{
	case 1:
	 $day="monday";
       break;
    case 2:
       $day="tuesday";
        break;
     case 3:
	 $day="wednesday";
       break;
case 4:
	 $day="thursday";
       break;
case 5:
	 $day="friday";
       break;
case 6:
	 $day="saturday";
       break;
case 7:
	 $day="sunday";
       break;
}


$sql = "INSERT INTO firstcse(Day,Period1,Period2,Period3,Period4,Period5,Period6,Period7)
VALUES ('$day','$_POST[$period1]','$_POST[$period2]','$_POST[$period3]','$_POST[$period4]','$_POST[$period5]','$_POST[$period6]','$_POST[$period7]')";

$n++;

if ($conn->query($sql) === TRUE) {
echo "Record Inserted Successfuly";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

}

$conn->close();
?>
