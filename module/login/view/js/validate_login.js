// VALIDAR REGISTRO
function validate_register(){
    // FORM VARIABLES
    var first_name=$("#first_name_register");
    var e_first_name=$("#e_first_name");

    var last_name=$("#last_name_register");
    var e_last_name=$("#e_last_name");

    var username=$("#username_register");
    var e_username=$("#e_username");

    var email=$("#email_register");
    var e_email=$("#e_email");

    var password=$("#password_register");
    var e_password=$("#e_password");

    var confirm_password=$("#confirm_password_register");
    var e_confirm_password=$("#e_confirm_password");
    //RESULT
    var result= true;
    //PATTERNS
    var pemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

    //First Name Validate
    if(!first_name.val()){
        first_name.focus();
        e_first_name.html("El nombre no puede estar vacio");
        e_first_name.attr("hidden", false);
        result=false;
    }else if(first_name.val().length < 4){
        first_name.focus();
        e_first_name.html("Tiene que tener mas de 4 caracteres");
        e_first_name.attr("hidden", false);
        result=false;
    }else{
        e_first_name.attr("hidden", true);
    }
    //Last Name Validate
    if(!last_name.val()){
        last_name.focus();
        e_last_name.html("El last name no puede estar vacio");
        e_last_name.attr("hidden", false);
        result=false;
    }else if(last_name.val().length < 4){
        last_name.focus();
        e_last_name.html("Tiene que tener mas de 4 caracteres");
        e_last_name.attr("hidden", false);
        result=false;
    }else{
        e_last_name.attr("hidden", true);
    }
   //Username Validate
    if(!username.val()){
        username.focus();
        e_username.html("El USERNAME no puede estar vacio");
        e_username.attr("hidden", false);
        result=false;
    }else if(username.val().length < 4){
        username.focus();
        e_username.html("Tiene que tener mas de 4 caracteres");
        e_username.attr("hidden", false);
        result=false;
    }else{
        e_username.attr("hidden", true);
    }
    //EMAIL Validate
    if(!email.val()){
        email.focus();
        e_email.html("El Email no puede estar vacio");
        e_email.attr("hidden", false);
        result=false;
    }else if (!pemail.test(email.val())){
        email.focus();
        e_email.html("El Email no tiene formato valido");
        e_email.attr("hidden", false);
        result=false;
    }else{
        e_email.attr("hidden", true);
    }
    //Password validate
    if(!password.val()){
        password.focus();
        e_password.html("El password no puede estar vacio");
        e_password.attr("hidden", false);
        result=false;
    }else if (password.val().length < 8){
        password.focus();
        e_password.html("El password minimo 8 caracteres");
        e_password.attr("hidden", false);
        result=false;
    }else{
        e_password.attr("hidden", true);
    }
    // Confirm password
    if(!confirm_password.val()){
        confirm_password.focus();
        e_confirm_password.html("El confirm_password no puede estar vacio");
        e_confirm_password.attr("hidden", false);
        result=false;
    }else if (confirm_password.val() != password.val()){
        confirm_password.focus();
        e_confirm_password.html("Las contraseñas no coinciden");
        e_confirm_password.attr("hidden", false);
        result=false;
    }else{
        e_confirm_password.attr("hidden", true);
    }

    return result;
}
function form_register_submit(){
    $("#form_register").submit(function(e){
        e.preventDefault();
        var register_serialized = $("#form_register").serialize();
        console.log(register_serialized);
        if(validate_register()){
            $.ajax({
				type : 'POST',
				url  : 'module/login/controller/clogin.php?&op=register&' + register_serialized,
				data : register_serialized,
				success: function(response){			
			   		console.log(response)		
					if(response){
						// setTimeout(' window.location.href = "index.php?page=login";',1000);
					}else{
						$("#error_login").fadeIn(1000, function(){						
							$("#error_login").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						});
					}
				}
			});
        }
        
    });
}

//READY
$(document).ready(function(){
    form_register_submit();
});