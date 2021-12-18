function validate(username,pass,pass2) {

    if (username.length <= 5 || username.length >= 11 ) {
        alert("Invalid username or password")
        alert("The username must be between 6 and 10 characters long.");
        
        }
    else if (letter_num(username) == false){
        alert("Invalid username or password")
        alert("The username must contain only letters and digits.");
        }
    else if (isNaN(username[0]) == false){
        console.log("error here")
        alert("Invalid username or password")
        alert("The username cannot begin with a digit.");        
        }
    else if (pass !== pass2){
        alert("Invalid username or password")
        alert("The password and the repeat password must match.");        
        }
    else if (pass.length <= 5 || pass.length >= 11 ) {
        alert("Invalid username or password")
        alert("The password must be between 6 and 10 characters long.");
        }
    else if (letter_num(pass) == false){
        alert("Invalid username or password")
        alert("The password must contain only letters and digits.");
        }
    else if (requirements(pass) == false){
        alert("Invalid username or password")
        alert("The password must have at least one lower case letter, at least one upper case letter, and at least one digit.");
        }
    else {
        alert("User validated");
    }    
}

function letter_num(str){
    var i
    for (i = 0; i < str.length; i++) {

        //if not 0-9
        //nan = true == letter
        
        // if number 
        if (str.charCodeAt(i) >= 48 && str.charCodeAt(i) <= 57) {
            continue
        }
        //if A-Z
        else if (str.charCodeAt(i) >= 65 && str.charCodeAt(i) <= 90){
            continue
        }
        //if a-z
        else if (str.charCodeAt(i) >= 97 && str.charCodeAt(i) <= 122){
            continue
        }
        else{
            return false
        }

    }
    return true
}

function requirements(pass){
    var i
    var lower = false
    var upper = false
    var digit = false


    //scan for
    // one lower case letter
    // at least one upper case letter, 
    //and at least one digit.
    for (i = 0; i < pass.length; i++) {
        if (lower == true && upper == true && digit == true){
            return true
        }
        //at least one digit
        //nan = true == letter
        else if (isNaN(pass[i]) == false){
            digit = true
        } 
        //at least one upper case letter, if A-Z
        else if (pass.charCodeAt(i) >= 65 && pass.charCodeAt(i) <= 90){
            upper = true
        }
        //one lower case letter, if a-z
        else if (pass.charCodeAt(i) >= 97 && pass.charCodeAt(i) <= 122){
            lower = true
        }
        
        
    }

    if (lower == true && upper == true && digit == true){
        return true
    }

    console.log(lower,upper,digit)
    return false
}
    

