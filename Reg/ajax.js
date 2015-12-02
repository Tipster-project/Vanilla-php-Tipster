$(document).ready(function(e) {
    //hides all the images
    $('.hideImg').hide();
    // This function will check if the value of the input in username is allready in the database. this is triggerd when the focus on the input field is lost. 
    $('#uName').blur(function(){
        //makes a variabel that has the value och the input.
         var username=$('#uName').val();
        //if username is empty a error text will appear and an error icon and it will remove the attribut correct from it.
        if (username == '') {
            $('#uchecked').hide();
            $('#uunchecked').fadeIn('slow');
            $('#message').text('This field needs to be filled out');
            $(this).removeAttr('correct');
        }else{
            $('#message').text('checking...');
                //if the above dosent match an ajax rutine will run with will send the value of username 
                //with post to vaildate.php who will check with the database if value match any usernames in the database.
                $.ajax({
                    type:"post",
                    url:"validate.php",
                    data:"username="+username,
                        success:function(data){
                            //if it succeds with the check it will send back and return 0 with is no match, wich means that it does not allready exists.
                            if(data==0){
                                //hides the error icon if is set and gives it the correct icon. gives a message and gives the input the attribute correct.
                                $('#uunchecked').hide();
                                $('#uchecked').fadeIn('slow');
                                $('#message').text('Username available');
                                $('#uName').attr('correct', 'correct');
                            }
                            else if(data==-1){
                                 //If their was something wrong with the request and it will put out a error icon and a error message and remove the attrbute correct if it has been given.
                                $('#uchecked').hide();
                                $('#uunchecked').fadeIn('slow');
                                $('#message').text('Something with your request when wrong. Try again or a diffrent username.');
                                $('#uName').removeAttr('correct');
                            }else{
                                //if the undername is taken it will put out a error icon and a error message and remove the attrbute correct if it has been given.
                                $('#uchecked').hide();
                                $('#uunchecked').fadeIn('slow');
                                $('#message').text('Username already taken');
                                $('#uName').removeAttr('correct');
                            }
                        }
                });
        }
 
    });

    //checks the given password if it holdes up to password rules.
    $('#psw').blur(function (){
        var inputVal = $(this).val();
        //pswCheck gets Regexp rules that checks if the password has minimum of 1 digit, minimun of 1 capital letter, minimum of 1 special sign
        //and that it is minimum of 8 characters. 
        var pswCheck = /^(?=.*\d)(?=.*[A-Z])(?=.*\W)(.{8,})$/; 
         //if the inputs value i empty it will output a error message and en error icon. It will also remove the attribute correct if it has been given.
        if(inputVal == ''){
            $('#pswchecked').hide();
            $('#pswunchecked').fadeIn('slow');
            $('#pswMsg').text('This field needs to be filled out');
            $(this).removeAttr('correct');
        //Checks if the rules in pswCheck does not match the given value in inputVal. If it does not an error icon will appear
        //and a error message. The attribute correct will be removed if it is set.    
        }else if(!pswCheck.test(inputVal)){
            $('#pswchecked').hide();
            $('#pswunchecked').fadeIn('slow');
            $('#pswMsg').text('The password needs to contain minimum of 1 capital letter, 1 digit, 1 special sign and contain minimum of 8 characters.');
            $(this).removeAttr('correct');
        //if inputVal matches the rules it will put out the correct icon and give it the attribute correct.
        }else{
            $('#pswunchecked').hide();
            $('#pswchecked').fadeIn('slow');
             $('#pswMsg').html('&nbsp;');
            $(this).attr('correct', 'correct');
        }
    });

    //Checks if ti only letters as value of the input.
    $('#fName').blur(function(){
        var inputVal = $(this).val();
        //fNameCheck gets Regexp rules with is that only letter are allowed.
        var fNameCheck = /^[A-Za-z]+$/;
        //if the inputs value i empty it will output a error message and en error icon. It will also remove the attribute correct if it has been given.
        if(inputVal == ''){
            $('#fchecked').hide();
            $('#funchecked').fadeIn('slow');
            $('#fNameMsg').text('This field needs to be filled out.');
            $(this).removeAttr('correct');
        //Runs the rules of fNameCheck to the value of inputVal. if it does not match the rules it will give an error message
        //and puts out an error icon. It will remove the attribute correct if it has been given.
        }else if(!fNameCheck.test(inputVal)){
            $('#fchecked').hide();
            $('#funchecked').fadeIn('slow');
            $('#fNameMsg').text('Only letters are allowed.');
             $(this).removeAttr('correct');
        //if inputVal matches the rules it will put out the correct icon and give it the attribute correct. 
        }else{
            $('#funchecked').hide();
            $('#fchecked').fadeIn('slow');
            $('#fNameMsg').html('&nbsp;');
            $(this).attr('correct', 'correct');
        }
    });

    //Last Name check.
    $('#lName').blur(function(){
        var inputVal = $(this).val();
        //lNameCheck gets Regexp rules with is that only letter are allowed.
        var lNameCheck = /^[A-Za-z]+$/;
        //if the inputs value i empty it will output a error message and en error icon. It will also remove the attribute correct if it has been given.
        if(inputVal == ''){
            $('#lchecked').hide();
            $('#lunchecked').fadeIn('slow');
            $('#lNameMsg').text('This field needs to be filled out.');
            $(this).removeAttr('correct');
        //if inputVal matches the rules it will put out the correct icon and give it the attribute correct. 
        }else if(!lNameCheck.test(inputVal)){
            $('#lchecked').hide();
            $('#lunchecked').fadeIn('slow');
            $('#lNameMsg').text('Only letters are allowed.');
            $(this).removeAttr('correct');
         //if inputVal matches the rules it will put out the correct icon and give it the attribute correct. 
        }else{
            $('#lunchecked').hide();
            $('#lchecked').fadeIn('slow');
            $('#lNameMsg').html('&nbsp;');
            $(this).attr('correct', 'correct');
        }
    });

    //Checks if the it is only number as value in the input.
    $('#phoneNumber').blur(function(){ 
        var inputVal = $(this).val();
        //numberCheck gets Regexp rules with is that only numbers are allowed.
        var numberCheck = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
        //if the inputs value i empty it will output a error message and en error icon. It will also remove the attribute correct if it has been given.
        if(inputVal == ''){
            $('#pchecked').hide();
            $('#punchecked').fadeIn('slow');
            $('#phoneMsg').text('This field needs to filled out');
            $(this).removeAttr('correct');
        //Runs the rules of numberCheck to the value of inputVal. if it does not match the rules it will give an error message
        //and puts out an error icon. It will remove the attribute correct if it has been given.
        }else if(!numberCheck.test(inputVal)){
            $('#pchecked').hide();
            $('#punchecked').fadeIn('slow');
            $('#phoneMsg').text('please enter a valid phone number.');
            $(this).removeAttr('correct');
        //if inputVal matches the rules it will put out the correct icon and give it the attribute correct.
        }else{
            $('#punchecked').hide();
            $('#pchecked').fadeIn('slow');
             $('#phoneMsg').html('&nbsp;');
            $(this).attr('correct', 'correct');
        }
    });

    //Checks if it is a valid email adress that has been given.
    $('#email').blur(function(){
        var inputVal = $(this).val();
        //emailCheck gets Regexp rules of what is a valid email.
        var emailCheck = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //if the inputs value i empty it will output a error message and en error icon. It will also remove the attribute correct if it has been given.
        if(inputVal == ''){
            $('#echecked').hide();
            $('#eunchecked').fadeIn('slow');
            $('#emailMsg').text('This field needs to be filled out');
            $(this).removeAttr('correct');
        //Checks if the rules in emailCheck does not match the given value in inputVal. If it does not an error icon will appear
        //and a error message. The attribute correct will be removed if it is set.
        }else if(!emailCheck.test(inputVal)){
            $('#echecked').hide();
            $('#eunchecked').fadeIn('slow');
            $('#emailMsg').text('You need to fill out a valid Email adress');
            $(this).removeAttr('correct');
        //if inputVal matches the rules it will put out the correct icon and give it the attribute correct. 
        }else{
            $('#eunchecked').hide();
            $('#echecked').fadeIn('slow');
             $('#emailMsg').html('&nbsp;');
            $(this).attr('correct', 'correct');
        }
    }); 
    
    //This function will run when the form is submited.
    $("form#registrationform").submit(function() {
        //it will count allt the inputs that doest have the type submit. it will check if any of the does nor have the attribute correct.
        //if any doesnt have that attribute it will alret a message and return false so it dosent submit.
        if($(this).find("input[type!='submit'][correct!='correct']").length != 0) {
            alert('something isent filled out!');
            return false;
        }
    });

  
});