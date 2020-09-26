
if(!location.hash){
    location.hash = Math.floor(Math.random() * 0xFFFFFF).toString(16)

}

const roomHash = location.hash.substring(1)

const drone = new ScaleDrone('TzYGeQtKdHe82oOz');

const roomName = 'observable-'+roomHash

/*Servidor de conecçãoj*/
const configuration = {
    iceServers:[
        {
            urls: 'stun:stun.l.google.com:19302'
        }
    ]
}

let room
let pc

let number = 0

function OnSuccess(){}

function onError(){
    console.log(error)

}

/*Tratamento de erro*/
drone.on('opne',error => {
    if(error)
        return console.log(error)
    room = drone.subscribe(roomName)

    room.on('open', error =>{

    })

})