<html>
    <head>
       <title>jQuery Test</title>
       <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
       <script type="text/javascript">
           $(document).ready(function() {
               $("#submit").click(function(){
                   $.ajax({
                       url: "text.php",
                       type: "POST",
                       data: {
                           amount: $("#amount").val(),
                           firstName: $("#firstName").val(),
                           lastName: $("#lastName").val(),
                           email: $("#email").val()
                       },
                       dataType: "JSON",
                       success: function (jsonStr) {
                           $("#result").text(JSON.stringify(jsonStr));
                       }
                   });
               });
           });
       </script>
    </head>

    <body>
        <div id="result"></div>
        <form name="contact" id="contact" method="post">
            Amount: <input type="text" name="amount" id="amount"/><br/><br>
            firstName: <input type="text" name="firstName" id="firstName"/><br/><br>
            lastName: <input type="text" name="lastName" id="lastName"/><br/><br>
            email: <input type="text" name="email" id="email"/><br/><br>
            <input type="button" value="Get It!" name="submit" id="submit"/>
        </form>
    </body>
</html>