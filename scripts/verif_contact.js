
function verifyName(elem){
	let letters = /^[A-Za-z]+$/;
	let res = true;
	if(elem.value <= 1){
		res = false;
	}
	else if(!elem.value.match(letters)){
		res = false;
	}
	return res;
}

function verifyEmail(elem){
	//regex sacado de https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript
	let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return elem.value.match(re);
}


function verifyCaptcha() { // https://stackoverflow.com/questions/52390562/google-recaptcha-response-uncaught-in-promise-null
    return new Promise(function(resolve, reject) { 

    	document.getElementsByTagName('button')[0].disabled = false;

    	document.getElementsByTagName('button')[0].style.backgroundColor = "#272829";

    	resolve();

  }); 
};


function changeBorderName(index){
	doc[index].onchange = function(){
		if(!verifyName(doc[index])){
			doc[index].style.border = "2px solid red";
		} else {
			doc[index].style.border = "2px solid green";
		}

	}
}

function changeBorderEmail(index){
	doc[index].onchange = function(){
		if(!verifyEmail(doc[index])){
			doc[index].style.border = "2px solid red";
		} else {
			doc[index].style.border = "2px solid green";
		}
	
	}
}

function changeBorderTitleCompany(index){
	doc[index].onchange = function(){
		if(doc[index].value.length < 2){
			doc[index].style.border = "2px solid red";

		} else {
			doc[index].style.border = "2px solid green";
		}	

	}
}

let doc = document.getElementsByTagName('input');

changeBorderName(1); //First name
changeBorderName(2); //Last name

changeBorderTitleCompany(3); //Company
changeBorderTitleCompany(4); //Title

changeBorderEmail(5); //Email

