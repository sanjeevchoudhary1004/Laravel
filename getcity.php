<!--Displaying Cities Name in Select Box-->
<select name="city" id="city">
	<option value="">-Select city-</option>
	<?php
       $sid=$_GET['sid'];
        require_once"dbconnect.php";
        $sql_qry ="select * from city_tbl where state_id=$sid";
        $states =mysqli_query($conn ,$sql_qry);
        while($rows=mysqli_fetch_assoc($states))
        {

        ?>
        <option 
         value="<?php 
           echo $rows['city_id'];
               ?>">
        	<?php
        	  echo UCfirst($rows['city_name']);
        	?>

        </option>

       	<?php

       }

		?>
</select>