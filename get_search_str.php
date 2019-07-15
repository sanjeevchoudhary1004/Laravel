<?php
$name=$_GET['name'];
require_once "dbconnect.php";
$sql_search="select name from register_tbl where name like '$name%'";
$res=mysqli_query($conn,$sql_search);
while($row=mysqli_fetch_assoc($res))
{
?>
<p><?php echo $row['name'];?></p>
<?php
}
?>