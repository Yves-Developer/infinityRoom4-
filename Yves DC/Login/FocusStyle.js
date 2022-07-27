// stylying Login
// invocation of all itags needed
var input0 = document.getElementById('input0');
var input1 = document.getElementById('input1');
var id0 = document.getElementById('id0');
var id0 = document.getElementById('id0');

// add event listeners to all inputs
	input0.addEventListener('focus',focusFuc0);
	input0.addEventListener('blur',blurFuc0);
	input1.addEventListener('focus',focusFuc1);
	input1.addEventListener('blur',blurFuc1);	
// function declation for input
function blurFuc0() {
	if (input0.value == "") {
	id0.classList.remove('focus');		
	}	
}
function blurFuc1() {
	if (input1.value == "") {
	id1.classList.remove('focus');		
	}
}

function focusFuc0() {
	id0.classList.add('focus');

}
function focusFuc1() {
	id1.classList.add('focus');	
}