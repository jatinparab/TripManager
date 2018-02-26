function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    //alert("You have entered an invalid email address!")
    return (false)
}


function login_click(){
    //alert("logl");
    if(document.getElementById("login_email").value == null || document.getElementById("login_password").value == null){
        alert("Please fill all the fields!");
        return;
    }else if(!ValidateEmail(document.getElementById("login_email").value)){
        alert("Please enter a valid email ID!");
    }else{
        if(login(document.getElementById("login_email").value, document.getElementById("login_password").value)== 'success'){
            window.location = '';
            return
        }else{
            alert("Invalid email or password, sign up first.");
            return
        }
    }
}

function login(email, password){
    var retval;
    retval = $.ajax({
        type: "POST",
        url: "util/login.php",
        async: false,
        data: {
            email: email,
            password: password
        },
        success: function (data) {
            
        }
    }).responseText;
    //alert(retval);
    return retval;
    
}

function signup_click(){
    var gender = $("input[type='radio'][name='gender']:checked").val();
    var username = $('#signup_name').val();
    var email = $('#signup_email').val();
    var password = $('#signup_password').val();
    var contact_number = $('#signup_contact_number').val();
    alert(contact_number);
    alert(gender);
    if(!gender || !username || !email|| !password  || !contact_number){
        alert("Please fill out all the fields!");
        return
    }else if(!ValidateEmail(email)){
        alert("Please enter a valid email id");
    }else if(password.length < 6){
        alert("Please enter a password more than 6 characters");
    }else{
        if(register(username,email,password,contact_number,gender) == 'success'){
            alert("Successfully Registered! Please login");
            window.location = '';
        }else{
            alert("There was a error with registration, please try again later");
        }
        
    }
}

function register(username, email, password, contact_number, gender){
    var retval;
    retval = $.ajax({
        type: "POST",
        url: "util/register.php",
        async: false,
        data: {
            username: username,
            email: email,
            password: password,
            contact_number: contact_number,
            gender: gender
        },
        success: function (data) {
            
        }
    }).responseText;
    //alert(retval);
    return retval;
    
}

