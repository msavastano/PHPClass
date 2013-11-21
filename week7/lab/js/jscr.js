//get username value
function getInput(){    
    return document.getElementById('username').value;    
}

//call ajax function from class
function makeAjaxCall() {    
    ajax.send('contents.php', 'username='+getInput() , cb);
}
//display ajax call
function cb(result){    
    var results = JSON.parse(result);   //parse string into json 
    document.getElementById("content").innerHTML = results.msg;
}




