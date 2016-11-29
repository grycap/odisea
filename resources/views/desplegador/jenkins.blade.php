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
@section('js-css')
    <link rel="stylesheet" type="text/css" href="/desplegador/css/zTreeStyle.css"/>
    <script type="text/javascript" src="/desplegador/js/jquery.ztree.core.min.js"></script>
    <script type="text/javascript" src="/desplegador/js/shCore.js"></script>
    <script type="text/javascript" src="/desplegador/js/shBrushJava.js"></script>
    <link type="text/css" rel="stylesheet" href="/desplegador/css/shCoreDefault.css"/>
    <script type="text/javascript">SyntaxHighlighter.all();</script>
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

  <div id="loading" class="centered-column invisible">
      <img style="width:35px; height:30px;" src="/desplegador/img/BoldMedia-flat-logo.png">
    <div class="panel">
      <div id="loading-message-text" class="header">Conectando con el IM-UPV</div>
      <div id="loading-spinner">
        <span class="spinner-loading"></span>
      </div>
    </div>
  </div>

    <div id="deployment-bar-container">
        <div class="panel-component deployment-bar-panel">
            <div class="panel-component__inner">
                <div class="deployment-bar">
                    <span class="deployment-bar__import link" role="button" tabindex="0" id="import">Importar</span><span
                            class="deployment-bar__export link" role="button" tabindex="0" id="export">Exportar</span><a
                            class="button--inline-neutral" href="#" target="_blank" id="atras">Anterior</a>
                    <div class="deployment-bar__notification">1 machine has been added.</div>
                    <div class="deployment-bar__deploy">
                        <button class="button--inline-deployment" type="button" id="despliegue">Despliegue (1)</button>
                    </div>
                    <input class="deployment-bar__file" type="file" accept=".zip,.yaml,.yml"></div>
            </div>
        </div>
    </div>
    <div id="env-size-display-container">
        <div class="env-size-display">
            <ul>
                <li class="tab"><a data-view="service"><span>1</span><span id="message-central"> Central</span></a>
                </li>
                <li class="spacer">|</li>
                <li class="tab active"><a data-view="machine"><span>0</span><span> Alumnos</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div id="inspector-container">
        <div class="panel-component inspector-panel">
            <div class="panel-component__inner">
                <div class="inspector-view">
                    <div class="inspector-header fade-in" tabindex="0" role="button"><span
                                class="inspector-header__back"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="6px" height="16px"
                                                                    viewBox="0 0 6 16"><path
                                        fillrule="evenodd" class="inspector-list__header-back-image"
                                        d="M 1.29 10.18C 1.84 11.01 2.46 11.86 3.15 12.74 3.84 13.62 4.58 14.48 5.37 15.34 5.58 15.56 5.79 15.78 6 16 6 16 6 13.53 6 13.53 5.57 13.05 5.14 12.54 4.73 12.02 4.25 11.41 3.8 10.79 3.37 10.15 2.95 9.51 2.43 8.61 2.1 8 2.43 7.39 2.95 6.49 3.37 5.85 3.8 5.22 4.25 4.59 4.73 3.98 5.14 3.46 5.57 2.95 6 2.47 6 2.47 6 0 6 0 5.79 0.22 5.58 0.44 5.37 0.67 4.58 1.52 3.84 2.38 3.15 3.26 2.46 4.14 1.84 4.99 1.29 5.82 0.75 6.65 0.32 7.38 0 8 0.32 8.62 0.75 9.35 1.29 10.18"
                                        fill="rgb(131,147,149)"></path></svg></span><span
                                class="inspector-header__title">Maquinas a Desplegar</span>
                        <span class="inspector-header__icon-container">
                    <img src="/desplegador/svg/icon-git.svg" class="inspector-header__service-icon">
                    </span>
                        <span class="inspector-header__icon-container">
                    <img src="/desplegador/svg/icon-jenkins.svg" class="inspector-header__service-icon">
                    </span>
                    </div>
                    <div class="inspector-content">
                        <div class="service-overview">
                            <h4 class="add-machine__title" style="margin: 20px">Lenguaje de programación</h4>
                            <div class="add-machine" style="margin: 0 20px">
                                <select class="add-machine_container java" id="language" style="margin:0">
                                    <option selected="" value="java">Java</option>
                                    <option value="c">C</option>
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="inspector-expose">
                           <ul class="inspector-expose__units">
                                <li class="inspector-expose__unit" tabindex="0" role="button">
                                    <div class="inspector-expose__unit-detail">
                                        Repositorio Central
                                    </div>
                                    <div class="inspector-expose__unit-detail">
                                        Se creara este repositorio dentro la maquina central y para cada alumno.
                                    </div>
                                </li>
                                <li class="inspector-expose__unit" tabindex="0" role="button">
                                    <div class="inspector-expose__unit-detail">
                                        Modificaciones
                                    </div>
                                    <div class="inspector-expose__unit-detail">
                                        Puedes agregar nuevos metodos y archivos al repositorio dentro de la instancia y cada alumno actualizar estos datos
                                        usando "git pull origin central" o "sh update" dentro de la carpeta de trabajo del alumno.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="machine-view">
        <div class="machine-view">
            <div class="machine-view__content">
                <div class="machine-view__column">
                    <div class="machine-view__header"><span>Directorio del Proyecto</span>
                        <div class="more-menu" style="margin-top: 15px;">
                        <span class="more-menu__toggle" role="button" tabindex="0">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#contextual-menu-16"></use>
                            </svg>
                        </span>
                        </div>

                    </div>
                    <div class="machine-view__column-content">
                        <div>
                            <ul class="machine-view__list">
                            <li class="machine-view__unplaced-unit" draggable="true"><img src="/desplegador/svg/icon-user-root.svg" alt="Amazon" class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;"><span>Directorio del portafolio</span>
                                <div class="more-menu"><span class="more-menu__toggle" role="button" tabindex="0"><svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#contextual-menu-16"></use></svg></span></div>
                                <ul id="treeDemo" class="ztree"></ul>
                                </li>
                              </ul>
                        </div>
                        <div class="machine-view__column-drop-target">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                <use xlink:href="#add_16"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="machine-view__column">
                    <div class="machine-view__header"><span>Archivos fuentes default</span>
                        <div class="more-menu" style="margin-top: 15px;">
                        <span class="more-menu__toggle" role="button" tabindex="0">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                        xlink:href="#contextual-menu-16"></use>
                            </svg>
                        </span>
                        </div>
                    </div>
                    <div class="machine-view__column-onboarding" id="message-instance">
                        <br>
                        <div>
                            <ul class="machine-view__list">
                                <li class="machine-view__unplaced-unit" draggable="true"><img src="/desplegador/svg/icon-java.svg" alt="Amazon" class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;"><span>Visor de Archivos</span>
                                    <div class="more-menu"><span class="more-menu__toggle" role="button" tabindex="0"><svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#contextual-menu-16"></use></svg></span></div>
                                    <pre id="estado" class="brush: java;">Seleccione un archivo para visualizarlo</pre>
                                </li>
                            </ul>
                        </div>
                        <div class="machine-view__column-drop-target">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                <use xlink:href="#add_16"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="machine-view__column">
                    <div class="machine-view__header"><span>Software Instalado</span>
                        <div class="more-menu" style="margin-top: 15px;"><span class="more-menu__toggle" role="button"
                                                     tabindex="0"><svg
                                        class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                            xlink:href="#contextual-menu-16"></use></svg></span></div>
                    </div>
                        <div class="machine-view__column-onboarding" id="message-instance">
                            <br>
                            <div>
                                <ul class="machine-view__list">
                                    <li class="machine-view__unplaced-unit" draggable="true"><img src="/desplegador/svg/icon-jenkins.svg" alt="Amazon" class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;"><span>Software de Recoplación</span>
                                        <div class="more-menu"><span class="more-menu__toggle" role="button" tabindex="0"><svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#contextual-menu-16"></use></svg></span></div>
                                        <h4 class="add-machine__title" style="margin: 20px">Auto Instalación Jenkins</h4>
                                        <img src="/desplegador/img/jenkins-job.png"/>
                                        <h4 class="add-machine__title" style="margin: 20px">Analisis del código SonarQube</h4>
                                        <img src="/desplegador/img/sonar.png"/>
                                    </li>
                                </ul>
                            </div>
                            <div class="machine-view__column-drop-target">
                                <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                    <use xlink:href="#add_16"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <SCRIPT type="text/javascript">
        <!--
        var setting = {
            data: {
                key: {
                    title:"t"
                },
                simpleData: {
                    enable: true
                }
            },
            callback: {
                beforeClick: beforeClick,
                onClick: onClick
            }
        };

        var zNodes =[
            { id:1, pId:0, name:"Java", t:"Carpeta Raiz", open:true},
            { id:11, pId:1, name:"pom.xml", t:"<project xmlns=\"http://maven.apache.org/POM/4.0.0\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\nxsi:schemaLocation=\"http://maven.apache.org/POM/4.0.0 http://maven.apache.org/maven-v4_0_0.xsd\"><modelVersion>4.0.0</modelVersion><!-- project coordinates --><groupId>com.kdp.java</groupId><artifactId>Java-Projects</artifactId><version>1.0</version><packaging>pom</packaging><modules><module>JunitTesting</module></modules></project>"},
            { id:2, pId:1, name:"JunitTesting", t:"Carpeta de Codigo", open:true},
            { id:3, pId:2, name:"main", t:"Codigo que para el portafolio", open:true},
            { id:31, pId:3, name:"Greeting.java", t:"data"},
            { id:4, pId:2, name:"test", t:"Pruebas Unitarias", open:true},
            { id:41, pId:4, name:"GreetingTest.java", t:"please click on me.."}
        ];

        var log, className = "dark";
        function beforeClick(treeId, treeNode, clickFlag) {
            className = (className === "dark" ? "":"dark");
            return (treeNode.click != false);
        }
        function onClick(event, treeId, treeNode, clickFlag) {
            $("#estado .container .line").html(treeNode.t);
        }
        function showLog(str) {
            if (!log) log = $("#log");
            log.append("<li class='"+className+"'>"+str+"</li>");
            if(log.children("li").length > 8) {
                log.get(0).removeChild(log.children("li")[0]);
            }
        }
        function getTime() {
            var now= new Date(),
                    h=now.getHours(),
                    m=now.getMinutes(),
                    s=now.getSeconds();
            return (h+":"+m+":"+s);
        }

        $(document).ready(function(){
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        });
        //-->
    </SCRIPT>
@stop