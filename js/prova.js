var arNumeri=[19, 15, 3, 32, 8, 5];
var num=[];
var max=20;
var min=0;
for(var i=0; i<6; i++)
{
  num[i]=Math.floor(Math.random() * (max - min + 1)) + min;
}
var altro=["viao", 2,["2019", "patata"]];

var ar3=Array(2, 3, 4);

ar3[8]="jaaj";


console.log(arNumeri);
console.log(num);
console.log(altro);
console.log(ar3);
console.log(ar3.length);
ar3.length=4;//tronca l'array
console.log(ar3);

var arPrimo=[1, 2, 3, 4];
var arSecondo=arPrimo;
arSecondo[2]="pippo";
console.log(arSecondo);

//stringfy -> converte oggetti in stringhe
var ar=[1, 2, 3, 4];
console.log(ar);
console.log(JSON.stringify(ar));
console.log(JSON.parse(JSON.stringify(ar)));
console.log(" ");
ar=[1, 2, 3, 4];
ar.splice(2, 1, "banana", "iffiuif")//slice(indice di partenza, tot elementi da togliere [elementi da aggiungere])
console.log(ar);
ar=[1, 2, 3, 4];
ar.splice(2, 0, "banana", "iffiuif");
console.log(ar);
console.log(ar.indexOf("iffiuif"));//indice dell'elemento dell'array cercato
var ar_in_stringa=ar.join();
console.log(ar_in_stringa);

var arDaOrdinare=[9, 3, 0, 1];
arDaOrdinare.sort();//sort -> ordina in modo crescente
console.log(arDaOrdinare);
console.log(arDaOrdinare.reverse());//reverse -> ordina in modo decrescente

var x=[1,2,3];
var y=[4,5,6];
var z= x.concat(y).concat(x);
console.log(z);
console.log(" ");
z.shift();
console.log(z);//aggiunge un elemento nella prima posizione
z.unshift("uno");
console.log(z);


/*
ESERCIZIO:
-Creare 2 array con un tot di elementi
-Concatenarli
-Aggiungere un nuovo elemento ("new") davanti a indice 3
-Eliminare primo e ultimo elemento
-Aggiungere un elemento ("indice 0") in testa all'array
-Stampare l'array concatenato
-Stampare la lunghezza dell'array concatenato
-Stampare elemento di indice 2
*/
var array1=[100, 200, 250, 150, 40, 90];
var array2=["prova", "ciao", 2019];
var conc=array1.concat(array2);
conc.splice(3, 0, "nuovo elemento");
conc.splice(0, 1);
conc.splice(conc.length-1, 1)
conc.unshift("indice 0");
console.log("Array: "+conc);
console.log("Lunghezza: "+conc.length);
console.log("Elemento in posizione 2: "+conc[2]);
console.log("");
console.log("************** operatori **************");

var a1=5;
var a2=11;
var somma=a1+a2;
console.log(somma);
var sottr=a1-a2;
console.log(sottr);
var molti=a1*a2;
console.log(molti);
var divis=a1/a2;
console.log(divis);
var modul=a1%a2;
console.log(modul);
console.log("************** operazioni alternative **************");
var inf=a1/0;
console.log(inf);
var str="abc"*a1;
console.log(str);
var z=200;
console.log(z+=a1);

a1++; console.log(a1);

var a3=++a1;
console.log(a3);

var b1="2", b2=2, b3=6;
console.log("Uguale: "+b1==b2);
console.log("Identico: "+b1===b2);
console.log("Minore: "+b2<b3);
console.log("Maggiore: "+b2>b3);
console.log("Diverso: "+b1!==b2);
console.log("************** operatori logici **************");
console.log(b1==b2 && b1==b3);//false
console.log(b1==b2 || b1==b3);//true
var bool=false;
console.log(b1==b2 && !bool);//true
console.log("************** operatori assegnamento **************");
var b4=(b5=b1+b3);
console.log("b4:", b4, " • b5:", b5);
var b4=(b5=b2+b3);
console.log("b4:", b4, " • b5:", b5);
b4==11?console.log("E' 11"):console.log("Non è 11");

/*ESERCIZIO: 2 array di 10 numeri e fa l'operazione in base a quella richiesta*/
var ar1=[1,2,3,4,5,6,7,8,9,10];
var ar2=[10,9,8,7,6,5,4,3,2,1];
var op="*";

for(i=0;i<10;i++)
{
  switch(op)
  {
    case "+":
    console.log(ar1[i]+ar2[i]);
    break;
    case "-":
    console.log(ar1[i]-ar2[i]);
    break;
    case "*":
    console.log(ar1[i]*ar2[i]);
    break;
    case "/":
    console.log(ar1[i]/ar2[i]);
    break;
    default:
    console.log("nope");
    break;
  }
}

for(i in ar1)//esegue tanti cicli quanti sono gli elementi del array























console.log();
