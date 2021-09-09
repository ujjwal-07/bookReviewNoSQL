<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$username= $_POST['username'];
$authorname = $_POST['authorname'];
$bookname = $_POST['bookname'];
$genre = $_POST['genre'];
$publisher = $_POST['publisher'];
$publicationyear = $_POST['publicationyear'];
$bookreview = $_POST['bookreview'];

if (!empty($username) || !empty($authorname) ||!empty($bookname)|| !empty($genre)
	||!empty($publisher)|| !empty($publicationyear)|| !empty($bookreview))
{
	$host = "localhost";
	$dbusername = "root";
	$dbPassword = "root";
	$dbname = "dbmspblproject" ;

	$conn = new mysqli($host, $dbusername, $dbPassword, $dbname);

	if(mysqli_connect_error())
	{
		die("Connect Error(".mysqli_connect_errno().")"
		 .mysqli_connect_error());
	}
	else
	{
		$SELECT = "SELECT username From reviewformtable Where username = ? Limit 1";
		$INSERT = "INSERT Into reviewformtable (username,authorname,bookname,genre
		,publisher,publicationyear,bookreview) values (?,?,?,?,?,?,?)";

		$stmt =$conn->prepare($SELECT);
		$stmt->bind_param("s" , $username);
		$stmt->execute();
		$stmt->bind_result($username);
		$stmt->store_result();
		$rnum =  $stmt->num_rows;
		if ($rnum==0)
		{
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt-> bind_param("sssssss" , $username , $authorname ,$bookname,$genre,$publisher,$publicationyear,$bookreview);
			$stmt-> execute();
			echo "New Record Inserted sucessfully";
		}else{
			echo "Username already used ";

		}
		$stmt->close();
		$conn->close();
	}
}

else
{
	echo "All Fields Need To Be Filled" ;
	die();
}

?>