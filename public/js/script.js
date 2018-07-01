$('#register').submit(function(e){
    var name = $('#fullname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var errors = [];
    var i = 0;
    var j = 1;
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
        // var cE = $('#checkEmail').val();
        // cE = cE + "/"+ email;

        // $.get(cE,function(data){

        //     if(data > 0)
        //     {
        //         e.preventDefault();
        //         j++;
        //         errors.push("Email already taken. Use another one.");
        //         alert('j one');
        //     }
        // });

        // if(j > 0)
        // {
        //     $('.alert').removeClass('alert-info').addClass('alert-danger');
        //     $('.alert').empty();
        // errors.forEach(function(value){
        //     $('.alert').append("<li>"+ value+"</li>");
        // });
    
        // e.preventDefault();
        // alert('j two');
        // }
        // else{
        $('.alert').removeClass('alert-danger').addClass('alert-success');
        $('.alert').empty();
        $('.alert').html("<p>Proceeding...</p>");
        $('#register').bind('submit');
       // }
    }
   
});
