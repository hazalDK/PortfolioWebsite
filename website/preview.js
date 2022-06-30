// Edit Button

function formEdit(form) {
    form.action='addblog.php';
	form.submit();
}

// Query format

function showSuccess(Id, input) {
    document.getElementById(Id).style.backgroundColor = "";
	return showMessage(input, "", true);
}

function hasValue(input, Id) {
	if (input.value.trim() === "") {
		alert("Error!");
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

form.addEventListener("submit", function (event) {
	// // stop form submission
	// event.preventDefault();

	// validate the form
	form.action='newblog.php';
	let titleValid = hasValue(form.elements['title'], 'Title');
	let contentValid = hasValue(form.elements['content'], 'Content');
    if (titleValid && contentValid) {
        document.getElementById('form').submit();
    }
	else{
		event.preventDefault();
	}
});
