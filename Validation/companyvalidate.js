function validateForm(){
    let name = document.forms["CompanyForm"]["name"].value;
    let email = document.forms["CompanyForm"]["email"].value;
    let phone = document.forms["CompanyForm"]["phone"].value;
    let address = document.forms["CompanyForm"]["address"].value;
    let website = document.forms["CompanyForm"]["website"].value;

    let valid=true;

    let nameerror = document.querySelector("#nameError");
    let emailerror = document.querySelector("#emailError");
    let phoneerror = document.querySelector("#phoneError");
    let addresserror = document.querySelector("#addressError");
    let websiteerror = document.querySelector("#websiteError");



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

    if(address==""){

        showError(addresserror,"Street Address is required")
        valid=false;
    } else if(saddress.length<4){

        showError(addresserror,"Minimum size is 3 characters")
        valid=false;
    }

    else{
        hideError(addresserror)

    }

    

    if(website==""){

        showError(websiteerror,"Website is required")
        valid=false;
    }
    else{
        let regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if (regexp.test(website))
        {
            hideError(websiteerror)
        }
        else
        {      
            showError(websiteerror,"Input a valid Website.")
        valid=false;
        }
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