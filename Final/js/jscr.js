var signUpDiv = document.getElementById("divSignUp1"),
    loginDiv =  document.getElementById("divLogin1");


var getLogin = '<?php echo $getlog; ?>',
    getSignUp = '<?php echo $getSign; ?>';
    
    if(getLogin == ""){
        loginDiv.style.display = "inline";
    }else{
        loginDiv.style.display = "none";
    }

    if(getSignUp == ""){
        signUpDiv.style.display = "inline";
    }else{
        signUpDiv.style.display = "none";
    }

console.log(getLogin);
console.log(getSignUp);

    