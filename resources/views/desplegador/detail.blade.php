@extends('layout.desplegador')

@section('seo')
    <title>Configuración para el despliegue</title>

    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <link rel="dns-prefetch" href="//googletagmanager.com/">
    <link rel="dns-prefetch" href="//www.google-analytics.com/">
    <link rel="dns-prefetch" href="//www.facebook.com/">
    <link rel="dns-prefetch" href="//twitter.com/">
@endsection

@section('content')
    <div class="header-banner header-banner--left">
        <div class="header-banner__logo">
            <a class="header-banner__link" target="_blank" href="#">
                <img style="width:35px; height:30px;" src="/desplegador/img/BoldMedia-flat-logo.png">
                </img>
            </a>
        </div>
        <div id="header-breadcrumb">
            <ul class="header-breadcrumb">
                <li class="header-breadcrumb__list-item"><a class="header-breadcrumb--link">admin</a></li>
            </ul>
        </div>
    </div>
    <div class="header-banner header-banner--right">
        <ul class="header-banner__list--right">
            <li id="header-search-container" class="header-banner__list-item header-banner__list-item--no-padding">
                <div class="header-search">
                    <a href="/#demo" target="_blank"><span tabindex="0" role="button" class="header-search__store"><span
                                class="header-search__store-icon"><svg
                                    class="svg-icon" viewBox="0 0 20 20" style="width:20px;height:20px;"><use
                                        xlink:href="#search_16"></use></svg></span><span
                                class="header-search__store-label">Información</span></span></a>
                    <a href="http://docs.aws.amazon.com/es_es/AWSSimpleQueueService/latest/SQSGettingStartedGuide/AWSCredentials.html" target="_blank">
                    <span tabindex="0" role="button" class="header-search__store" style="margin-left:10px"><span
                                class="header-search__store-icon"><svg
                                    class="svg-icon" viewBox="0 0 20 20" style="width:20px;height:20px;"><use
                                        xlink:href="#store_22"></use></svg></span><span
                                class="header-search__store-label">Crear Cuentas Cloud</span></span></a>
                </div>
            </li>
            <li id="profile-link-container" class="header-banner__list-item header-banner__list-item--logout"></li>
        </ul>
    </div>
    <div id="charmbrowser-container">
        <div class="panel-component user-profile">
            <div class="panel-component__inner">
                <div class="twelve-col">
                    <div class="inner-wrapper">
                        <div class="user-profile-header twelve-col">
                            <!--<button class="button--inline-neutral" type="button" style="color: white;background: #f48d28;"><textarea id='repository' name='repository' style='display:none;'></textarea><a id='exportRepository' class='download' style="color: white;text-decoration: none;" href='#'>Descarga de Llaves ({{$accountCentral + $accountStudent}})</a>
                            </button>-->
                            <button class="button--inline-neutral" type="button" style="color: white;background: #f48d28;" onClick=" window.print(); return false">Imprimir datos</button>
                            <button class="button--inline-neutral" type="button" style="margin-right: 10px;background: #19b6ee;color: white;"><textarea id='private_key_value' name='private_key_value' style='display:none;'>screen mode id:i:2
