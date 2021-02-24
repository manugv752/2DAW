const principal = document.getElementById("inicio");



const recoge_datos= () =>{
    fetch (`json.php`, {
        method: 'POST'
      })
      
      .then(response => response.json())
      //.then(data => console.log(data))
      .then(data => muestra_productos(data) );
    
}

const crea_form =(lugar,id_formulario) =>{
    const formulario = document.createElement("form");
    formulario.setAttribute("id", id_formulario);
    formulario.setAttribute("class", "formulario_producto");
    formulario.setAttribute("action", "añadir_carrito.php");
    formulario.setAttribute("method", "post");
    
    const input_botom = document.createElement("button");
    input_botom.innerText="Añadir";
    input_botom.setAttribute("type", "submit");

    const input_cantidad = document.createElement("input");
    input_cantidad.setAttribute("name", "cantidad");
    input_cantidad.setAttribute("type", "number");
    input_cantidad.setAttribute("placeholder", "Unidades");

    const input_id = document.createElement("input");
    input_id.setAttribute("name", "id");
    input_id.setAttribute("type", "hidden");
    input_id.setAttribute("value", id_formulario);



    formulario.appendChild(input_id);
   
    formulario.appendChild(input_cantidad);

    formulario.appendChild(input_botom);

    lugar.appendChild(formulario);
}
const crea_item = (producto, lugar) =>{
    
    console.log(producto.descripcion);

    const item = document.createElement("div");
    item.className = "item";

    const img = document.createElement("img");
    img.setAttribute("src",producto.imagen);

    const nombre = document.createElement("h2");
    nombre.textContent= producto.nombre;

    const descripcion = document.createElement("p");
    descripcion.innerHTML=producto.descripcion;

    const precio = document.createElement("div");
    precio.className = "precio";
    if(producto.stock<=0)
    {
        precio.textContent="Sin Stock";
    }else
    {
        precio.textContent=producto.precio + "€";
    }

    item.appendChild(img);
    item.appendChild(nombre);
    item.appendChild(descripcion);
    item.appendChild(precio);
    

    crea_form(item,producto.id_producto);

    lugar.appendChild(item);
}

const muestra_productos = (data) =>{


    const fragmento = document.createDocumentFragment();
    //console.log(data.length)
    //console.log(data[0]);

    for(i=0; i<data.length; i++){
        crea_item(data[i],fragmento);
    }

    principal.appendChild(fragmento);
}

//muestra_productos(30);

recoge_datos();



