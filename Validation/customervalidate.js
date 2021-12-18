function validateForm(){
    let name = document.forms["CustomerForm"]["name"].value;
    let email = document.forms["CustomerForm"]["email"].value;
    let phone = document.forms["CustomerForm"]["phone"].value;

    let valid=true;

    let nameerror = document.querySelector("#nameError");
    let emailerror = document.querySelector("#emailError");
    let phoneerror = document.querySelector("#phoneError");


    if(name==""){

        showError(nameerror,"Name is required")
        valid=false;
    } else if(name.length<4){

        showError(nameerror,"Minimum size is 3 characters")
        valid=false;
    }

    else{
        hideError(nameerror)

    }

    if(email==""){

        showError(emailerror,"Email is required")
        valid=false;
    } 
    else{
        hideError(emailerror) 
    }

    if(phone==""){

        showError(phoneerror,"Phone No is required")
        valid=false;
    } 
    else{
        hideError(phoneerror)
    }
    
    
    
    return valid;




    function showError(elem,msg){
        elem.innerHTML=msg;
        elem.classList.add("error");
        elem.style.display="block"
    }
    function hideError(elem){
        elem.classList.remove("error");
        elem.style.display="none"
    }


}