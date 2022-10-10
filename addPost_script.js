//Event processing for clicking the “Clear” button
function toClear(event){
    var choice = confirm("Are you sure you want to clear?");

    if(choice == false){
        event.preventDefault();
    }
    
}       


//Checking Fields are not empty before submission
function checkFields(event, id){
    const form = document.getElementById('post_form');
    
    var title = document.getElementById("title").value;
    var post = document.getElementById("subject").value;

    if(title == ""){
        document.getElementById('title').style.background = "yellow";//highlight blank area yellow
        event.preventDefault();
        window.setTimeout("changeColor('title')", 2000);
    }
    else if(post == ""){
        document.getElementById('subject').style.background = "yellow";
        event.preventDefault();  
        window.setTimeout("changeColor('subject')", 2000);
        
    }
    else{
        if(id == "pre"){
            form.action = "preview.php";
        }
        else if(id == "sub"){
            form.action = "addEntry.php";
        }
    }

}

//changing back to normal colour after 2 seconds
function changeColor(id_name){
    document.getElementById(id_name).style.background = "white";
}

