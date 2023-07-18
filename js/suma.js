class Suma
{
    constructor(numero1, numero2)
    {
        this.numero1 = numero1;
        this.numero2 = numero2;
    }


     devolverSuma() {
        return this.numero1+this.numero2;
    }
}

function sumar() {
    var  numero1 =  parseInt(document.getElementById("txtnumero1").value);
    var  numero2 =  parseInt(document.getElementById("txtnumero2").value);
    var sum=numero1+numero2;
    document.getElementById("resultado").innerHTML=sum;
}

function Sumar1() {
    var  num1 =  parseInt(document.getElementById("txtnumero1").value);
    var  num2 =  parseInt(document.getElementById("txtnumero2").value);
    var objSuma=new Suma(num1,num2);
    document.getElementById("resultado").innerHTML=objSuma.devolverSuma();
}