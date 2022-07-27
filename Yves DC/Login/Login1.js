
///Ajax Start
/// sending signUp detail from ajax to php
// declaration for Signup btn
var btn0 = document.querySelector('.btn');
//var errText = document.getElementsByClassName('errText');
btn0.onclick = () =>{
	//lets start AJAX
	var xhr = new XMLHttpRequest();
	xhr.open("POST","../PHP/ydc_Log.php",true);
	xhr.onload = () =>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				//console.log(data);
				if (data == "success! [*]") {
					location.href="../index.php";
				} else {
				//errText.innerHTML = data;
				alert(data);
				//errText.style.display ="block";	
				}
				
			}
		}
	}
	let formData = new FormData(fom);
	xhr.send(formData);
}
//preventing form from submiting

var fom = document.querySelector('.fom');
fom.onsubmit = (e) =>{
	e.preventDefault();
}
