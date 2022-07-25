let fixedButton = document.querySelector('.fixedbutton');
let body = document.querySelector('body');
let countHeight = (body.scrollHeight - window.innerHeight) * 0.5;

    window.onscroll = function(){
        if(window.pageYOffset >= countHeight){
            fixedButton.classList.add('showButton');
        } else{
            fixedButton.classList.remove('showButton');
        }
    }

    fixedButton.addEventListener('click', func);
    function func(){
       
        
       
        window.scrollTo(0,0);
    }
    
   
    