use multimon:i:0
desktopwidth:i:1366
desktopheight:i:768
session bpp:i:32
winposstr:s:0,3,0,0,800,600
compression:i:1
keyboardhook:i:2
audiocapturemode:i:0
videoplaybackmode:i:1
connection type:i:2
displayconnectionbar:i:1
disable wallpaper:i:1
allow font smoothing:i:0
allow desktop composition:i:0
disable full window drag:i:1
disable menu anims:i:1
disable themes:i:0
disable cursor setting:i:0
bitmapcachepersistenable:i:1
full address:s:{{$dataIP[0]['ipPublic']}}
audiomode:i:0
redirectprinters:i:1
redirectcomports:i:0
redirectsmartcards:i:1
redirectclipboard:i:1
redirectposdevices:i:0
redirectdirectx:i:1
autoreconnection enabled:i:1
authentication level:i:2
prompt for credentials:i:0
negotiate security layer:i:1
remoteapplicationmode:i:0
alternate shell:s:
shell working directory:s:
gatewayhostname:s:
gatewayusagemethod:i:4
gatewaycredentialssource:i:4
gatewayprofileusagemethod:i:0
promptcredentialonce:i:1
use redirection server name:i:0
</textarea><a id='export' class='download' style="color: white;text-decoration: none;" href='#'>Descarga Escritorio Virtual ({{$accountCentral + $accountStudent}})</a>
                            </button>
                            <span class="user-profile-header__avatar user-profile-header__avatar--default">
                                <span class="avatar-overlay"></span></span>
                            <h1 class="user-profile-header__username">Invitado</h1>
                            <ul class="user-profile-header__counts">
                                <li class="user-profile-header__count"><span>{{$accountCentral}}</span>
                                    <span> Instancia central</span><span></span></li>
                                <li class="user-profile-header__count"><span>{{$accountStudent}}</span><span> Instancia alumnos</span></li>
                                <li class="user-profile-header__count"><span>1</span><span> Receta</span></li>
                            </ul>
                        </div>
                        <div>
                            <div>
                                <div class="user-profile__header twelve-col no-margin-bottom">
                                    <span>Llaves de la Instancia</span><span class="user-profile__size"><span>( </span><span>{{$accountCentral + $accountStudent}}</span>
                                        <span>)</span></span></div>
                                <ul class="user-profile__list twelve-col">
                                    <li class="user-profile__list-header twelve-col"><span
                                                class="user-profile__list-col three-col">IP</span><span
                                                class="user-profile__list-col four-col">IP Privada</span><span
                                                class="user-profile__list-col two-col">Usuario</span><span
                                                class="user-profile__list-col one-col">Escritorio V.</span><span
                                                class="user-profile__list-col two-col last-col">Llave .pem</span></li>
                                    @for($i=0;$i<($accountCentral + $accountStudent);$i++)
                                    <li class="user-profile__entity user-profile__list-row twelve-col" style="background: white;border-radius: 2px;box-shadow: 0 1px 4.85px 0.15px rgba(0,0,0,0.2);">
                                        <div class="user-profile__entity-summary twelve-col no-margin-bottom"><span
                                                    class="user-profile__list-col three-col">{{$dataIP[$i]['ipPublic']}}</span><span
                                                    class="user-profile__list-col four-col">{{$dataIP[$i]['ipPrivate']}}</span><span
                                                    class="user-profile__list-col two-col">ubuntu</span>
                                                    <span class="user-profile__list-col one-col"><button class="button--inline-neutral" type="button" style="background: #19b6ee;color: white; margin-top: -10px"><textarea id='virtual_desktop{{$i}}' name='virtual_desktop{{$i}}' style='display:none;'>screen mode id:i:2
use multimon:i:0
desktopwidth:i:1366
desktopheight:i:768
session bpp:i:32
winposstr:s:0,3,0,0,800,600
compression:i:1
keyboardhook:i:2
audiocapturemode:i:0
videoplaybackmode:i:1
connection type:i:2
displayconnectionbar:i:1
disable wallpaper:i:1
allow font smoothing:i:0
allow desktop composition:i:0
disable full window drag:i:1
disable menu anims:i:1
disable themes:i:0
disable cursor setting:i:0
bitmapcachepersistenable:i:1
full address:s:{{$dataIP[$i]['ipPublic']}}
                                                                audiomode:i:0
