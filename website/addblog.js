//Clear form button 
let btnClear = document.getElementById('clear');
let inputs = document.querySelectorAll('input');
let texts = document.querySelectorAll('textarea');

btnClear.addEventListener('click', () => {
    let text = "Confirm clear option!\nEither OK or Cancel.";
	if (confirm(text) == true) {
		inputs.forEach(input => input.value = "");
		texts.forEach(text => text.value = "");
	} else {
	  text = "You canceled!";
	}
});

//Preview blog button

function formpreview(form) {
	form.action='preview.php';
	let titleValid = hasValue(form.elements['title'], 'blogTitle', ERRORmessage);
	let contentValid = hasValue(form.elements['content'], 'blogContent', ERRORmessage);
    if (titleValid && contentValid) {
		form.submit();
    }
}

//Query format

// show a message with a type of the input
function showMessage(input, message, type) {
	// get the small element and set the message
	const msg = input.parentNode.querySelector("small");
	msg.innerText = message;
	// update the class for the input
	input.className = type ? "success" : "error";
	return type;
}

function showError(Id, input, message) {
    document.getElementById(Id).style.backgroundColor = "#9DBEBB";
    document.getElementById(Id).style.marginBottom = "0.5em";
    // document.getElementById(Id).className = "errorHappen";
    return showMessage(input, message, false);
}

function showSuccess(Id, input) {
    document.getElementById(Id).style.backgroundColor = "";
	return showMessage(input, "", true);
}

function hasValue(input, Id, message) {
	if (input.value.trim() === "") {
		return showError(Id, input, message);
	}
	return showSuccess(Id, input);
}

function isChecked(input, Id, message){
    if (form.elements['accept'].checked === false) {
        return showError(Id, input, message);
    }
    return showSuccess(Id, input);
}

const form = document.querySelector("#form");

let ERRORmessage = "Please fill the higlighted fields";

form.addEventListener("submit", function (event) {
	// // stop form submission
	// event.preventDefault();

	// validate the form
	form.action='newblog.php';
	let titleValid = hasValue(form.elements['title'], 'blogTitle', ERRORmessage);
	let contentValid = hasValue(form.elements['content'], 'blogContent', ERRORmessage);
    if (titleValid && contentValid) {
        document.getElementById('form').submit();
    }
	else{
		event.preventDefault();
	}
});