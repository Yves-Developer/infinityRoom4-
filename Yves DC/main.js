var btn0 = document.querySelector('.Send-btn');
var inputField = document.querySelector('.msg');
var chatBox = document.querySelector('.messages');
var People = document.querySelector('.Main .Panel .People');

//preventing form from submiting
var fom = document.querySelector('.fom');
fom.onsubmit = (e) =>{
	e.preventDefault();
}
//Scroll 
chatBox.onmouseenter = () =>{
	chatBox.classList.add('active');
}
chatBox.onmouseleave = () =>{
	chatBox.classList.remove('active');
}
//var errText = document.getElementsByClassName('errText');
btn0.onclick = () =>{
	//lets start AJAX
	var xhr = new XMLHttpRequest();
	xhr.open("POST","./PHP/insertChat.php",true);
	xhr.onload = () =>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				console.log(data)
				inputField.value = "";
			}
		}
	}
	let formData = new FormData(fom);
	xhr.send(formData);
}



//this will run frequently after 500ms
window.setInterval(() =>{
	//lets start AJAX
	var xhr = new XMLHttpRequest();
	xhr.open("POST","./PHP/getChat.php",true);
	xhr.onload = () =>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				chatBox.innerHTML= data;
				if (!chatBox.classList.contains('active')) {
					ScrollToBottom();
				}									
				
			}
		}
	}
	let formData = new FormData(fom);
	xhr.send(formData);
},500);

//this will run frequently after 500ms
window.setInterval(() =>{
	//lets start AJAX
	var xhr = new XMLHttpRequest();
	xhr.open("GET","./PHP/people.php",true);
	xhr.onload = () =>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				People.innerHTML = data;
			}
		}
	}
	let formData = new FormData(fom);
	xhr.send(formData);
},500);

// scroll to the bottom 
function ScrollToBottom() {
	chatBox.scrollTop = chatBox.scrollHeight;
}
