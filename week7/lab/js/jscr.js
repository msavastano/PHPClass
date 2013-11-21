
function getInput(){    
    return document.getElementById('username').value;    
}
function makeAjaxCall() {    
    ajax.send('contents.php', 'username='+getInput() , cb);
}





function cb(result){
    console.log('username='+getInput());
    console.log(result);
    var results = JSON.parse(result);
    
    document.getElementById("content").innerHTML = results.msg;
}




