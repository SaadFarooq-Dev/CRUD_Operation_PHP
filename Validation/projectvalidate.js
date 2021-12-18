function validateForm(){
    let name = document.forms["ProjectForm"]["name"].value;
    let description = document.forms["ProjectForm"]["description"].value;
    let budget = document.forms["ProjectForm"]["budget"].value;

    let valid=true;

    let nameerror = document.querySelector("#nameError");
    let descriptionerror = document.querySelector("#descriptionError");
    let budgetrror = document.querySelector("#budgetError");


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

    if(description==""){

        showError(descriptionerror,"Description is required")
        valid=false;
    } 
    else{
        hideError(descriptionerror) 
    }

    if(budget==""){

        showError(budgetrror,"Budget is required")
        valid=false;
    } 
    else{
        hideError(budgetrror)
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