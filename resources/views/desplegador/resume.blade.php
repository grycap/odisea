@extends('layout./desplegador')

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
    <script type="text/javascript" src="/desplegador/js/shCore.js"></script>
    <script type="text/javascript" src="/desplegador/js/shBrushBash.js"></script>
    <link type="text/css" rel="stylesheet" href="/desplegador/css/shCoreDefault.css"/>
    <script type="text/javascript">SyntaxHighlighter.all();</script>
@endsection

@section('content')
    <?php
    if(strcmp($language, "java") == 0){
        $iconLanguage = "java";
        $iconLanguageMini = "java2";
        $nameLanguage = "Java";
    }else{
        $iconLanguage = "c--";
        $iconLanguageMini = "c--";
        $nameLanguage = "C";
    }
    ?>

    <div class="header-banner header-banner--left">
        <div class="header-banner__logo">
            <a class="header-banner__link" target="_blank" href="#">
                <img style="width:35px; height:30px;" src="/desplegador/img/BoldMedia-flat-logo.png">
                </img>
            </a>
        </div>
        <div id="header-breadcrumb">
            <ul class="header-breadcrumb">
                <li class="header-breadcrumb__list-item"><a href="{{url('/inicio',$parameters = [],$secure = null)}}"
                                                            class="header-breadcrumb--link">admin</a></li>
            </ul>
        </div>
    </div>

    <div class="header-banner header-banner--right">
        <ul class="header-banner__list--right">
            <li id="header-search-container" class="header-banner__list-item header-banner__list-item--no-padding">
                <div class="header-search">
                    <span tabindex="0" role="button" class="header-search__store"><span
                                class="header-search__store-icon"><svg
                                    class="svg-icon" viewBox="0 0 20 20" style="width:20px;height:20px;"><use
                                        xlink:href="#search_16"></use></svg></span><span
                                class="header-search__store-label">Información</span></span>
                    <span tabindex="0" role="button" class="header-search__store" style="margin-left:10px"><span
                                class="header-search__store-icon"><svg
                                    class="svg-icon" viewBox="0 0 20 20" style="width:20px;height:20px;"><use
                                        xlink:href="#store_22"></use></svg></span><span
                                class="header-search__store-label">Crear Cuentas Cloud</span></span>
                </div>
            </li>
            <li id="profile-link-container" class="header-banner__list-item header-banner__list-item--logout"></li>
        </ul>
    </div>
    <div id="deployment-bar-container">
        <div class="panel-component deployment-bar-panel">
            <div class="panel-component__inner">
                <div class="deployment-bar">
                    <textarea id="receta" name="receta" style="display:none;">{{$radlText}}</textarea><a id="export"
                                                                                                         class="button--inline-neutral download"
                                                                                                         href='#'>Receta
                        RADL</a>
                    <div class="deployment-bar__notification" style="opacity: 1"> Pulsa el Boton al terminar el
                        despliegue
                    </div>
                    <div class="deployment-bar__deploy">
                        <button class="button--inline-deployment disabledAll" type="button" id="detailDeploy">Detalle
                            del despliegue ({{$central+$student}})
                        </button>
                    </div>
                    <input class="deployment-bar__file" type="file" accept=".zip,.yaml,.yml">
                </div>
            </div>
        </div>
    </div>
    <div id="env-size-display-container">
        <div class="env-size-display">
            <ul>
                <li class="tab active"><a data-view="service"><span>{{$central}}</span><span> Maquina Central</span></a>
                </li>
                <li class="spacer">|</li>
                <li class="tab"><a data-view="machine"><span>{{$student}}</span><span> M. Alumno</span></a></li>
            </ul>
        </div>
    </div>
    <div id="inspector-container">
        <div class="panel-component inspector-panel">
            <div class="panel-component__inner">
                <div class="inspector-view">
                    <div class="inspector-header" tabindex="0" role="button"><span
                                class="inspector-header__back" id="back"><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="6px" height="16px"
                                    viewBox="0 0 6 16"><path
                                        fillrule="evenodd" class="inspector-list__header-back-image"
                                        d="M 1.29 10.18C 1.84 11.01 2.46 11.86 3.15 12.74 3.84 13.62 4.58 14.48 5.37 15.34 5.58 15.56 5.79 15.78 6 16 6 16 6 13.53 6 13.53 5.57 13.05 5.14 12.54 4.73 12.02 4.25 11.41 3.8 10.79 3.37 10.15 2.95 9.51 2.43 8.61 2.1 8 2.43 7.39 2.95 6.49 3.37 5.85 3.8 5.22 4.25 4.59 4.73 3.98 5.14 3.46 5.57 2.95 6 2.47 6 2.47 6 0 6 0 5.79 0.22 5.58 0.44 5.37 0.67 4.58 1.52 3.84 2.38 3.15 3.26 2.46 4.14 1.84 4.99 1.29 5.82 0.75 6.65 0.32 7.38 0 8 0.32 8.62 0.75 9.35 1.29 10.18"
                                        fill="rgb(131,147,149)"></path></svg></span><span
                                class="inspector-header__title">Desplegando</span><span
                                class="inspector-header__icon-container">
                    <span class="inspector-header__icon-container">
                    <img src="/desplegador/svg/icon-{{$iconLanguageMini}}.svg" class="inspector-header__service-icon">
                    </span>
                    <img src="/desplegador/svg/icon-git.svg" class="inspector-header__service-icon">
                    </span>
                        <span class="inspector-header__icon-container">
                    <img src="/desplegador/svg/icon-jenkins.svg" class="inspector-header__service-icon">
                    </span>
                    </div>
                    <div class="inspector-content">
                        <div class="service-overview">
                            <ul class="service-overview__actions">
                                <li class="overview-action" title="Uncommitted" tabindex="0" role="button"
                                    style="padding-left: 20px;">
                                    <img src="/desplegador/svg/icon-central.svg" class="inspector-header__service-icon"
                                         style="margin-right: 5px;">
                                    <span class="overview-action__title">Maquina Central</span><span
                                            class="overview-action__link hidden"></span><span
                                            class="overview-action__value overview-action__value--type-uncommitted">{{$central}}</span>
                                </li>

                                @if($student != 0)
                                    <li class="overview-action" title="Units" tabindex="0" role="button"
                                        style="padding-left: 20px;">
                                        <img src="/desplegador/svg/icon-pc.svg" class="inspector-header__service-icon"
                                             style="margin-right: 5px;">
                                        <span
                                                class="overview-action__title">Alumno</span><span
                                                class="overview-action__link hidden"></span><span
                                                class="overview-action__value overview-action__value--type-all">{{$student}}</span>
                                    </li>
                                @endif
                            </ul>
                            <div class="button-row button-row--multiple button-row--count-1">
                                <button class="button--neutral disabledAll" type="button" id="detail">
                                    Detalle del despliegue
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="machine-view">
        <div class="machine-view" style="
    animation-fill-mode: forwards;
    position: initial;
