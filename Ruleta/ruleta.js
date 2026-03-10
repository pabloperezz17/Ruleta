const canvas=document.getElementById("wheel")
const ctx=canvas.getContext("2d")

const numbers=37
const angle=360/numbers

let rotation=0

function draw(){

ctx.clearRect(0,0,500,500)

for(let i=0;i<numbers;i++){

let start=(i*angle+rotation)*Math.PI/180
let end=((i+1)*angle+rotation)*Math.PI/180

ctx.beginPath()
ctx.moveTo(250,250)
ctx.arc(250,250,250,start,end)
ctx.closePath()

let color=i%2?"red":"black"
if(i==0) color="green"

ctx.fillStyle=color
ctx.fill()

ctx.fillStyle="white"
ctx.font="14px Arial"

let mid=(start+end)/2

let x=250+150*Math.cos(mid)
let y=250+150*Math.sin(mid)

ctx.fillText(i,x,y)

}

}

draw()

function spin(){

let tipo=document.getElementById("tipo").value
let numero=document.getElementById("numero").value
let cantidad=document.getElementById("cantidad").value

fetch("spin.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:`tipo=${tipo}&numero=${numero}&cantidad=${cantidad}`
})
.then(r=>r.json())
.then(data=>{

let target=data.numero*(360/37)+720

let start=rotation
let end=rotation+target

let startTime=null

function animate(t){

if(!startTime) startTime=t

let progress=(t-startTime)/3000

if(progress>1) progress=1

rotation=start+(end-start)*progress

draw()

if(progress<1) requestAnimationFrame(animate)

}

requestAnimationFrame(animate)

document.getElementById("resultado").innerHTML=
"Resultado: "+data.numero+" | Ganancia: "+data.ganancia

document.getElementById("saldo").innerHTML=data.saldo

let h=document.getElementById("historial")

let span=document.createElement("span")

span.innerText=data.numero
span.className=data.color

h.prepend(span)

})

}