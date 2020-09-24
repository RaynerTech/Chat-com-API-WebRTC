<!DOCTYPE html>
<html lang="pt">
<head>
<title>Vídeo Chat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/chat.js"></script> 
    <style>
        
       

        .sepa{
            display:flex;
            height:100vh;
            margin:0;
            padding:0;
            align-items: center;
            justify-content:center;
            
        }



        video{
            max-width:calc(50% - 100px);
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

</body>
</html>