">
            <div class="machine-view__content" style="width: 38%;left: 62%;">
                <div class="machine-view__column">

                    <div class="machine-view__column-content">
                        <ul class="machine-view__list">
                            <li class="machine-view__unplaced-unit" draggable="true"><img
                                        src="/desplegador/svg/icon-user-root.svg"
                                        alt="Amazon"
                                        class="machine-view__unplaced-unit-icon"
                                        style="border-radius: 0;
    -webkit-clip-path: none;"><span>Estado del Despliegue</span>
                                <div class="more-menu"><span class="more-menu__toggle" role="button" tabindex="0"><svg
                                                class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xlink:href="#contextual-menu-16"></use></svg></span></div>
                                <div class="add-machine">
                                    <div class="add-machine__constraints">
                                        <pre id="estado"
                                             class="brush: bash;">Desplegando Instancias -> Install Ansible</pre>
                                        <br>
                                    </div>
                                </div>
                                <div class="machine-view__unplaced-unit-drag-state"></div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="viewport">
        <div id="content" style="width: 65%;">
            <div id="main">
                <div>
                    <div class="topology">
                        <div class="topology-canvas"style="width: 1366px; height: 100%;">
                            <p id="message-p" class="environment-help__tooltip" style="margin-left: 370px;margin-top: -90px;position: absolute;">Instalando Ansible en estos momentos</p>
                            <div class="environment-menu top" id="relation-menu"></div>
                            <svg width="70%" height="100%" class="the-canvas" id="yui_3_11_0_1_1469134956262_903">
                                <g id="conection-jenkins" class="rel-group show invisible">
                                    <line class="relation pending" x1="150.17100524902344" y1="548.9429931640625" x2="502.7927856445312" y2="120.4901123046875"></line>
                                    <circle cx="243.16645378616377" cy="436.8531280577163" r="4" class="connector1 pending"></circle>
                                    <circle class="connector2 pending" r="4" cy="262.5799774110337" cx="385.79733710739094"></circle>
                                    <g class="rel-indicator" transform="translate(318.48189544677734,345.216552734375)" id="yui_3_11_0_1_1476570356490_3473">
                                        <image width="20" height="20" x="-10" y="-10" rx="10" ry="10" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/desplegador/svg/relation-icon-pending.svg" id="yui_3_11_0_1_1476570356490_3472"></image>
                                    </g>
                                    <text>
                                        <tspan></tspan>
                                    </text>
                                </g>

                                <g id="conection-git" class="rel-group show invisible">
                                    <line class="relation pending" x1="450.17100524902344" y1="548.9429931640625" x2="502.7927856445312" y2="120.4901123046875"></line>
                                    <circle cx="469.16645378616377" cy="395.8531280577163" r="4" class="connector1 pending"></circle>
                                    <circle class="connector2 pending" r="4" cy="304.5799774110337" cx="479.79733710739094"></circle>
                                    <g class="rel-indicator" transform="translate(475.48189544677734,345.216552734375)" id="yui_3_11_0_1_1476570356490_3473">
                                        <image width="20" height="20" x="-10" y="-10" rx="10" ry="10" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/desplegador/svg/relation-icon-pending.svg" id="yui_3_11_0_1_1476570356490_3472"></image>
                                    </g>
                                    <text>
                                        <tspan></tspan>
                                    </text>
                                </g>

                                <g id="conection-java" class="rel-group show invisible">
                                    <line class="relation pending" x1="800.17100524902344" y1="400.9429931640625" x2="502.7927856445312" y2="180.4901123046875"></line>
                                    <circle cx="643.16645378616377" cy="283.8531280577163" r="4" class="connector1 pending"></circle>
                                    <circle class="connector2 pending" r="4" cy="235.5799774110337" cx="575.79733710739094"></circle>
                                    <g class="rel-indicator" transform="translate(608.48189544677734,258.216552734375)" id="yui_3_11_0_1_1476570356490_3473">
                                        <image width="20" height="20" x="-10" y="-10" rx="10" ry="10" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/desplegador/svg/relation-icon-pending.svg" id="yui_3_11_0_1_1476570356490_3472"></image>
                                    </g>
                                    <text>
                                        <tspan></tspan>
                                    </text>
                                </g>

                                <g transform="translate(40,-0.5) scale(1)">
                                    <g pointer-events="all" class="service show hover is-selected" data-name="ansible"
                                       transform="translate(340,100)" width="190" height="190">
                                        <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                                class="service-block__halo"
                                                id="circle-ansible"></circle>
                                        <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                                class="service-block" width="190" height="190"></circle>
                                        <image class="service-icon"
                                               href="/desplegador/svg/ansible.svg"
                                               width="96" height="96" transform="translate(47, 47)"
                                               clip-path="url(#clip-mask)"></image>
                                    </g>
                                    <g pointer-events="all" class="service show hover is-selected" data-name="java"
                                       transform="translate(600,250)" width="190" height="190">
                                        <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                                class="service-block__halo invisible"
                                                id="circle-java"></circle>
                                        <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                                class="service-block" width="190" height="190"></circle>
                                        <image class="service-icon"
                                               href="/desplegador/svg/icon-{{$iconLanguage}}.svg"
                                               width="96" height="96" transform="translate(47, 47)"
                                               clip-path="url(#clip-mask)"></image>
                                    </g>

                                    <g pointer-events="all" class="service show hover is-selected" data-name="jenkins"
                                       transform="translate(20,410)" width="190" height="190">
                                        <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                                class="service-block__halo invisible" id="circle-jenkins"></circle>
                                        <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                                class="service-block" width="190" height="190"></circle>
                                        <image class="service-icon"
                                               href="/desplegador/svg/icon-jenkins.svg"
                                               width="96" height="96" transform="translate(47, 47)"
                                               clip-path="url(#clip-mask)"></image>
                                    </g>

                                    <g pointer-events="all" class="service show hover is-selected" data-name="git"
                                       transform="translate(340,410)" width="190" height="190"
                                       id="yui_3_11_0_1_1469134956262_905">
                                        <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                                class="service-block__halo invisible"
                                                id="circle-git"></circle>
                                        <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                                class="service-block" width="190" height="190"
                                                id="yui_3_11_0_1_1469134956262_908"></circle>
                                        <image class="service-icon"
                                               href="/desplegador/svg/icon-gitlab.svg"
                                               width="96" height="96" transform="translate(47, 47)"
                                               clip-path="url(#clip-mask)"></image>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div> <!-- /container -->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var url = "";
            $("#detail,#detailDeploy").click(function (e) {
                if (url != "") {
                    location.href = url;
                }
            });

            $("#back").click(function (e) {
                location.href = "/";
            });

            var myVar = setInterval(myTimer, 60000);//1min
            var id = "{{$id}}";

            function myTimer() {
                console.log(id);
                $.ajax({
                    type: 'get',
                    url: "/message/" + id,
                    dataType: 'json',
                    success: function (data) {
                        console.log('Recibido:', data);
                        var str = data.mensaje;
                        var res = str.split("<br>").reverse().join("<br>");
                        $("#estado .container .line").html(res);
                        verificarFinalizacion(data.mensaje);
                        verificarError(data.mensaje);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }

            function myStopFunction() {
                clearTimeout(myVar);
            }

            function verificarError(data) {
                var existe = data.search("ERROR executing task central_central: (3/3)");
                if (existe != -1) {
                    myStopFunction();
                }
            }



            function verificarFinalizacion(data) {
                var estado = ["ansible", "git", "java", "jenkins"];
                var codigo = ["0f485338872", "0f168424895", "0f452458482", "0f412483458"];
                var name = ["Ansible", "Gitlab", "{{$nameLanguage}}", "Jenkins"];
                for (var x = 0; x < codigo.length; x++) {
                    var existe = data.search(codigo[x]);
                    if (existe != -1) {
                        console.log(codigo[x]);
                        if ("0f412483458" == codigo[x]) {
                            $("#circle-" + estado[x]).attr("style", "animation: serviceBlockHaloSelected 1s alternate;");
                            url = "/detail/" + "{{$id}}";
                            console.log(url);
                            $("#detail,#detailDeploy").removeClass("disabledAll");
                            $("body").overhang({
                                type: "success",
                                message: "Termino el despliegue puedes acceder al detalle y a las cuentas de usuario",
                                closeConfirm: true
                            });
                            myStopFunction();
                        } else {
                            $("#circle-" + estado[x]).attr("style", "animation: serviceBlockHaloSelected 1s alternate;");
                            $("#circle-" + estado[x + 1]).attr("class", "service-block__halo");
                            $("#message-p").html("Instalando "+name[x + 1]+" en estos momentos");
                            $("#conection-" + estado[x + 1]).removeClass("invisible");
                        }

                    }
                }
            }
        });
    </script>
    <script>
        function createDownloadLink(anchorSelector, str, fileName) {
            anchor = document.getElementById(anchorSelector)
            if (window.navigator.msSaveOrOpenBlob) {
                var fileData = [str];
                blobObject = new Blob(fileData);
                anchor.onclick = function () {
                    window.navigator.msSaveOrOpenBlob(blobObject, fileName);
                }
            } else {
                var url = "data:Application/octet-stream," + encodeURIComponent(str);
                anchor.download = fileName;
                anchor.href = url;
            }
        }
        var dataToDownload = document.getElementById("receta").value;
        createDownloadLink("export", dataToDownload, "receta.radl");
    </script>
@stop