$(document).ready(function () {
    /*$("h1").text("My Forms");
     $("h1").css("background-color", "green");
     
     $("h1").click(function() {
     $(this).text("My Forms").css("background-color", "green");
     });
     
     $("button").click(function() {
     //alert("Menu Clicked");
     $("#menu li").toggle("slow");
     }); */

    $("#insert").submit(function(event) {
        
        event.preventDefault();
        
        $.post(
            "insert.php",
            {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                username: $("#username").val(),
                password: $("#password").val()
            },
            function(data) {
                $("#result").text(data);
            }
        );
    });
});
