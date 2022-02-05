

const boton_pregrado = document.getElementById('pregrado');
const boton_postgrado = document.getElementById('postgrado');

const postgrado = document.getElementById('postgrado_section');
const pregrado = document.getElementById('pregrado_section');



boton_pregrado.addEventListener('click',function(){
   pregrado.classList.remove('desact');
   postgrado.classList.add('desact');
});

boton_postgrado.addEventListener('click',function(){
   postgrado.classList.remove('desact');
   pregrado.classList.add('desact');
});



