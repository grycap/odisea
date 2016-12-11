<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>
<title></title>

<div align="center">

    <div style="width:100%;max-width: 600px">

        <div>
            <img src="https://s3-eu-west-1.amazonaws.com/odisea-image/cabecera-email.png" width="100%">
        </div>

        <div style="font-size: 15px; line-height: 150%;overflow:visible;font-family: 'Signika', Helvetica, sans-serif;margin: 5% auto;text-align: justify;width: 90%">
            <p style="color: #696969">Hola {{ $nombre }},</p>

            <p style="color: #696969">Nuestro plataforma te informara al terminar el despliegue por este medio, para que realices un seguimiento de tu despliegue.</p>
            <br>

            <p style="color: #696969;text-align:center">EL equipo de desarrollo</p>

        </div>

        <div style="border: 1px solid #19b6ee; border-image-source: initial; border-image-slice: initial; border-image-width: initial; border-image-outset: initial; border-image-repeat: initial; border-radius: 4px; width: 205px; height: 40px; margin-top: 4px; background-image: initial; background-attachment: initial; background-color: #19b6ee; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">
            <div style="width:100%; height:21px;margin-left:0px; margin-right:11px;margin-top:9px;margin-bottom:10px">
                <a style="font-size: 18px; color: #fffbeb; font-family: Signika, Helvetica, sans-serif; text-decoration: none !important;" href="{{url($url,$parameters = [],$secure = null)}}">Despliegue >></a>
            </div>
        </div>

        <div style="margin-top: 60px">
            <a href="#">
                <img  style="width:100%" src="https://s3-eu-west-1.amazonaws.com/odisea-image/footer-email.png">
            </a>
        </div>

    </div>
</div>