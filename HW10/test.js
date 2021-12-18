function checkTest(){
    //are all fields answered
    if (emptyTest()){
        alert("Please fill out every question.")
    }
    else{
        checkAnswers()
    }
    
}
function checkAnswers(){

    var count = 0
    console.log(getSelectedCheckboxValues("q3"),getSelectedCheckboxValues("q4"))

    

    //q1 radio correct
    if(document.getElementById("q1b").checked){
        count += 1
    }
    //q2
    if(document.getElementById("q2a").checked){
        count += 1
    }
    //q3,is the multiple choice correct
    if(getSelectedCheckboxValues("q3") == "b"){
        count += 1
    }
    if(getSelectedCheckboxValues("q4") == "c"){
        count += 1
    }
    if(document.getElementById("q5").value.toUpperCase() == "HTTP"){
        count += 1
    }
    if(document.getElementById("q6").value.toLowerCase() == "favicon"){
        count += 1
    }
    
    alert("Your grade is " + count + " / 6.")
    //are the text fields correct
}
function emptyTest(){
    if(document.getElementById("q1a").checked == false && document.getElementById('q1b').checked == false){
        return true
    }
    else if(document.getElementById("q2a").checked == false && document.getElementById('q2b').checked == false){
        return true
    }
    else if(getSelectedCheckboxValues("q3") == ""){
        return true
    }
    else if(getSelectedCheckboxValues("q4") == ""){
        return true
    }
    else if(document.getElementById("q5").value == ""){
        return true
    }
    else if(document.getElementById("q6").value == ""){
        return true
    }
    else{
        return false
    }
}   

function getSelectedCheckboxValues(name) {
    var checkboxes = document.querySelectorAll(`input[name="${name}"]:checked`)
    let values = []
    checkboxes.forEach((checkbox) => {
        values.push(checkbox.value);
    });

    var value = values.toString()
    return value;
}


