function checkStepOneFields(url){
    var i = 0;
var firstname = $('#firstname').val();
var lastname = $('#lastname').val();
var streetAddress = $('#address').val();
var city = $('#city').val();
var state = $('#state').val();
var zip = $('#zip').val();
var country = $('#country').val();
var phone = $('#phone').val();
var age = $('#age').val();
var gender = $('#gender').val();
var email = $('#email').val();
var height = $('#height').val();
var weight = $('#weight').val();
$('.sf').each(function(index,element){
if($(element).val()== "")
{
    $(element).next('.error').show('slow');
    i++;
}
else
{
    $(element).next('.error').hide('slow');

}
});

if( i > 0)
{
    return false;
}
else
{

   var arr = [firstname,lastname,streetAddress,city,state,
zip,country,phone,age,gender,email,height,weight];

$.get(url,{data: arr},function(data){
if(data.error == false)
{
    var $active = $('.wizard .nav-tabs li.active');
    $active.next().removeClass('disabled');
    nextTab($active);
}
else 
{
    alert('Error: Network Connectivity may be the possible reason.');
}
},'json');

}


}



//step two

function checkStepTwoFields(url){
   // alert($('.applied_for_ana').length);
   var anaI = 0;
   var workI = 0;
   var jI = 0;
   var jL = 0;
   var iI = 0;
   var Ai = 0;
   var object = {};

  

   //applied for ana
    $('.applied_for_ana').each(function(index,element){
        if(!$(element).is(':checked'))
        {
            anaI++;
        }
        else if($(element).is(":checked") && ($(element).val() == "C" || $(element).val() == "D"))
        {
         object["applied_for_ana"] = $(element).val();

            if($('#datepicker').val() == "")
            {
                $('#datepicker').next('.error').show('slow');
                anaI++;
            }
            else
            {
         object["applied_for_ana_year"] =  $('#datepicker').val();

                $('#datepicker').next('.error').hide('slow');

            }
        }
        else
        {
            object["applied_for_ana"] = $(element).val();

        }
    });

        //work experience
    $('.work_experience').each(function(index,element){
        if(!$(element).is(':checked'))
        {
            workI++;
        }
        else
        {
            object["work_experience"] = $(element).val();
        }
    });

//japanese culture
    $('.japanese_culture').each(function(index,element){
        if(!$(element).is(':checked'))
        {
            jI++;
        }
        else
        {
            object["japanese_culture"] = $(element).val();

        }
    });

    //japanese language

    $('.japanese_lang').each(function(index,element){
        if(!$(element).is(':checked'))
        {
            jL++;
        }
        else if($(element).is(":checked") && $(element).val() == "D")
        {
            object["japanese_lang"] = $(element).val();  
            if(($('#school_name').val() == "" || $('#school_name').val() != "") && $('#employer_name').val() == "")
            {
                if($('#school_year').val() == "")
                {
                    if($('#school_name').val() == "")
                    {
                        $('#school_name').next('.error').show('slow');
                    }
                    else 
                    {
                        $('#school_name').next('.error').hide('slow');
                object["school_name"] = $('#school_name').val();  


                    }

                    $('#school_year').next('.error').show('slow');
                    $('#employer_year').next('.error').hide('slow');
                    $('#employer_name').next('.error').hide('slow');


                    jL++;
                    
                }
                else
                {
                object["school_year"] = $('#school_year').val();  

                    $('#school_year').next('.error').hide('slow');

                    if($('#school_name').val() == "")
                    {
                        $('#school_name').next('.error').show('slow');
                        jL++;
                    }
                    else 
                    {
                        $('#school_name').next('.error').hide('slow');
                object["school_name"] = $('#school_name').val();  


                    }

                }
            }


            else if(($('#employer_name').val() == "" || $('#employer_name').val() != "") && $('#school_name').val() == "")
            {
            
                if($('#employer_year').val() == "")
                {
                    if($('#employer_name').val() == "")
                    {
                        $('#employer_name').next('.error').show('slow');
                    }
                    else 
                    {
                        $('#employer_name').next('.error').hide('slow');
                object["employer_name"] = $('#employer_name').val();  


                    }

                    $('#employer_year').next('.error').show('slow');
                    $('#school_year').next('.error').hide('slow');
                    $('#school_name').next('.error').hide('slow');

                object["employer_year"] = $('#employer_year').val();  


                    jL++;
                    
                }
                else
                {
                    $('#employer_year').next('.error').hide('slow');
                object["employer_year"] = $('#employer_year').val();  

                if($('#employer_name').val() == "")
                {
                    $('#employer_name').next('.error').show('slow');
                    jL++;
                }
                else 
                {
                    $('#employer_name').next('.error').hide('slow');
            object["employer_name"] = $('#employer_name').val();  
      

                }
                }
            }
        }
        else
        {
            object["japanese_lang"] = $(element).val();   
        }
    });

    $('.internation_experience').each(function(index,element){
        if(!$(element).is(':checked'))
        {
            iI++;
        }
        else
        {
            object["internation_experience"] = $(element).val();   

        }
    });

    if($('#airline').val() == "")
    {
        Ai++;
    }
    else
    {
        object["airline"] = $('#airline').val();   

    }


    if(anaI > 3 || workI > 3 || jI > 3 || jL > 3 || iI > 3 || Ai > 0)
    {
        return false;
    }
    else
    {
        $.get(url,{data: object},function(data){
            if(data.error == false)
            {
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);
            }
            else
            {
                alert('Error: An Error has occurred, Possibly due to Network connectivity.')
            }
        },'json');
    }
   
}

$( "#datepicker" ).datepicker({dateFormat: 'yy'});
