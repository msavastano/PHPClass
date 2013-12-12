var webby  = document.getElementById("web");

function getInput(){    
    
    return document.getElementById('web').value;    
    
}


function makeAjaxCall(){
    console.log(getInput());
   ajax.send('contents.php', 'website='+getInput() , cb);
}
//display ajax call
function cb(result){    
    var results = JSON.parse(result);   //parse string into json 
    document.getElementById("content").innerHTML = results.msg + " " + results.name + " " + results.passed ;
    if(results.passed == false){
        document.getElementById("sub").disabled = true;
    }else{
        document.getElementById("sub").disabled = false;
    }
}




    