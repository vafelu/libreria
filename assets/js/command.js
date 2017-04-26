/* Carro de compras */
if(!localStorage.getItem('json')) {
    var json = localStorage;
}
var datos = {items: []};

var Carro = function(c, l){
    this.cantidad = c;
    this.libro = l;
    
    this.mostrar = mostrar;
}

function mostrar(){
    datos.items.length = 0;
    datos.items.push('{"libro":' + this.libro + ', "cantidad":' + this.cantidad + '}');
    
    if(localStorage.getItem('json')) {
        var dt = JSON.parse("[" + localStorage.getItem('json') +"]");
        
        for(var i = 0; i < dt.length; i++){
            datos.items.push('{"libro":' + dt[i].libro + ', "cantidad":' + dt[i].cantidad + '}');
        }
    }
    
    localStorage.setItem("json", datos.items);
    
   
    console.log("items: " + datos.items.length);
    console.log(datos.items);
    //console.log(dt.length);
}

$(function(){
    $("#btn-carro").on("click", function(){
        var c = new Carro($("#cantidad").val(), $("#idLibro").val());
        c.mostrar();
    });
});

// http://stackoverflow.com/questions/4538269/adding-removing-items-from-json-data-with-jquery