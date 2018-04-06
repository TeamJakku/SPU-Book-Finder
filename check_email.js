
function checkEmail() {
    //var str = "Hello world, welcome to the universe.";
	var x = document.forms["signupForm"]["email"].value;
	//alert("hello");
    var n = x.endsWith("@spu.edu");
	
	
	if(!n){
			alert("Please enter your SPU email");
		}
}
