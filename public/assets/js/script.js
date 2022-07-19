let liste2 = document.getElementById('liste2')
let Menu = document.getElementById('po');
liste2.addEventListener('mouseover',()=>{
    Menu.classList.add('bg');
})
liste2.addEventListener('mouseout',()=>{
    Menu.classList.remove('bg');
})