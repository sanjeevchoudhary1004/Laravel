<title>Change Event</title>
</head>
<body>
<h2>change Event</h2>
<form id="myform">
Enter Name :<input id="myval" type="text" value="">
<span id="err" style="color: red"></span> <br/><br/>
Enter Email:<input id="myemail" type="text" value="">
</form>
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#myval").change(function() {
$('#err').html('testing change event');
});
});
</script>