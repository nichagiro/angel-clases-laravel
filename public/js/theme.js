var tema = document.getElementById('theme');
const cuerpo = document.body;

let bg = localStorage.getItem('tema-color');

if(bg != ''){
    if (bg == 'oscuro') {
        cuerpo.style.background = 'black';
        cuerpo.style.color = 'white';
        tema.innerText = 'claro';
        tema.style.background = 'white';
        tema.style.color = '#000000';
        tema.dataset.theme = 'oscuro';
    }
    else{
        cuerpo.style.background = 'white';
        cuerpo.style.color = 'black';
        tema.innerText = 'oscuro';
        tema.style.background = 'black';
        tema.style.color = 'white';
        tema.dataset.theme = 'claro';
    }

}


tema.addEventListener('click', (e)=>{
    
    var color = tema.dataset.theme;   

    if(color == 'claro'){
        cuerpo.style.background = 'black';
        cuerpo.style.color = 'white';
        tema.innerText = 'claro';
        tema.style.background = 'white';
        tema.style.color = '#000000';
        tema.dataset.theme = 'oscuro';

        localStorage.setItem('tema-color','oscuro')
    }
    else{
        cuerpo.style.background = 'white';
        cuerpo.style.color = 'black';
        tema.innerText = 'oscuro';
        tema.style.background = 'black';
        tema.style.color = 'white';
        tema.dataset.theme = 'claro';

        localStorage.setItem('tema-color','claro')

    }

})