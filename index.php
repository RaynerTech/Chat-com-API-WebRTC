<!DOCTYPE html>
<html lang="pt">
<head>
<title>Vídeo Chat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.scaledrone.com/scaledrone.min.js' type='text/javascript'></script>

    <style>
        
       

        .sepa{
            width:100%;
            display:flex;
            height:100vh;
            margin:0;
            padding:0;
            align-items: center;
            justify-content:center;
            
        }



        video{
            width:80%;
            box-sizing:border-box;
            margin:0 50px;
            border-radius:2px;
            padding:0;
            border:1px solid black;      
            
            
            }

            .bem{
                position:fixed;
                text-align: center;
                top:10px;
                left:50px;
                transform: translate(-50%, -50%)
            }

            header{
                text-align: center;
                color:red;
                font-size:30px;
                background:blue;
                margin: 20px 0;
                padding: 10px;
            }

            @media (max-width: 600px)
            {
                video{
                   max-width:calc(50% - 70px);
                }
            } 


    </style>
</head>
<body>
    
        <header>
            Nosso Chat
        </header>
   

  <div class="sepa">
        <video id="local"></video>
        <video id="remove"></video>
        </div>


<script>
    
if(!location.hash){
    location.hash = Math.floor(Math.random() * 0xFFFFFF).toString(16)

}

const roomHash = location.hash.substring(1)

/*Channel ID GERADO NO SITE https://dashboard.scaledrone.com/*/
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
drone.on('open',error => {
    if(error)
        return console.log(error)
    room = drone.subscribe(roomName)

    room.on('open', error =>{

    })

/**teste do web socket */
    room.on('members', members=>{
        console.log("Conectado!")

        console.log("conexões abertas " + members.length)
  /**Validação controle de usuarios  */      
        number = members.length - 1
        const isOfferer = members.length >= 2

        startWebRTC(isOfferer)
   
    })
/** */
    function sendMessage(message){
        drone.publish({
            room: roomName,message
        })
    }
/**detectando os eventos */
    function startWebRTC(isOfferer){
        pc = new RTCPeerConnection(configuration)

        pc.onicecandidate = event =>{
            if(event.candidate){
                sedMessage({'candidate':event.candidate})
            }
        }

        if(isOfferer){
            pc.onnegotiationneeded = () =>{
                pc.createOffer().then(localDescCreated).catch(onError)

            }
        }

        pc.ontrack = event =>{
            const stream = event.streams[0]

            if(!remoteVideo.srtObject || remoteVideo.srtObject.id !== stream.id){
                remoteVideo.srtObject = stream
            }
        }
    }



})

</script>
</body>
</html>