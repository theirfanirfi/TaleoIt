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
    alert($(["name='applied_for_ana'"]).is(":checked"));
}
