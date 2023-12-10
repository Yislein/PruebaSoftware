
const menuPalanca =document.querySelector('.menupalanca');
const navegacion=document.querySelector('.navegacion');

menuPalanca.onclick=function()
{
    navegacion.classList.toggle('open');
}

const lista=document.querySelectorAll('.list');

function activarlink()
{
    lista.forEach((item)=>
    item.classList.remove('active'))
    this.classList.add('active')
}
lista.forEach((item)=>
item.addEventListener('click',activarlink)
)



