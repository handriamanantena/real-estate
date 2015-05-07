
	function validateCreateAccountForm(){ 
			var confimation = document.getElementById("confirmpassword").value;
			var password = document.getElementById("password").value;		
			var select1 = document.getElementById("tenant").checked ;
			var select2 = document.getElementById("owner").checked;
			if(new String(confimation).valueOf() == new String(password).valueOf()){
				document.getElementById("warningLabelpass").innerHTML  = "";
			}
			else {
				document.getElementById("warningLabelpass").innerHTML  = "Password does not match";
				return false; //does not submit form
			}
			if(!select1 && !select2){
				document.getElementById("warningLabelcheck").innerHTML = "Please check one of the boxes";
				return false; //does not submit form
			}
			else{
				document.getElementById("warningLabelpass").innerHTML  = "";
				document.getElementById("warningLabelcheck").innerHTML = "";
				return true; //submits form
		}
	}

	function validateSignIn(){ //checks if selected user type in sign in
			var select1 = document.getElementById("tenant").checked ;
			var select2 = document.getElementById("owner").checked;
			if(!select1 && !select2){
				document.getElementById("warningLabelcheck").innerHTML = "Please check one of the boxes";
				return false; //does not submit form
			}
			else{
				document.getElementById("warningLabelcheck").innerHTML = "";
				return true; //submits form
		}

	}
	
	
	
	function noneCheckedSelected(){
		document.getElementById("dog").checked = false;
		document.getElementById("cat").checked = false;
		document.getElementById("insects").checked = false;
		document.getElementById("birds").checked = false;
		document.getElementById("fish").checked = false;
		document.getElementById("all").checked =false;
		document.getElementById("none").checked = true;	
	}

	
	function anyOtherCheckSelected(event){
		var dog = document.getElementById("dog").checked;
		var cat= document.getElementById("cat").checked;
		var insects =document.getElementById("insects").checked;
		var birds = document.getElementById("birds").checked;
		var fish = document.getElementById("fish").checked;
		if(event.srcElement){
			var element = event.srcElement;
		}
		else
			var element = event.target;
		if(element.checked){
			document.getElementById("none").checked = false;
			if(dog && cat && insects && birds && fish){ //check if all
				document.getElementById("all").checked =true;
			}
		}
		else	{//means not checked therefore no longer all of the above
			document.getElementById("all").checked =false;
			if(!dog && !cat && !insects && !birds && !fish) //check if none
				document.getElementById("none").checked = true;	
		} 		
	}
	
	function allAboveCheckedSelected(){
		document.getElementById("dog").checked = true;
		document.getElementById("cat").checked = true;
		document.getElementById("insects").checked = true;
		document.getElementById("birds").checked = true;
		document.getElementById("fish").checked = true;
		document.getElementById("all").checked =true;
		document.getElementById("none").checked = false;	
	}
	
	
	
	
	
		
	
