@extends('layout.landing')

@section('seo')
    <title>Desplegador de Infraestructura para Portafolio Docente</title>
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

    <div class="wrapper">
        <div id="main-content">

            <div class="row row-hero" style="height: 600px;">
                <div class="topology" style="
    position: absolute; width:1000px; height: 600px; top: 0px;
    bottom: 0px;
    right: 0px;
    left: 0px;;
">
                    <div class="topology-canvas" style="width: 1366px; height: 100%;">

                        <div class="environment-menu top" id="relation-menu"></div>
                        <svg width="100%" height="100%" class="the-canvas">
                            <g transform="translate(40,-0.5) scale(1)">
                                <g pointer-events="all" class="service show hover is-selected" data-name="jenkins"
                                   transform="translate(240,100)" width="190" height="190">
                                    <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                            class="service-block__halo" id="circle-jenkins"></circle>
                                    <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                            class="service-block" width="190" height="190"
                                            style="fill: #b9b9b9;"></circle>
                                    <image class="service-icon" href="/desplegador/svg/icon-jenkins.svg" width="96"
                                           height="96" transform="translate(47, 47)"
                                           clip-path="url(#clip-mask)"></image>
                                </g>
                                <g pointer-events="all" class="service show hover is-selected" data-name="ansible"
                                   transform="translate(600,250)" width="190" height="190">
                                    <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                            class="service-block__halo" id="circle-ansible"
                                            style="animation: serviceBlockHaloSelected 1s alternate;"></circle>
                                    <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                            class="service-block" width="190" height="190"
                                            style="fill: #b9b9b9;"></circle>
                                    <image class="service-icon" href="/desplegador/svg/ansible.svg" width="96"
                                           height="96" transform="translate(47, 47)"
                                           clip-path="url(#clip-mask)"></image>
                                </g>

                                <g pointer-events="all" class="service show hover is-selected" data-name="java"
                                   transform="translate(800,30)" width="190" height="190">
                                    <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                            class="service-block__halo" id="circle-java"
                                            style="animation: serviceBlockHaloSelected 1s alternate;"></circle>
                                    <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                            class="service-block" width="190" height="190"
                                            style="fill: #b9b9b9;"></circle>
                                    <image class="service-icon" href="/desplegador/svg/icon-java.svg" width="96"
                                           height="96" transform="translate(47, 47)"
                                           clip-path="url(#clip-mask)"></image>
                                </g>

                                <g pointer-events="all" class="service show hover is-selected" data-name="git"
                                   transform="translate(340,410)" width="190" height="190"
                                   id="yui_3_11_0_1_1469134956262_905">
                                    <circle cx="95" cy="95" r="110" fill="transparent" stroke-dasharray="5, 5"
                                            class="service-block__halo" id="circle-git"
                                            style="animation: serviceBlockHaloSelected 1s alternate;"></circle>
                                    <circle cx="95" cy="95" r="90" fill="#f5f5f5" stroke-width="3" stroke="#19b6ee"
                                            class="service-block" width="190" height="190"
                                            style="fill: #b9b9b9;"></circle>
                                    <image class="service-icon" href="/desplegador/svg/icon-git.svg" width="96"
                                           height="96" transform="translate(47, 47)"
                                           clip-path="url(#clip-mask)"></image>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="inner-wrapper">
                    <div class="twelve-col align-center">
                        <h1 class="row-title accessibility-aid" itemprop="name">Despligues</h1>
                        <p class="intro">Plataforma en la Nube para la Gestión y Evaluación de Portafolios
                            Académicos</p>
                        <p><a href="/begin" class="button--inline-positive row-hero__cta-button">Comenzar</a></p>
                    </div>

                </div>
            </div>

            <div class="row row-scale" style="background-color: rgb(248, 248, 248);">
                <div class="inner-wrapper" style="background-image: url(/desplegador/img/informe-despliegue.png);
            background-repeat: no-repeat;
            background-position: top right;">
                    <div class="six-col row-scale__message">
                        <h2 class="row-title">Que hacemos por ti</h2>
                        <p>Despliegue de infraestructuras virtuales educativas que permitan automatizar la evaluación de
                            portafolios académicos</p>
                        <p>Herramienta de aprovisionamiento de instancias de cómputo configuradas específicamente para
                            dar soporte a determinadas actividades educacionales que requieran de un portafolio y su
                            consecuente evaluación.</p>
                    </div>
                </div>
            </div>
            <div class="row row--model-deploy-manage">
                <div class="inner-wrapper">
                    <div class="twelve-col align-center">
                        <h3 class="row--model-deploy-manage__title">Facilita poder desplegar instancias para tus
                            alumnos</h3>
                        <a href="#" class="button--inline-positive">Comenzar</a>

                    </div>
                </div>
            </div>


            <div id="detail" class="row strip-white" style="background-color: rgb(248, 248, 248);">
                <div class="inner-wrapper">
                    <div class="twelve-col">
                        <h2 class="row-title">Modo de despliegue de instancias</h2>
                    </div>

                    <div class="eight-col  align-center">
                        <img src="/desplegador/img/configuracion.png" alt="">
                    </div>

                    <div class="four-col last-col">
                        <div class="box">
                            <h3>Inicio</h3>
                            <p>Eliges el tipo de instancias a desplegar para la instancia central y las instancias para alumnos</p>
                            <h3>Selecciona</h3>
                            <ul>
                                <li>Seleciona el servicio Cloud a utilizar</li>
                                <li>El tipo de instancias que desplegaras</li>
                                <li>El lenguaje de programación entre C y Java</li>
                                <li>Cuentas de administrador</li>
                                <li>Cuentas de los alumnos</li>
                                <li>Cantidad de instancias a desplegar</li>
                                <li>Despliega</li>
                            </ul>
                        </div>

                        <div class="box">
                            <h3>Detalle</h3>
                            <p>Visualizar las cuentas creadas y los repositorios creados en las instancias desplegadas de
                                los distintos servicios desplegados</p>
                        </div>
                    </div>
                </div>

            </div>

            <div id="jenkins" class="row row-grey row--border-bottom row--bigdata">
                <div class="inner-wrapper">
                    <div class="four-col prepend-one append-one">
                        <img src="https://jenkins.io/images/226px-Jenkins_logo.svg.png" alt="Jenkins">
                    </div>
                    <div class="six-col last-col">
                        <h2>Jenkins</h2>
                        <p>La base de Jenkins son los job, donde indicamos qué es lo que hay que hacer en un build.
                            Por ejemplo, podríamos programar una tarea en la que se compruebe el repositorio de control
                            de versiones cada cierto tiempo, permite realizar la evaluacion del código realizado por
                            el Alumno.
                        </p>
                        <p><a href="/begin">Quieres comenzar a usar este servicio&nbsp;›››</a></p>
                    </div>
                </div>
            </div>

            <div class="row" id="demo" style="background-color: rgb(248, 248, 248);">
                <div class="inner-wrapper">
                    <div class="eight-col">
                        <h2>Videos</h2>
                    </div>
                    <div class="videos-feed twelve-col"><div class="four-col ">
                            <div class="video-container">
                                <iframe width="329" height="185" src="https://www.youtube.com/embed/Boeu_ISltqI" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <h3>Despliegue del Portafolio Virtual</h3>
                        </div>
                        <div class="four-col ">
                            <div class="video-container">
                                <iframe width="329" height="185" src="https://www.youtube.com/embed/RohFKsU6Zkg" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <h3>Lenguaje Java</h3>
                        </div>
                        <div class="four-col last-col">
                            <div class="video-container">
                                <iframe width="329" height="185" src="https://www.youtube.com/embed/R_70wb9OGqA" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <h3>Lenguaje C</h3>
                        </div></div>
                </div>
            </div>
            <div id="gitlab" class="row strip-dark">
                <div class="inner-wrapper">
                    <div class="six-col">
                        <h2>GitLab</h2>
                        <p class="intro">GitLab,es un repositorio de gestión de proyectos dotado de interfaz web. Nos permite llevar a cabo un seguimiento del estado actual y del histórico de los proyectos, ver los cambios y modificaciones producidas en el tiempo, además de gráficos.</p>
                        <p><a href="/begin">Comenzar&nbsp;›››</a></p>
                    </div>
                    <div class="six-col last-col">
                        <img src="/desplegador/svg/icon-gitlab.svg" alt="gitlab" style="height: 250px;width: 250px; margin-left: 20%">
                    </div>
                </div>
            </div>

            <div class="footer-wrapper strip-white" style="background-color: rgb(248, 248, 248);">
                <footer class="global clearfix">
                    <p class="top-link">
                        <a href="#">Subir</a>
                    </p>
                    <nav role="navigation" class="inner-wrapper">
                        <div class="row" style="background-color: rgb(248, 248, 248);">
                            <div class="seven-col">
                                <ul class="no-bullets seven-col">
                                    <li>
                                        <a href="#detail">
                                            Como Funciona
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#jenkins">
                                            Jenkins
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#demo">
                                            Demos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#gitlab">
                                            Gitlab
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/begin">
                                            Comenzar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="five-col last-col">
                                <div class="five-col"><a href="/begin" class="button--inline-neutral right start-modelling-button">Comenzar</a></div>
                            </div>
                        </div>
                    </nav>
                </footer>
            </div>

    <!-->
        </div><!-- /.inner-wrapper -->

    </div><!-- /.wrapper -->
@stop