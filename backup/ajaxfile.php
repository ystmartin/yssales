<?php

require_once("dbtools.inc.php"); 
$userid = $_POST['SN'];
$link = create_connection();
$sql = "select * from dynamiclist where id=".$userid;
$result = execute_sql($link, "tw1_yssales", $sql3);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0' width='100%'>
<tr>
    <td width="300"><img src="images/<?php echo $row['photo']; ?>">
    <td style="padding:20px;">
    <p>Name : <?php echo $row['name']; ?></p>
    <p>Position : <?php echo $row['position']; ?></p>
    <p>Office : <?php echo $row['office']; ?></p>
    <p>Age : <?php echo $row['age']; ?></p>
    <p>Salary : <?php echo $row['salary']; ?></p>
    </td>
</tr>
</table>
 
<?php } ?>