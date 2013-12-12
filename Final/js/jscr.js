var subButton  = document.getElementById("sub");

function getInput(){    
    console.log(document.getElementById('web').value);
    return document.getElementById('web').value;    
    
}


function makeAjaxCall(){
    console.log(getInput());
   ajax.send('contents.php', 'website='+getInput() , cb);
}
//display ajax call
function cb(result){    
    var results = JSON.parse(result);   //parse string into json 
    document.getElementById("content").innerHTML = results.msg;
}


subButton.addEventListener('click', makeAjaxCall);

    