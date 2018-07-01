$('#register').submit(function(e){
    var name = $('#fullname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var errors = [];
    var i = 0;
    if(name == "")
    {
        errors.push("Full name field is required.");
        i++;
    }

    if(email =="")
    {
        errors.push("Email field is required.");
        i++;
    }

    if(password == "")
    {
        errors.push("Password Field is required.");
        i++;
    }
    
    if(password.length < 6)
    {
        errors.push("Password length must be at least six characters long.");
        i++;
    }

    if(i > 0){
    $('.alert').removeClass('alert-info').addClass('alert-danger');
        $('.alert').empty();
    errors.forEach(function(value){
        $('.alert').append("<li>"+ value+"</li>");
    });

    e.preventDefault();
    }
    else 
    {
        $('.alert').removeClass('alert-danger').addClass('alert-success');
        $('.alert').empty();
        $('.alert').html("<p>Proceeding...</p>");
        $('#register').bind('submit');
    }
   
});
