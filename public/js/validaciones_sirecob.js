var titulo = document.getElementById("titulo");
var categoria = document.getElementById("categoria");
var editorial = document.getElementById("editorial");
var cantidad = document.getElementById("cantidad");
var autor = document.getElementById("autor");
var year = document.getElementById("year");
var seccion = document.getElementById("seccion");
var pais = document.getElementById("pais");
var edicion = document.getElementById("edicion");
//estilo de errores
var error = document.getElementById("error");
var vcor = /\w+@\w+\.+[a-z]/;
error.style.color = "white";
error.style.background = "rgba(211, 10, 10, 0.801)";
error.style.font = "bold";
error.style.fontFamily = "monospace";
error.style.width = "700px";
error.style.marginLeft = "170px";
function val_camp() {
    var mensaje = [];
    var envio = true;
    if (
        titulo.value == "" &&
        categoria.value == "" &&
        editorial.value == "" &&
        cantidad.value == "" &&
        autor.value == "" &&
        year.value == 0 &&
        seccion.value == "" &&
        pais.value == "Elegir" &&
        edicion.value == ""
    ) {
        alert("todos los campos vacios");
        mensaje.push("Todos los campos del formulario estan vacios");
        envio = false;
    } else if (
        titulo.value == "" ||
        categoria.value == "" ||
        editorial.value == "" ||
        cantidad.value == "" ||
        autor.value == "" ||
        year.value == 0 ||
        seccion.value == "" ||
        pais.value == "Elegir" ||
        edicion.value == ""
    ) {
        if (titulo.value == "") {
            mensaje.push("campo titulo en blanco");
            envio = false;
        } else if (categoria.value == "") {
            mensaje.push("campo categoria en blanco");
            envio = false;
        } else if (editorial.value == "") {
            mensaje.push("campo editorial en blanco");
            envio = false;
        } else if (cantidad.value == "") {
            mensaje.push("campo cantidad en blanco");
            envio = false;
        } else if (autor.value == "") {
            mensaje.push("campo autor en blanco");
            envio = false;
        } else if (year.value == 0) {
            mensaje.push("Año sin seleccionar");
            envio = false;
        } else if (seccion.value == "") {
            mensaje.push("seccion sin seleccionar");
            envio = false;
        } else if (pais.value == 'Elegir') {
            mensaje.push("no se a seleccionado Pais");
            envio = false;
        } else if (edicion.value == "") {
            mensaje.push("campo seccion vacio");
            envio = false;
        }
    }
    error.innerHTML = mensaje.join(" ");
    return envio;
}
