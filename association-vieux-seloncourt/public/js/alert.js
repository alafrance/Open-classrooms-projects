alert = document.getElementsByClassName('alert');
window.addEventListener("load", function(){
    setTimeout(function(){
        for(var i = 0; i < alert.length;i++ ){
                alert[i].className += ' hidden';
        }
    }, 3000);


})    
    
