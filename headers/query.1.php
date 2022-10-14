


<script>


$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#dob').attr('max', maxDate);
});




function checkemail()
            {
        var email = document.getElementById("email").value;

             if(email)
             {
                 
              $.ajax({
              type: 'post',
              url: "phpquery/checkmail.php", // request file the 'check_email.php'
              data: {
              email: email,
              },

              success: function (response) {
               $( '#email_status' ).html(response);
               if(response=="This Email Address is Already Exist")
               {
               $("email_status").fadeIn().html(response);
               $('input:submit').attr('disabled',true);           

                return false;
               }
               else
               {
                $('input:submit').attr('disabled',false);           

                return true;
               }
              }
              });
             }
             else
             {
              $( '#email_status' ).html("");
              return false;

             }
            }

//    start query
    $(document).ready(function () {
        // save comment to database
        $(document).on('click', '#Register', function () {

                        var first_name = $('#first_name').val();
                        var last_name = $('#last_name').val();
                        var email = $('#email').val();
                        var password = $('#password').val();
                        var gender = $(".gender:checked").val();
                        var dob = $('#dob').val();
                        var prefix = $('#prefix').val();

            var valid;
            valid = validateContact();

            if (valid) {
                // $("#poster").submit();

                $.ajax({
                    url: "phpquery/check.php", // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: {
                             'first_name': first_name,
                             'last_name': last_name,
                             'email': email,
                             'password': password,
                             'gender': gender,
                             'dob': dob,
                             'prefix': prefix,

                                        },


            
                     success: function (data) {

             window.location.href = "patient_verification.php";
              
        
                $('body').load("db-profile.php").hide().fadeIn(1500);
                window.location.replace('db-profile.php');

          

                     }

                });
            };

            // check validations
            function validateContact() {
                var valid = true;
                $(".demoInputBox").css('background-color', '');
                $(".info").html('');

                var minLength = 8;
                    var value = $("#password").val();

                      if (value.length < minLength){ 
                         $("#real").html("(Password contains Minimum 8 Characters)");
                            valid = false;
                                 }


                if (!$("#first_name").val()) {
                    $("#first").html("(First Name Required)");
                    $("#first_name").css('background-color', '#FFFFDF');
                    valid = false;
                }

                if (!$("input[name='gender']:checked").val()) {
                    $("#genders").html("(Gender Required)");
                    valid = false;

                     }

                if (!$("#last_name").val()) {
                    $("#last").html("(Last Name Required)");
                    $("#last_name").css('background-color', '#FFFFDF');
                    valid = false;
                }
                
                if (!$("#email").val()) {
                    $("#email_status").html("(Email is required)");
                    $("#email").css('background-color', '#FFFFDF');
                    valid = false;
                }
                if (!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                    $("#userEmail-info").html("(Invalid Email Address)");
                    $("#email").css('background-color', '#FFFFDF');
                    valid = false;
                }
                if (!$("#password").val()) {
                    $("#real").html("(Password is required)");
                    $("#password").css('background-color', '#FFFFDF');
                    valid = false;
                }
                if (!$("#password1").val()) {
                    $("#pass1").html("(Conform password required)");
                    $("#password1").css('background-color', '#FFFFDF');
                    valid = false;       
                }
                if ($("#password").val() != $("#password1").val()) {
                    $("#invalid").html("(Password do not match)");
                    // $("#password1").css('background-color', '#FFFFDF');
                    valid = false;
                }

                if (!$("#dob").val()) {
                    $("#dobs").html("(DOB is required)");
                    // $("#password").css('background-color', '#FFFFDF');
                    valid = false;
                }

                if ($("#prefix").val() == 'Select') {
                                $("#prefix_info").html("(Select)");
                                //    $("#specilization").css('background-color', '#FFFFDF');
                                valid = false;
                            }

                return valid;
            }

        });

        // login query
 $('#loginform').on('submit',function(e){
    e.preventDefault();

   var fd = new FormData();

// var email = $('#lemail').val();
// var password = $('#lpassword').val()

var validemail;
validemail = validateEmail();
if (validemail) {
    $.ajax({

        type: "POST",  // Type of request to be send, called as method
        url: "phpquery/logged.php", // Url to which the request is send
        data: new FormData(this),                
        cache: false,
		contentType: false,
		processData: false,

        beforeSend: function () {
            $('#login').val("connecting.....");
        },

        success: function (data) {

            if (data) {
                $('body').load("db-profile.php").hide().fadeIn(1500);
                window.location.replace('db-profile.php');

            } else {

                $('#login').val('Login');
                $('#error').html("<span class='text-danger'> Invalid username or password </span>");
            }

        }

    });

};

function validateEmail() {
    var validemail = true;
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');

    if (!$("#lemail").val()) {
        $("#Email-info").html("(Email is required)");
        $("#lemail").css('background-color', '#FFFFDF');
        validemail = false;
    }

    if (!$("#lemail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#Email-info").html("(Invalid password. Please check....)");
        $("#lemail").css('background-color', '#FFFFDF');
        validemail = false;
    }
    if (!$("#lpassword").val()) {
        $("#pass").html("(Password is required)");
        $("#lpassword").css('background-color', '#FFFFDF');
        validemail = false;
    }

    return validemail;
}



});

   // send email to forgot password
   $(document).on('click', '#forgot', function () {

var email = $('#forgot_email').val();


var valid;
valid = validateContact();

if (valid) {

        $.ajax({
        url: "phpquery/forgot.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: {
        
            'email': email,
    

        },

        success: function (response) {

            // $('#forgot_email').val('');    

    
        },
error: function (xhr, ajaxOptions, thrownError) {
swal("Error Saved!", "Please try again", "error");
}

    });



};

// check validations
function validateContact() {
    var valid = true;
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');

    if (!$("#forgot_email").val()) {
        $("#forgot_email_status").html("(Required)");
        $("#forgot_email").css('background-color', '#FFFFDF');
        valid = false;
    }
    if (!$("#forgot_email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#forgot_email_info").html("(Invalid Email Address)");
        $("#forgot_email").css('background-color', '#FFFFDF');
        valid = false;
    }

        return valid;
           }

         });







    });


</script>