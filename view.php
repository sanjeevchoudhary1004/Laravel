<?php
extract($_POST);
if(isset($string))
{
    //$searchstr = $_POST['searchstr'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM register_user WHERE name LIKE '%".$searchstr."%' ";
    $search_result = filterTable($query);
     
}
 else {
    $query = "SELECT * FROM register_user";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "7ambn");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Display Records</title>
</head>
<body>
	<h1>Display DB Records!</h1>
  <div>
    <form method="post" action="">
  Search By Name:<input type="text" placeholder="Search By Name" name="searchstr">
  <input type="submit" name="string" value="Search!">
  </form>
  <a href="download_dbrecs.php">PDF Download</a><br>
  <a href="download_csv.php">CSV Download</a><br>
  <a href="download_excel.php">Excel Download</a><br>
   <a href="excel_db.php">Export Excel</a>
</div><br><br>

	<table border="1px">
		<thead>
			<tr>
				<th>Sl.no</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Mobile</th>
				<th>Date</th>
				<th>Profile Pic</th>
        <th colspan="2">Action</th>
			</tr>			
		</thead>
		<tbody>
			
                  <?php 
                  $i=1;
                  while($row = mysqli_fetch_array($search_result)):
                  	?>                  	
                  <tr>                 	
                  	<td><?php echo $i;?></td>
                  	<td><?php echo ucfirst($row['name']);?></td>
                  	<td><?php echo $row['email'];?></td>
                  	<td><?php echo $row['password'];?></td>
                  	<td><?php echo $row['mobile'];?></td>
                  	<td><?php echo $row['date'];?></td>
                  	<td><img src="uploads/<?php echo $row['profile_pic']; ?>" width=50 height=50/></td>
                    <td><button id="<?php echo $row['user_id'];?>" class="edit">Update</button> 
                    	<button class="del" id="<?php echo $row['user_id'];?>">Delete</button> 
                    </td>
                  </tr>
                       <?php 
                         $i++;
                        endwhile;
                        ?>
		</tbody>
		
	</table>
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="app.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$('.del').click(function() {
		var id = $(this).attr('id');
		$.ajax({
	    url : "delete.php",
	    type: "POST",
	    data : { id: id },
	    success: function(data)
	    {
	    	$('#records_content').fadeOut(1100).html(data);
	    	$.get("view.php", function(data)
	    	{	
	    		$("#table_content").html(data); 
	    	});
	    }
	});
});// delete close

	$('.edit').click(function() {
		var id = $(this).attr('id');
		$('#show-add').hide();
		$.ajax({
	    url : 'edit.php',
	    type: 'POST',
	    data : { id: id },
	    success: function(data)
	    {
    		$("#link-add").html(data);
    		$('#link-add').show();
	    }
	});
});
}); // edit close
</script>


</body>
</html>