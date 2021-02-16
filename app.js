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
    
    const botom = document.createElement("button");
    botom.setAttribute("Value", "Añadir");
    botom.innerText="Añadir"
    botom.setAttribute("type", "submit");

    const input_cantidad = document.createElement("input");
    input_cantidad.setAttribute("type", "number");
    input_cantidad.setAttribute("placeholder", "Unidades");

    formulario.appendChild(input_cantidad);
    formulario.appendChild(botom);

    lugar.appendChild(formulario);
}
const crea_item = (producto, lugar) =>{
    
    console.log(producto.nombre);

    const item = document.createElement("div");
    item.className = "item";

    const img = document.createElement("img");
    img.setAttribute("src",producto.imagen);

    const nombre = document.createElement("h2");
    nombre.textContent= producto.nombre;

    const descripcion = document.createElement("p");
    descripcion.textContent=producto.descripcion;

    const precio = document.createElement("div");
    precio.className = "precio";
    precio.textContent=producto.precio + "€";

    item.appendChild(img);
    item.appendChild(nombre);
    item.appendChild(descripcion);
    item.appendChild(precio);
    

    crea_form(item,producto.id);

    lugar.appendChild(item);
}

const muestra_productos = (data) =>{


    const fragmento = document.createDocumentFragment();
    console.log(data.length)
    console.log(data[0]);

    for(i=0; i<data.length; i++){
        crea_item(data[i],fragmento);
    }

    principal.appendChild(fragmento);
}

//muestra_productos(30);

recoge_datos();