<?php
include('connect.php');
include('cek-login.php');
ini_set("memory_limit",-1);
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

$userId = $userRow['userId'];
$dataId = $_POST['id'];
$csv = array();
// check there are no errors
if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = strtolower(end((explode('.', $_FILES['csv']['name']))));
    $type = $_FILES['csv']['type'];
    $tmpName = $_FILES['csv']['tmp_name'];
	$tmpName2 = "actual/submission".strval($dataId).".csv";
	$match = 0;
	$size = 0;
	if (($file1 = fopen($tmpName, "r")) !== FALSE) {
		$file2 = fopen($tmpName2, "r");
		while (($file1Row = fgetcsv($file1)) !== FALSE) {
			$size++;
			$file2Row = fgetcsv($file2);
			if($file1Row[1] == $file2Row[1]){
				$match++;
			}
			
		}
		fclose($file1);
		fclose($file2);
	}
	$score = ($match/$size) * 100;
	echo $score;
	
	$qcheck=mysqli_query($conn, "SELECT * FROM score WHERE userId='$userId' AND dataId='$dataId'");
	$userRow=mysqli_fetch_array($qcheck);
	$nrow = mysqli_num_rows($qcheck);
	if($nrow==1){
		$version = $userRow['version']+1;
		$query = "UPDATE score SET score='$score', version='$version' WHERE userId='$userId' AND dataId='$dataId'";
		$res = mysqli_query($conn, $query);	
		echo "update score";
	}else{
		$query = "INSERT INTO score(userId,dataId,score,version) VALUES('$userId','$dataId','$score','1')";
		$res = mysqli_query($conn, $query);
		echo "thank you for submitting";
	}
	$qLead = mysqli_query($conn, "SELECT * FROM score WHERE dataId='$dataId' order by score desc");
	$leadRow = mysqli_fetch_array($qLead);
	$leaderId = $leadRow['userId'];
	
	$qLeadName = mysqli_query($conn, "SELECT * FROM users WHERE userId='$leaderId'");
	$leadRowName = mysqli_fetch_array($qLeadName);
	$leaderName = $leadRowName['userName'];
	
	$resLead = mysqli_query($conn, "UPDATE data SET leaderboard='$leaderName' WHERE dataId='$dataId'");
	//echo $qLeadRowName;
	if ($resLead) {
		header('location:index.php?message=update');
	}
}
?>