<!--Displaying Country Name in Select Box-->
<select name="country" id="country" onchange="ajax_states();">

	<option value="">-Select Country-</option>
	<?php
        require_once"dbconnect.php";
        $sql_qry ="select * from country_tbl";
        $countries =mysqli_query($conn ,$sql_qry);
        while($rows=mysqli_fetch_assoc($countries))
        {

        ?>
        <option value="<?php echo $rows['country_id'];?>">
        <?php echo UCfirst($rows['country_name']);?>
        </option>

       	<?php

      }

		?>
</select>
<!--Select States From Data Base-->
<span id="result">
  <select name="state" id="state">
     <option>--Select State--</option>
  </select> 
</span>
<span id="reslt">
  <select name="city" id="city">
    <option>--Select City--</option>
  </select>
</span>


<!--Ajax code for states-->
<script type="text/javascript">
    function ajax_states(){
      var cid=document.getElementById('country').value;
      if(window.XMLHttpRequest)//Stage 1
        var obj=new XMLHttpRequest;
      else
        var obj=new ActiveXobject("Microsoft.XMLHTTP");
      obj.open("GET","getstates.php?cid="+cid,true);//Stage 2
      obj.send();//Stage 3
      obj.onreadystatechange=function(){
        if(obj.readyState==4)
          document.getElementById('result').innerHTML=obj.responseText;
      }
    }
  </script>
</script>
  <!--Ajax code for Cities-->
  <script type="text/javascript">
    function ajax_city(){
      var sid=document.getElementById('state').value;
      if(window.XMLHttpRequest)//Stage 1
        var obj=new XMLHttpRequest;
      else
        var obj=new ActiveXobject("Microsoft.XMLHTTP");
      obj.open("GET","getcity.php?sid="+sid,true);//Stage 2
      obj.send();//Stage 3
      obj.onreadystatechange=function(){
        if(obj.readyState==4)
          document.getElementById('reslt').innerHTML=obj.responseText;
      }
    }
  </script>




