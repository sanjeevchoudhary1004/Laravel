<title>Blur Event</title>
</head>
<body>
<h2>Blur Event</h2>
<form id="myform">
Enter Name :<input id="myval" type="text" value="">
<span id="err" style="color: red></span> <br/><br/>
Enter Email:<input id="myemail" type="text" value="">
</form>
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#myval").blur(function() {
$('#err').html('testing change event');
});
});
</script>