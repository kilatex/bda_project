/* 


    const csrfToken = document.head.querySelector("[name～=csrf-token][content]");
    document.getElementById('_estado').addEventListener('change', (e)=>{
        fetch('municipios',{
            method: 'POST',
            body: JSON.stringify({direccion : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response => {
            return response.josn()
        }).then(data =>{
            var opciones = "";
            for (let i in data.lista ) {
                opciones+='<option value="'+data.lista[i].id+'">'+data.lista[i].id+'</option>';
            }
            document.getElementById('_municipio').innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

 */