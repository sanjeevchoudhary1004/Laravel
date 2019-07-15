 <!--Displaying State Name in Select Box-->
<select name="state" id="state" onchange="ajax_city();">
  <option value="">-Select States-</option>
  <?php
        $cid=$_GET['cid'];
        require_once"dbconnect.php";
        $sql_qry ="select * from state_tbl where country_id=$cid";
        $states =mysqli_query($conn ,$sql_qry);
        while($rows=mysqli_fetch_assoc($states))
        {

        ?>
        <option 
         value="<?php 
           echo $rows['state_id'];
               ?>">
          <?php
            echo UCfirst($rows['state_name']);
          ?>

        </option>

        <?php

         }

    ?>
</select>
<!--Select Cities From Data Base-->
