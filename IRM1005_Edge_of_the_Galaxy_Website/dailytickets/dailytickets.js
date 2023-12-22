function Alert(){
    var firstname = document.forms["form"]["firstname"]; 
    var lastname = document.forms["form"]["lastname"];               
    var email = document.forms["form"]["email"];    
    var phone = document.forms["form"]["phone"];  
   
    if (firstname.value == "")                                  
    { 
        window.alert("Please enter a valid First Name."); 
        name.focus(); 
        return false; 
    } 
   
    if (lastname.value == "")                               
    { 
        window.alert("Please enter a valid Last Name."); 
        address.focus(); 
        return false; 
    } 
       
    if (email.value == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (phone.value == "")                           
    { 
        window.alert("Please enter a valid phone number."); 
        phone.focus(); 
        return false; 
    } 
   
    return true; 
}

$(document).ready(function(){
    $(".spotlight").on({
        mouseenter: function(){ 
            $(this).css({"background-color":"yellow", "font-size":"larger"});
        },
        mouseleave: function(){
            $(this).css({"background-color":"white", "font-size":"smaller"}); 
        },
    });
});




