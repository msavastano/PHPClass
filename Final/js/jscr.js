var webby  = document.getElementById("web");

//get input from website field
function getInput(){   
    return document.getElementById('web').value;  
}

//call contents page which reads database
function makeAjaxCall(){
    console.log(getInput());
    ajax.send('contents.php', 'website='+getInput() , cb);
}
//display ajax call
function cb(result){    
    var results = JSON.parse(result);   //parse string into json 
    document.getElementById("content").innerHTML = '<span style="color:white">' + results.msg + '</span>';
    //hide button if false
    if(results.passed == false){
        document.getElementById("sub").style.display = 'none';
    }else{
        document.getElementById("sub").style.display = 'inline';
    }
}




    