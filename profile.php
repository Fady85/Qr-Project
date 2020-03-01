<html>
<head>
<title><?php echo $username;?>s Profile</title>
<style type="text/css">
.auto-style1 {
	font-size: medium;
}
</style>
</head>
<body style="width: 1015px; height: 368px">

<?php
//check for a form submission
require_once "config.php";
if (isset($_GET['username'])){
$username = $_GET['username'];

//at first this code was like this
//$sql = 'SELECT * FROM informationtable WHERE username="'.$username.'"';
//which is wrong bc. informationtable is the DATABASEs NAME not the name of the table
//informationtable contains users which contains username and other data

$sql = 'SELECT * FROM users WHERE username="'.$username.'"';
if ($result = $link -> query($sql)) {
  while ($obj = $result -> fetch_object()) {
	echo $obj->username; //also fullname was used instead of username which isn't defined anywhere
  }
  $result -> free_result();
}else{
die("Couldn't exec statement");
}
$link -> close();

?>
<h2><?php echo $username; ?>s profile </h2><br />
<table>
<tr><td class="auto-style1"><strong>Full Name:</strong></td><td style="width: 448px"><?php echo $username; ?>
	<br>
	<br></td></tr>
<tr><td class="auto-style1"><strong>Birthdate:</strong></td><td style="width: 448px"><?php echo $birthdate; ?>
	<br>
	<br></td></tr>
<tr><td class="auto-style1"><strong>Gender:</strong></td><td style="width: 448px"><?php echo $gender; ?>
	<br>
	<br></td></tr>
<tr><td class="auto-style1"><strong>Phone Number:</strong></td><td style="width: 448px"><?php echo $phonenumber; ?>
	<br>
	<br></td></tr>
<tr><td class="auto-style1"><strong>Guardian's Number:</strong></td><td style="width: 448px"><strong><?php echo $guardiannumber; ?>
	<br>
	</strong></td></tr>
<tr><td class="auto-style1"><strong>Other Guardian's Number:</strong></td><td style="width: 448px"><strong><?php echo $guardiannumber2; ?>
	<br>
	</strong></td></tr>
<tr><td class="auto-style1"><strong>Blood Type:</strong></td><td style="width: 448px"><strong><?php echo $bloodtype; ?>
	<br>
	</strong></td></tr>
<tr><td style="height: 29px" class="auto-style1"><strong>Allergies:</strong></td>
	<td style="width: 448px; height: 29px"><strong><?php echo $allergies; ?>
	<br>
	</strong></td></tr>

</table>

<?php

}else die ("You need to specify a username");
?>
</body>
</html>