$(document).ready(function()
{
    $("#passcode").css("display", "none");
    //$("#info_disable").children().attr("disabled","disabled");
    $('#info_disable :input').attr('disabled', true);

    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    $(".review_confirm_email").click(function(e)
    {
        e.preventDefault();
        var email = $('#email').val();

        if (!email.match(re) || email == "" || email.indexOf("gmail.com") < 0)
        {
            bootbox.alert("Invalid Email Id! Please provide a valid @" + coll_dom + " Email Id ");

        }

        else
        {
            $.ajax({
                type: "POST",
                url: CLIENT_SITE_URL + "client_college/send_passcode/",
                data: {email: email},
                success: function(data) {
                    if (data == 'sent') {
                        $("#passcode").css("display", "block");
                        $(".review_confirm_email").hide();
                    } else {
                        bootbox.alert("Passcode could not be sent! Please Try Again later");
                    }
                }
            });

        }
        // return false;
    });

    $(".confirmpasscode").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: CLIENT_SITE_URL + "client_college/check_passcode/",
            data: {passcode: $("input[name='passcode']").val()},
            success: function(data) {
                if (data == '1') {
                    $('#info_disable :input').attr('disabled', false);
                } else {
                    bootbox.alert("Passcode didn't match!");
                }
            }
        });
    });

});