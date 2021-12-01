(function(win, doc){
    'use strict';

    function confirmDel(event){
        event.preventDefault();
        if(confirm("Deseja mesmo apagar?")){
            console.log("apagou");
        }else{
            return false;
        }
    }

    if(doc.querySelector('.js-del')){
        let btn = doc.querySelectorAll('.js-del');
        for(let i = 0; i<btn.length; i++){
            btn[i].addEventListener('click', confirmDel,false);
        }
    }


})(window, document);