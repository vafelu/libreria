/* Carro de compras */
var json = {items: []};

var Carro = function(c, l){
    this.cantidad = c;
    this.libro = l;
    
    this.mostrar = mostrar;
}

function mostrar(){
    json.items.push('{"libro":' + this.libro + ', "cantidad":' + this.cantidad + '}');
    console.log(json);
    console.log(json.items.length);
}

$(function(){
    $("#btn-carro").on("click", function(){
        var c = new Carro($("#cantidad").val(), $("#idLibro").val());
        c.mostrar();
    });
});

// http://stackoverflow.com/questions/4538269/adding-removing-items-from-json-data-with-jquery