<?php
// Authentication
require_once "authenticator.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		HomePage
	</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<section data-role="page">
	<Header>
		<div style="border:4px solid yellowgreen">
			<font size="+2"><h1> News Paper Management System</h1></font>
		</div>
	</Header>
		<div>
			<div style="height:500px; width:60%; border:4px solid yellowgreen; float: left;padding:1%;">
				<font size="+2"><label>Selected Submitions:</label></font>
				<div style="height:390px ; overflow:auto; padding:1%">
				<ol>
					<li>One</li>
					<li>Two</li>
					<li>Three</li>
					<li>Four</li>
					<li>Five</li>
					<li>Six</li>
				</ol>
			</div>
		</div>
		<div style="height:231px; width:34.92%; border:4px solid yellowgreen; float: left;padding:1%;">
			<input type="button" name="Contact" value="View" style="background-color: yellowgreen; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">
		</div>
		<div style="height:231px; width:34.92%; border:4px solid yellowgreen; float: left;padding:1%;">
			<input type="button" name="Contact" value="Download" style="background-color: yellowgreen; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">
		</div>
	<footer data-role="footer"><div style="border:4px solid yellowgreen; padding:1%; clear: both;">@ 2019 2-1640 group</div></footer>
	</section>
</body>
</html>