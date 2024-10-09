<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style type="text/css">	
		
h1 {
	color : #000000;
	text-align : center;
	font-family: "SIMPSON";
}
form {
	width: 300px;
	margin: 0 auto;
}
  </style>
	</head>
<body>
 
<!--
	<table>
	
	<h3 align="center">檔案上傳</h3>
		<form name="form2" method="post" enctype="multipart/form-data" action="upload.php">
		<table border="0" width="900" align="center" > 
  		<input type="file" name="my_file">
  		<input type="submit" value="Upload">
		  </table>
		</form>
-->
<h3 align="center">檔案上傳</h3>
		<form  name="form" method="post" enctype="multipart/form-data" action="upload.php">
		<table align="center">
		<tr>
  		<input type="file" name="my_file">
  		<input type="submit" value="上傳">
		</tr>
		</table>
		</form>
	</body>
</html>
		
