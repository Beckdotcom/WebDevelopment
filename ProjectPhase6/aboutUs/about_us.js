function verify() {
    var first = window.document.getElementById('first');
    var last = window.document.getElementById('last');
    var email = window.document.getElementById('email');
    var subject = window.document.getElementById('subject');
    var msg = window.document.getElementById('msg');
    var line = window.document.getElementById('line');

    
    if (first.value == "" || last.value == "" || email.value == "" || subject.value == "" || msg.value == ""){
        window.alert("Please fill out all fields.");
	    if (last.value == "") {
		    last.style.border = "3px solid red";
	    }
	    if (first.value == "") {
		    first.style.border = "3px solid red";
	    }
	    if (email.value == "") {
		    email.style.border = "3px solid red";
	    }
	    if (subject.value == "") {
		    subject.style.border = "3px solid red";
	    }
	    if (msg.value == "") {
		    msg.style.border = "3px solid red";
	    }
    } else {
	    window.document.getElementById("SendEmail").submit();
    }
}