redirectprinters:i:1
redirectcomports:i:0
redirectsmartcards:i:1
redirectclipboard:i:1
redirectposdevices:i:0
redirectdirectx:i:1
autoreconnection enabled:i:1
authentication level:i:2
prompt for credentials:i:0
negotiate security layer:i:1
remoteapplicationmode:i:0
alternate shell:s:
shell working directory:s:
gatewayhostname:s:
gatewayusagemethod:i:4
gatewaycredentialssource:i:4
gatewayprofileusagemethod:i:0
promptcredentialonce:i:1
use redirection server name:i:0
</textarea><a id='exportDesktop{{$i}}' class='download' style="color: white;text-decoration: none;" href='#'>Acceso</a>
                            </button></span>
                                                    <span class="user-profile__list-col two-col last-col"><button class="button--inline-neutral" type="button" style="background: #19b6ee;color: white; margin-top: -10px"><textarea id='private_key_value{{$i}}' name='private_key_value{{$i}}' style='display:none;'>{{$dataIP[$i]['llave']}}</textarea><a id='export{{$i}}' class='download' style="color: white;text-decoration: none;" href='#'>Descarga</a></button></span>
                                        </div>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="user-profile__header twelve-col no-margin-bottom">
                                    <span>Servicios desplegados</span><span class="user-profile__size"><span>(</span><span> 2</span>
                                        <span>)</span></span></div>
                                <ul class="user-profile__list twelve-col">
                                    <li class="user-profile__list-header twelve-col"><span
                                                class="user-profile__list-col three-col">Nombre</span><span
                                                class="user-profile__list-col four-col">Url</span><span
                                                class="user-profile__list-col two-col">Usuario</span><span
                                                class="user-profile__list-col one-col">Contraseña</span><span
                                                class="user-profile__list-col two-col last-col">IP Instancia</span></li>
                                    <li class="user-profile__entity user-profile__list-row twelve-col" style="background: white;border-radius: 2px;box-shadow: 0 1px 4.85px 0.15px rgba(0,0,0,0.2);">
                                        <div class="user-profile__entity-summary twelve-col no-margin-bottom"><span
                                                    class="user-profile__list-col three-col">Gitlab</span><span
                                                    class="user-profile__list-col four-col"><a href="http://{{$dataIP[0]['ipPublic']}}/users/sign_in" target="_blank">http://{{$dataIP[0]['ipPublic']}}/users/sign_in</a></span><span
                                                    class="user-profile__list-col two-col">root</span><span
                                                    class="user-profile__list-col one-col">{{$central->password}}</span><span
                                                    class="user-profile__list-col two-col last-col">{{$dataIP[0]['ipPublic']}}</span></div>
                                        <div class="user-profile__entity-details twelve-col" style="height:0px;opacity:0;">
                                            <div class="twelve-col no-margin-bottom">
                                                <div class="user-profile__entity-details-header twelve-col">
                                                    <div class="ten-col no-margin-bottom"><span>sandbox</span>
                                                    </div>
                                                    <div class="user-profile__entity-details-header-action two-col last-col no-margin-bottom">
                                                        <button class="button--inline-neutral" type="button">Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-profile__entity user-profile__list-row twelve-col" style="background: white;border-radius: 2px;box-shadow: 0 1px 4.85px 0.15px rgba(0,0,0,0.2);">
                                        <div class="user-profile__entity-summary twelve-col no-margin-bottom"><span
                                                    class="user-profile__list-col three-col">Jenkins</span><span
                                                    class="user-profile__list-col four-col"><a href="http://{{$dataIP[0]['ipPublic']}}:8089" target="_blank">http://{{$dataIP[0]['ipPublic']}}:8089</a></span><span
                                                    class="user-profile__list-col two-col">{{$central->username}}</span><span
                                                    class="user-profile__list-col one-col">{{$central->password}}</span><span
                                                    class="user-profile__list-col two-col last-col">{{$dataIP[0]['ipPublic']}}</span></div>
                                        <div class="user-profile__entity-details twelve-col" style="height:0px;opacity:0;">
                                            <div class="twelve-col no-margin-bottom">
                                                <div class="user-profile__entity-details-header twelve-col">
                                                    <div class="ten-col no-margin-bottom"><span>sandbox</span>
                                                    </div>
                                                    <div class="user-profile__entity-details-header-action two-col last-col no-margin-bottom">
                                                        <button class="button--inline-neutral" type="button">Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @if($language == 'java')
                                    <li class="user-profile__entity user-profile__list-row twelve-col" style="background: white;border-radius: 2px;box-shadow: 0 1px 4.85px 0.15px rgba(0,0,0,0.2);">
                                        <div class="user-profile__entity-summary twelve-col no-margin-bottom"><span
                                                    class="user-profile__list-col three-col">SonarQube</span><span
                                                    class="user-profile__list-col four-col"><a href="http://{{$dataIP[0]['ipPublic']}}:9000" target="_blank">http://{{$dataIP[0]['ipPublic']}}:9000</a></span><span
                                                    class="user-profile__list-col two-col">admin</span><span
                                                    class="user-profile__list-col one-col">admin</span><span
                                                    class="user-profile__list-col two-col last-col">{{$dataIP[0]['ipPublic']}}</span></div>
                                        <div class="user-profile__entity-details twelve-col" style="height:0px;opacity:0;">
                                            <div class="twelve-col no-margin-bottom">
                                                <div class="user-profile__entity-details-header twelve-col">
                                                    <div class="ten-col no-margin-bottom"><span>sandbox</span>
                                                    </div>
                                                    <div class="user-profile__entity-details-header-action two-col last-col no-margin-bottom">
                                                        <button class="button--inline-neutral" type="button">Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="user-profile__header twelve-col no-margin-bottom">
                                    <span>Cuentas de Usuario Administrador y conexion SSH sin llave privada y conexion a escritorio virtual</span><span class="user-profile__size"><span>(</span><span>1</span>
                                        <span>)</span></span></div>
                                <ul class="user-profile__list twelve-col">
                                    <li class="user-profile__list-header twelve-col"><span
                                                class="user-profile__list-col three-col">Nombre de usuario</span><span
                                                class="user-profile__list-col four-col">Repositorio</span><span
                                                class="user-profile__list-col two-col">Contraseña</span><span
                                                class="user-profile__list-col one-col">User Gitlab</span><span
                                                class="user-profile__list-col two-col last-col">Password</span></li>
                                    <li class="user-profile__entity user-profile__list-row twelve-col" style="background: white;border-radius: 2px;box-shadow: 0 1px 4.85px 0.15px rgba(0,0,0,0.2);">
                                        <div class="user-profile__entity-summary twelve-col no-margin-bottom"><span
                                                    class="user-profile__list-col three-col">{{$central->username}}</span><span
                                                    class="user-profile__list-col four-col"><a href="http://{{$dataIP[0]['ipPublic']}}/users/sign_in" target="_blank">http://{{$dataIP[0]['ipPublic']}}/users/sign_in</a></span><span
                                                    class="user-profile__list-col two-col">{{$central->password}}</span><span
                                                    class="user-profile__list-col one-col">root</span><span
                                                    class="user-profile__list-col two-col last-col">{{$central->password}}</span></div>
                                        <div class="user-profile__entity-details twelve-col" style="height:0px;opacity:0;">
                                            <div class="twelve-col no-margin-bottom">
                                                <div class="user-profile__entity-details-header twelve-col">
                                                    <div class="ten-col no-margin-bottom"><span>sandbox</span>
                                                    </div>
                                                    <div class="user-profile__entity-details-header-action two-col last-col no-margin-bottom">
                                                        <button class="button--inline-neutral" type="button">Manage
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                           <div>
                            <div>
                                <div class="user-profile__header twelve-col no-margin-bottom">
                                    <span>Cuentas de Alumnos</span><span class="user-profile__size"><span>(</span><span>{{count($student)}}</span><span>)</span></span></div>
                                <ul class="user-profile__list twelve-col">
                                    <li class="user-profile__list-header twelve-col"><span
                                                class="user-profile__list-col three-col">Nombre de usuario</span><span
                                                class="user-profile__list-col four-col">Repositorio</span><span
                                                class="user-profile__list-col two-col">Contraseña</span><span
                                                class="user-profile__list-col one-col">Lanzamiento</span><span
                                                class="user-profile__list-col two-col last-col">IP instancia</span></li>
                                    @foreach($student as $key => $data)
                                        @foreach($data as $value)
                                    <li class="user-profile__entity user-profile__list-row twelve-col" style="background: white;border-radius: 2px;box-shadow: 0 1px 4.85px 0.15px rgba(0,0,0,0.2);">
                                        <div class="user-profile__entity-summary twelve-col no-margin-bottom"><span
                                                    class="user-profile__list-col three-col">{{$value->username}}</span><span
                                                    class="user-profile__list-col four-col"><a href="http://{{$dataIP[0]['ipPublic']}}/users/sign_in" target="_blank">http://{{$dataIP[0]['ipPublic']}}/users/sign_in</a></span><span
                                                    class="user-profile__list-col two-col">{{$value->password}}</span><span
                                                    class="user-profile__list-col one-col">{{$created}}</span><span
                                                    class="user-profile__list-col two-col last-col">{{$dataIP[0]['ipPublic']}}</span></div>
                                        <div class="user-profile__entity-details twelve-col" style="height:0px;opacity:0;">
                                            <div class="twelve-col no-margin-bottom">
                                                <div class="user-profile__entity-details-header twelve-col">
                                                    <div class="ten-col no-margin-bottom"><span>sandbox</span>
                                                    </div>
                                                    <div class="user-profile__entity-details-header-action two-col last-col no-margin-bottom">
                                                        <button class="button--inline-neutral" type="button">Manage
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="user-profile__entity-details-content twelve-col no-margin-bottom">
                                                    <div class="three-col last-col"><span>Owner: </span><span>user-admin</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function createDownloadLink(anchorSelector, str, fileName){
            anchor = document.getElementById(anchorSelector);
            if(window.navigator.msSaveOrOpenBlob) {
                var fileData = [str];
                blobObject = new Blob(fileData);
                anchor.onclick = function(){
                    window.navigator.msSaveOrOpenBlob(blobObject, fileName);
                }
            } else {
                var url = "data:Application/octet-stream," + encodeURIComponent(str);
                anchor.download = fileName;
                anchor.href = url;
            }
        }
        var dataToDownload = document.getElementById("private_key_value").value;
        createDownloadLink("export",dataToDownload,"linux.rdp");

        <?php
        for($i=0;$i<($accountCentral + $accountStudent);$i++){
            echo 'var dataToDownload'.$i.' = document.getElementById("private_key_value'.$i.'").value;';
            echo 'createDownloadLink("export'.$i.'",dataToDownload'.$i.',"key'.$i.'.pem");';

            echo 'var dataVirtualDesktop'.$i.' = document.getElementById("virtual_desktop'.$i.'").value;';
            echo 'createDownloadLink("exportDesktop'.$i.'",dataVirtualDesktop'.$i.',"linux'.$i.'.rdp");';

        }
        ?>
   </script>

@stop