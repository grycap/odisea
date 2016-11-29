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
                <li class="header-breadcrumb__list-item"><a href="{{url('/inicio',$parameters = [],$secure = null)}}"
                                                            class="header-breadcrumb--link">admin</a></li>
            </ul>
        </div>
    </div>

    <div class="header-banner header-banner--right">
        <ul class="header-banner__list--right">
            <li id="header-search-container" class="header-banner__list-item header-banner__list-item--no-padding">
                <div class="header-search">
                    <!--preguntas<form class="header-search__form">
                        <button type="submit" class="header-search__submit">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                <use xlink:href="#search_16"></use>
                            </svg>
                        </button>
                        <input type="search" name="query" class="header-search__input" placeholder="Información">
                    </form>-->
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
                    <span class="deployment-bar__import link" role="button" tabindex="0"
                          id="import">Importar<input id="upload" type="file" multiple size="50" accept="text/json" name="files[]"></span>
                    <textarea id='userExport' name='userExport' style='display:none;'>Descarga de User</textarea><a id='export' class="deployment-bar__export link" role="button" tabindex="0" href='#'>Exportar</a>
                    <a class="button--inline-neutral" href="{!! url('/') !!}" target="_blank" id="atras">Anterior</a>
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
                <li class="tab"><a data-view="service"><span>1</span><span id="message-central"> Maquina Central</span></a>
                </li>
                <li class="spacer">|</li>
                <li class="tab active"><a data-view="machine"><span id="count-machine-student">0</span><span> M. Alumnos</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div id="deployment-container" class="invisible">
        <div class="panel-component white-box">
            <div class="panel-component__inner">
                <div class="deployment-summary-classic">
                    <div class="deployment-summary-classic__header"><span id="close-modal"
                                class="deployment-summary-classic__close" tabindex="0" role="button"><svg class="svg-icon" viewBox="0 0 16 16"
                                                               style="width:16px;height:16px;"><use
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close_16"></use></svg></span>
                        <h2 class="deployment-summary-classic__title">Practicas a Realizar</h2>
                        <div class="deployment-summary-classic__placement"><span>Practicas a crear </span><span>4</span><span> para los alumno</span><span>s</span><span data-reactid=".a.0.0.0.2.4">, opción:</span><span> </span>
                            <form><input type="radio" data-placement="unplaced"
                                                                     id="leave-unplaced" name="placement"
                                                                     class="deployment-summary-classic__placement-radio" checked=""><span> </span><label for="leave-unplaced"
                                                                                     class="deployment-summary-classic__placement-label">Defecto</label><input type="radio" data-placement="placed" id="automatically-place"
                                                           name="placement"
                                                           class="deployment-summary-classic__placement-radio"><span> </span><label for="automatically-place"
                                                                                     class="deployment-summary-classic__placement-label">Avanzada</label></form>

                            <button class="button--inline-positive" type="button" id="add-practice">Agregar Practica</button>
                        </div>
                    </div>
                    <div class="deployment-summary-classic__content" id="practice-div">
                        <ul class="deployment-summary-classic__list" id="list-practice">
                            <li class="deployment-summary-change-item-classic deployment-summary-classic__list-header">
                                <span class="deployment-summary-change-item-classic__change" style="width: 21%;">Nombre de la Practica</span>
                                <span class="deployment-summary-change-item-classic__time" style="width: 38%; margin-left: 14px;">Repositorio de Practica</span>
                                <span class="deployment-summary-change-item-classic__time" style="width: 38%; margin-left: 14px;">Repositorio de Pruebas</span>
                            </li>
                            <li class="deployment-summary-change-item-classic" id="li-practice-1">
                                <span class="deployment-summary-change-item-classic__change" style="width: 21%;"><img
                                            src="/desplegador/svg/icon-git.svg" style="margin-top: 10px"
                                            alt="" class="deployment-summary-change-item-classic__icon">
                                    <span><input type="text" value="Practica 1" placeholder="Practica 1" class="constraints__input" id="practice-li-practice-1" minlength="3" maxlength="20" name="practice-li-practice-1" required="" style="
    margin-left: 0px;
    margin-right: 0px;
    width: 80%;
    float: right;
"></span>
                                </span>
                                <span class="deployment-summary-change-item-classic__change" style="width: 38%; margin-left: 10px;"><img
                                            src="/desplegador/svg/icon-git.svg" style="margin-top: 10px"
                                            alt="" class="deployment-summary-change-item-classic__icon">
                                    <span><input type="text" value="https://master-class:master-password@bitbucket.org/phantro/base-java.git" placeholder="https://master-class:master-password@bitbucket.org/phantro/base-java.git" class="constraints__input" id="repository-practice-li-practice-1" minlength="10" maxlength="100" name="repository-practice-li-practice-1" required="" style="
    margin-left: 0px;
    margin-right: 0px;
    width: 90%;
    float: right;
" disabled></span>
                                </span>
                                <span class="deployment-summary-change-item-classic__change" style="width: 38%; margin-left: 10px;"><img
                                            src="/desplegador/svg/icon-git.svg"
                                            alt="" class="deployment-summary-change-item-classic__icon" style="margin-top: 10px">
                                    <span><input type="text" class="constraints__input" id="repository-test-li-practice-1" value="https://master-class:master-password@bitbucket.org/phantro/base-java.git" placeholder="https://master-class:master-password@bitbucket.org/phantro/base-java.git" minlength="10" maxlength="100" name="repository-test-li-practice-1" required="" style="
    margin-left: 0px;
    margin-right: 0px;
    width: 90%;
    float: right;
" disabled></span>
                                </span>
                            </li>

                        </ul>
                    </div>
                    <div class="deployment-summary-classic__footer">
                        <button class="button--inline-deployment" id="close-modal-botton" type="button">Cerrar</button>
                    </div>
                </div>
            </div>
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
                            <ul class="service-overview__actions">
                                <li class="overview-action" title="Maquinas para Alumnos" tabindex="0" role="button"
                                    id="li-machine-student">
                                <span class="overview-action__icon"><svg
                                            class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xlink:href="#units"></use></svg></span>
                                    <span class="overview-action__title">Maquinas para Alumnos</span><span
                                            class="overview-action__link hidden"></span><span
                                            class="overview-action__value overview-action__value--type-all"
                                            id="count-student">0</span>
                                    <input type="number" id="machine-student" name="machine-student" min="0" max="99"
                                           minlength="1" maxlength="2" class="invisible" value="0"
                                           style="width: 40px;height: 24px;float: right;">
                                </li>
                                <li class="overview-action" title="Central" tabindex="0" role="button">
                                  <span class="overview-action__icon"><svg
                                              class="svg-icon" viewBox="0 0 16 16"
                                              style="width:16px;height:16px;"><use
                                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                                  xlink:href="#configure"></use></svg></span>
                                    <span class="overview-action__title">Maquina Central</span><span
                                            class="overview-action__link hidden"></span><span
                                            class="overview-action__value overview-action__value--type-uncommitted">1</span>
                                </li>
                                <li class="overview-action" title="Puertos" tabindex="0" role="button"><span
                                            class="overview-action__icon"><svg
                                                class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xlink:href="#exposed_16"></use></svg></span><span
                                            class="overview-action__title">Puertos</span><span
                                            class="overview-action__link hidden"></span><span
                                            class="overview-action__value">0</span>
                                </li>
                            </ul>

                        </div>
                        <div class="inspector-expose">
                            <div class="inspector-expose__control">
                                <div class="boolean-config">
                                    <div class="boolean-config--title">Ip Publica
                                    </div>
                                    <div class="boolean-config--toggle"><input
                                                type="checkbox" id="expose-toggle" checked=""
                                                class="boolean-config--input">
                                        <label for="expose-toggle" class="boolean-config--label">
                                            <div class="boolean-config--handle"></div>
                                        </label></div>
                                    <div class="boolean-config--description"></div>
                                </div>
                            </div>
                            <!--<p class="inspector-expose__warning">Por defecto se usa ip publica para la maquina central.</p>-->
                            <ul class="inspector-expose__units">
                                <li class="inspector-expose__unit" tabindex="0" role="button">
                                    <div class="inspector-expose__unit-detail">
                                        Maquina Central
                                    </div>
                                    <div class="inspector-expose__unit-detail">
                                        Jenkins, Git Server, SonarQube, Node.js
                                    </div>
                                </li>
                                <li class="inspector-expose__unit" tabindex="0" role="button">
                                    <div class="inspector-expose__unit-detail">
                                        Alumnos
                                    </div>
                                    <div class="inspector-expose__unit-detail">
                                        Git client, Java
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
                    <div class="machine-view__header"><span>Cuentas de Proveedor</span>
                        <button class="button--inline-positive" type="button" id="account-add">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                <use xlink:href="#add-light-16"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="machine-view__column-content">
                        <div>
                            <ul class="machine-view__list" id="account">
                                <li class="machine-view__unplaced-unit account" draggable="true" id="amazon">
                                    <img src="/desplegador/svg/aws.svg" alt="Amazon"
                                         class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;">
                                    <span>Amazon EC2</span>
                                    <div class="more-menu">
                                    <span class="more-menu__toggle" role="button" tabindex="0">
                                        <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                            <use xlink:href="#contextual-menu-16">
                                            </use>
                                        </svg>
                                    </span>
                                    </div>
                                    <div class="machine-view__unplaced-unit-drag-state">
                                    </div>
                                </li>
                                <li class="machine-view__unplaced-unit account" draggable="true" id="nebula">
                                    <img src="/desplegador/svg/open-nebula.svg" alt="Open Nebula"
                                         class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;">
                                    <span>Open Nebula</span>
                                    <div class="more-menu"><span class="more-menu__toggle" role="button" tabindex="0">
                                    <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                                xlink:href="#contextual-menu-16"></use></svg></span></div>
                                    <div class="machine-view__unplaced-unit-drag-state"></div>
                                </li>
                                <li class="machine-view__unplaced-unit account" draggable="true" id="ansible">
                                    <img src="/desplegador/svg/ansible.svg" alt="Amazon"
                                         class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;">
                                    <span>Ansible y RADL</span>
                                    <div class="more-menu">
                                    <span class="more-menu__toggle" role="button" tabindex="0">
                                        <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                            <use xlink:href="#contextual-menu-16">
                                            </use>
                                        </svg>
                                    </span>
                                    </div>
                                    <div class="machine-view__unplaced-unit-drag-state">
                                    </div>
                                </li>
                            </ul>
                            <form id="form-amazon">
                                <ul class="machine-view__list invisible" id="account-amazon">
                                    <li class="machine-view__unplaced-unit" id="data-account-amazon"
                                        draggable="true"><img src="/desplegador/svg/aws.svg" alt="Amazon"
                                                              class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;"><span>Cuenta de AWS EC2</span>
                                        <div class="more-menu"><span class="more-menu__toggle" role="button"
                                                                     tabindex="0"><svg
                                                        class="svg-icon" viewBox="0 0 16 16"
                                                        style="width:16px;height:16px;"><use
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="#contextual-menu-16"></use></svg></span></div>
                                        <div class="add-machine"><select id="zone">
                                                <option selected="" disabled="" value="">Zona de diponibilidad
                                                </option>
                                                <option disabled="" value="">America
                                                </option>
                                                <option selected="" value="us-east-1">us-east-1
                                                </option>
                                                <option value="us-west-1">us-west-1
                                                </option>
                                                <option value="us-west-2">us-west-2
                                                </option>
                                                <option value="sa-east-1">sa-east-1
                                                </option>
                                                <option disabled="" value="">Asia Pacific
                                                </option>
                                                <option value="ap-northeast-1">ap-northeast-1
                                                </option>
                                                <option value="ap-southeast-1">ap-southeast-1
                                                </option>
                                                <option value="ap-southeast-2">ap-southeast-2
                                                </option>
                                                <option disabled="" value="">Europe
                                                </option>
                                                <option value="eu-central-1">eu-central-1
                                                </option>
                                                <option value="eu-west-1">eu-west-1
                                                </option>
                                            </select>
                                            <div class="add-machine__constraints"><!--<h4
                                            class="add-machine__title">Estos campos son requeridos</h4>-->
                                                <div class="constraints">
                                                    <label for="key" class="constraints__label">Access Key ID</label>
                                                    <input type="text" class="constraints__input" id="key"
                                                           minlength="20" maxlength="20"
                                                           name="key" required>
                                                    <label for="secret" class="constraints__label">Secret Access
                                                        Key</label>
                                                    <input type="text" class="constraints__input" id="secret"
                                                           minlength="40" maxlength="40"
                                                           name="secret" required>
                                                </div>
                                            </div>
                                            <div class="button-row button-row--multiple button-row--count-2">
                                                <button class="button--base" type="button" id="cancel-amazon"
                                                        style="border: 1px solid #cdcdcd;">
                                                    Cancel
                                                </button>
                                                <button class="button--neutral" type="submit" id="acept-amazon"
                                                        style="background-color: #f57a1f;color: white;">Aceptar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="machine-view__unplaced-unit-drag-state"></div>
                                    </li>
                                    <li class="machine-view__unplaced-unit invisible" id="data-account-amazon-correct"
                                        draggable="true">
                                        <img src="/desplegador/svg/aws.svg" alt="Amazon"
                                             class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;"><span>Aceptada tu cuenta de Amazon</span>
                                        <div class="more-menu"><span class="more-menu__toggle" role="button"
                                                                     tabindex="0"><svg
                                                        class="svg-icon" viewBox="0 0 16 16"
                                                        style="width:16px;height:16px;"><use
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="#contextual-menu-16"></use></svg></span></div>
                                        <p></p>
                                        <p id="data-account-amazon-key" style="margin: 12px"></p>
                                        <div class="button-row button-row--multiple button-row--count-2">
                                            <button class="button--neutral" type="button"
                                                    id="data-account-amazon-correct-cancel"
                                                    style="background-color: #f57a1f;color: white;">Cancelar
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="machine-view__column-drop-target">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                <use xlink:href="#add_16"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="machine-view__column">
                    <div class="machine-view__header"><span>Instancias y Aplicaciones</span>
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
                        <p>Recomendaciones:</p>
                        <ul>
                            <li>Para elegir el tipo de instancia coloque su cuenta de algún servicio cloud.</li>
                            <li>Las pruebas automatizadas estan activas para los lenguajes Java, C.</li>
                            <li>Si optas por Ansible y RADL te podras descargar la receta para el despliegue "in
                                house"
                            </li>
                        </ul>
                        <!--<span class="link" role="button" tabindex="0">Add machine</span>-->
                    </div>
                    <div class="machine-view__column-content invisible" id="instance-amazon">
                        <h4 class="add-machine__title">Elegir el tipo de Instancia Central</h4>
                        <div class="add-machine">
                            <select class="add-machine_container instancia" style="margin:0" id="central-machine">
                                <option disabled="" value="">Tipo de Instancias
                                </option>
                                <option selected="" value="m1-small">M1 small</option>
                                <option value="t2-small">T2 small</option>
                            </select>
                        </div>
                        <br>
                        <div id="select-machine-student" class="invisible">
                            <h4 class="add-machine__title">Elegir el tipo de Instancia para alumnos</h4>
                            <div class="add-machine">
                                <select class="add-machine_container instancia" style="margin:0" id="student-machine">
                                    <option disabled="" value="">Tipo de Instancias
                                    </option>
                                    <option selected="" value="t1-micro">T1 micro</option>
                                    <option value="t2-micro">T2 micro</option>
                                    <option value="m1-small">M1 small</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <h4 class="add-machine__title">Lenguaje de programación a impartir</h4>
                        <div class="add-machine">
                            <select class="add-machine_container java" id="language" style="margin:0">
                                <option selected="" value="java">Java</option>
                                <option value="c">C</option>
                            </select>
                        </div>
                        <br>
                        <h4 class="add-machine__title">Número de praticas a impartir</h4>
                        <ul class="machine-view__list" id="new-add-practice">
                            <li class="machine-view__unplaced-unit" draggable="true" style="background-color: #f48d28;
    border-radius: 2px;
    color: white;">
                                <img src="/desplegador/svg/icon-user-plus.svg" alt="Add practice"
                                     class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;">
                                <span id ="number-practice">1 Practica</span>
                                <div class="more-menu">
                                    <span class="more-menu__toggle" role="button" tabindex="0">
                                        <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="#contextual-menu-16">
                                            </use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="machine-view__unplaced-unit-drag-state">
                                </div>
                            </li>
                        </ul>
                        <div class="machine-view__column-drop-target">
                            <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                <use xlink:href="#add_16"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="machine-view__column">
                    <div class="machine-view__header"><span>Cuentas de Usuario</span>
                        <div class="more-menu" style="margin-top: 15px;"><span class="more-menu__toggle" role="button"
                                                                               tabindex="0"><svg
                                        class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                            xlink:href="#contextual-menu-16"></use></svg></span></div>
                    </div>
                    <div class="machine-view__column-content">
                        <ul class="machine-view__list">
                            <li class="machine-view__unplaced-unit" draggable="true"><img
                                        src="/desplegador/svg/icon-user-root.svg" alt="Amazon"
                                        class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;"><span>Usuario con todo los privilegios</span>
                                <div class="more-menu"><span class="more-menu__toggle" role="button" tabindex="0"><svg
                                                class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;"><use
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xlink:href="#contextual-menu-16"></use></svg></span></div>
                                <div class="add-machine">
                                    <div class="add-machine__constraints">
                                        <br>
                                        <div class="constraints">
                                            <label for="username-root" class="constraints__label">Nombre de
                                                Usuario</label>
                                            <input type="text" class="constraints__input" id="username-root"
                                                   minlength="8" maxlength="20" placeholder="adminapp"
                                                   name="username-root" required>
                                            <label for="password-root" class="constraints__label">Contraseña</label>
                                            <input type="text" class="constraints__input" id="password-root"
                                                   minlength="8" maxlength="20" placeholder="adminapp"
                                                   name="password-root" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="machine-view__unplaced-unit-drag-state"></div>
                            </li>
                        </ul>
                        <div id="new-student">
                            <ul class="machine-view__list" id="alumno1">
                                <li class="machine-view__unplaced-unit" draggable="true"><img
                                            src="/desplegador/svg/icon-user.svg" alt="Amazon"
                                            class="machine-view__unplaced-unit-icon"
                                            style="border-radius: 0; -webkit-clip-path: none;"><span>Cuentas del Alumno 1</span>
                                    <div class="more-menu" id="close-student"><span class="more-menu__toggle"
                                                                                    role="button" tabindex="0"><svg
                                                    class="svg-icon" viewBox="0 0 16 16"
                                                    style="width:16px;height:16px;"><use
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="#contextual-menu-16"></use></svg></span></div>
                                    <div class="add-machine">
                                        <div class="add-machine__constraints"><br>
                                            <div class="constraints"><label for="username-alumno1"
                                                                            class="constraints__label">Nombre de
                                                    Usuario</label> <input type="text" class="constraints__input"
                                                                           id="username-alumno1" name="username-alumno1"
                                                                           minlength="8" maxlength="20"
                                                                           placeholder="studentapp" required> <label
                                                        for="password-alumno1"
                                                        class="constraints__label">Contraseña</label> <input type="text"
                                                                                                             class="constraints__input"
                                                                                                             id="password-alumno1"
                                                                                                             name="password-alumno1"
                                                                                                             minlength="8"
                                                                                                             maxlength="20"
                                                                                                             placeholder="studentapp"
                                                                                                             required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="machine-view__unplaced-unit-drag-state"></div>
                                </li>
                            </ul>
                        </div>
                        <ul class="machine-view__list" id="add-student">
                            <li class="machine-view__unplaced-unit" draggable="true" style="background-color: #f48d28;
    border-radius: 2px;
    color: white;">
                                <img src="/desplegador/svg/icon-user-plus.svg" alt="Amazon"
                                     class="machine-view__unplaced-unit-icon" style="border-radius: 0;
    -webkit-clip-path: none;">
                                <span>Agregar más Alumnos</span>
                                <div class="more-menu">
                                    <span class="more-menu__toggle" role="button" tabindex="0">
                                        <svg class="svg-icon" viewBox="0 0 16 16" style="width:16px;height:16px;">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="#contextual-menu-16">
                                            </use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="machine-view__unplaced-unit-drag-state">
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var account = {"usernameAccount": null, "passwordAccount": null, "type": null, "zone": null};
            var machine = {"centerMachine": 1, "studentMachine": 0};
            var public = {"ipPublica": true, "puertosNew": false};
            var central = {"usernameCentral": "adminapp", "passwordCentral": "adminapp"};
            var student = {"countStudent": 0};
            var proyect = {"countProyect": 0};
            var instance = {"center": null, "student": null};
            var language = {"language":"java"};
            var repository = {"java":{"name":"https://master-class:master-password@bitbucket.org/phantro/base-java.git","central":"https://master-class:master-password@bitbucket.org/phantro/base-java.git"},"c":{"name":"https://master-class:master-password@bitbucket.org/phantro/completo-prueba.git","central":"https://master-class:master-password@bitbucket.org/phantro/prueba-unitaria-c.git"}};

            $("#amazon").click(function (e) {
                $("#account-amazon").removeClass('invisible');
                $("#account").addClass('invisible');
            });
            $("#azure").click(function (e) {
                alert("No disponible por el momento");
            });
            $("#nebula").click(function (e) {
                alert("No disponible por el momento");
            });
            $("#ansible").click(function (e) {
                alert("No disponible por el momento");
            });
            $("#cancel-amazon").click(function (e) {
                $("#account").removeClass('invisible');
                $("#account-amazon").addClass('invisible');
            });

            $("#close-modal,#close-modal-botton").click(function (e) {
                $("#deployment-container").addClass('invisible');
            });

            $("#new-add-practice").click(function (e) {
                $("#deployment-container").removeClass('invisible');
            });

            $("#form-amazon").submit(function (e) {
                var retValue = validateAccountAws();
                if (retValue.status) {
                    $("#data-account-amazon-correct").removeClass('invisible');
                    $("#data-account-amazon").addClass('invisible');
                    $("#instance-amazon").removeClass('invisible');
                    $("#message-instance").addClass('invisible');
                    account.usernameAccount = $("#key").val();
                    account.passwordAccount = $("#secret").val();
                    account.type = "EC2";
                    account.zone = $("#zone").val();
                    $("#data-account-amazon-key").html("Access Key ID: " + account.usernameAccount);
                    e.preventDefault();
                } else {
                    $("body").overhang({
                        type: "error",
                        message: retValue.msgSecret + " " + retValue.msgkey,
                        closeConfirm: true
                    });
                    e.preventDefault();
                }
            });

            $("#data-account-amazon-correct-cancel").click(function (e) {
                $("#data-account-amazon-correct").addClass('invisible');
                $("#data-account-amazon").removeClass('invisible');
                account = {"usernameAccount": "", "passwordAccount": "", "type": ""};
                $("#message-instance").removeClass('invisible');
                $("#instance-amazon").addClass('invisible');
            });
            $("#language").change(function (e) {
                var languageId = $("#language");
                var seleccion = languageId.val();
                if (seleccion == 'java') {
                    languageId.removeClass('c').addClass('java');
                    language.language = 'java';
                    changeProyect(seleccion);
                    console.log(language);
                } else {
                    languageId.removeClass('java').addClass('c');
                    language.language = 'c';
                    console.log(language);
                    changeProyect(seleccion);
                }
            });
            $("#add-student").click(function (e) {
                var studentView = $("#new-student");
                var numberCount = studentView.children().length;
                numberCount++;
                var html = '<ul class="machine-view__list" id="alumno' + numberCount + '"> <li class="machine-view__unplaced-unit" draggable="true"><img src="/desplegador/svg/icon-user.svg" alt="Amazon" class="machine-view__unplaced-unit-icon" style="border-radius: 0; -webkit-clip-path: none;"><span>Cuentas del Alumno ' + numberCount + '</span> <div class="more-menu" id="close-student"><img src="/desplegador/img/toggle-off-inactive.png" class="inspector-header__service-icon" style="width:16px;height:16px;margin:5px"></div><div class="add-machine"> <div class="add-machine__constraints"><!--<h4 class="add-machine__title">Estos campos son requeridos</h4>--> <br><div class="constraints"> <label for="username-alumno' + numberCount + '" class="constraints__label">Nombre de Usuario</label> <input type="text" class="constraints__input" id="username-alumno' + numberCount + '" name="username-alumno' + numberCount + '" minlength="8" maxlength="20" required> <label for="password-alumno' + numberCount + '" class="constraints__label">Contraseña</label> <input type="text" class="constraints__input" id="password-alumno' + numberCount + '" name="password-alumno' + numberCount + '" minlength="8" maxlength="20" required> </div></div></div><div class="machine-view__unplaced-unit-drag-state"></div></li></ul>';
                studentView.append(html);
            });

            $("#add-practice").click(function (e) {
                var practice = $("#list-practice");
                var numberCount = practice.children().length;
                var repositoryName = '';
                var centralName = '';
                var languageId = $("#language");
                var seleccion = languageId.val();
                if (seleccion == 'java') {
                    repositoryName = repository["java"].name;
                    centralName = repository["java"].central;
                }else{
                    repositoryName = repository["c"].name;
                    centralName = repository["c"].central;
                }
                var html = '<li class="deployment-summary-change-item-classic" id="li-practice-' + numberCount + '"> <span class="deployment-summary-change-item-classic__change" style="width: 21%;"><img id="close-field-' + numberCount + '" src="/desplegador/img/close-orange.png" style="margin-top: 10px" alt="" class="deployment-summary-change-item-classic__icon"> <span><input type="text" value="Practica ' + numberCount + '" placeholder="Practica ' + numberCount + '" class="constraints__input" id="practice-li-practice-' + numberCount + '" minlength="3" maxlength="20" name="practice-li-practice-' + numberCount + '" required="" style=" margin-left: 0px; margin-right: 0px; width: 80%; float: right;"></span> </span> <span class="deployment-summary-change-item-classic__change" style="width: 38%; margin-left: 10px;"><img src="/desplegador/svg/icon-git.svg" style="margin-top: 10px" alt="" class="deployment-summary-change-item-classic__icon"> <span><input type="text" value="'+repositoryName+'" placeholder="'+repositoryName+'" class="constraints__input" id="repository-practice-li-practice-' + numberCount + '" minlength="10" maxlength="100" name="repository-practice-' + numberCount + '" required="" style=" margin-left: 0px; margin-right: 0px; width: 90%; float: right;" disabled></span> </span> <span class="deployment-summary-change-item-classic__change" style="width: 38%; margin-left: 10px;"><img src="/desplegador/svg/icon-git.svg" alt="" class="deployment-summary-change-item-classic__icon" style="margin-top: 10px"> <span><input type="text" value="'+centralName+'" placeholder="'+centralName+'" class="constraints__input" id="repository-test-li-practice-' + numberCount + '" minlength="10" maxlength="100" name="repository-test-li-practice-' + numberCount + '" required="" style=" margin-left: 0px; margin-right: 0px; width: 90%; float: right;" disabled></span> </span></li>';
                $("#number-practice").html(numberCount+" Practica");
                practice.append(html);
            });

            $("#new-student").on('click', 'div.more-menu', function () {
                var divPadre = $(this).parents('ul').attr("id");
                if (divPadre != "alumno1") {
                    $("#" + divPadre).remove();
                }
            });

            $("#practice-div").on('click', 'img.deployment-summary-change-item-classic__icon', function () {
                var liRemove = $(this).parents('li').attr("id");
                $("#" + liRemove).remove();
                var practice = $("#list-practice");
                var numberCount = practice.children().length;
                numberCount --;
                $("#number-practice").html(numberCount+" Practica");
            });

            $("#li-machine-student").click(function (e) {
                var studentView = $("#machine-student");
                studentView.removeClass('invisible');
                $("#count-student").addClass('invisible');
                studentView.focus();
            });

            $("#machine-student").keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    eventIntroMachineStudent();
                }
            });

            function eventIntroMachineStudent() {
                var count = $("#count-student");
                var studentMahine = $("#machine-student");
                var select = $("#select-machine-student");
                var countStudent = $("#count-machine-student");
                if (!isNaN(studentMahine.val()) && studentMahine.val() >= 0 && studentMahine.val() <= 99) {
                    count.html(studentMahine.val());
                    countStudent.html(studentMahine.val());
                    machine.studentMachine = studentMahine.val();
                    studentMahine.addClass('invisible');
                    count.removeClass('invisible');
                    if (studentMahine.val() == 0) {
                        select.addClass('invisible');
                    } else {
                        select.removeClass('invisible');
                    }
                    $("#despliegue").html("Despliegue (" + (1 + parseInt(studentMahine.val())) + ")");
                }
            }

            $("#machine-student").focusout(function (e) {
                eventIntroMachineStudent();
            });
            $("#message-central").click(function (e) {
                $("body").overhang({
                    type: "success",
                    message: "Se desplegara una maquina central donde puedes tener varias cuentas de alumnos en la misma maquina o crear maquinas independientes para los alumnos",
                    closeConfirm: true
                });
            });


            $("#despliegue").click(function (e) {
                var loading = $("#loading");
                loading.removeClass('invisible');
                instance.center = $("#central-machine").val();
                instance.student = $("#student-machine").val();
                var result = verify();
                if (result === true) {
                    var jsonData = jsonConcat(account, machine);
                    var jsonData1 = jsonConcat(public, central);
                    var jsonData2 = jsonConcat(student, instance);
                    var jsonData3 = jsonConcat(jsonData, jsonData1);
                    var jsonData4 = jsonConcat(proyect, jsonData2);
                    jsonData3 = jsonConcat(jsonData3, jsonData4);
                    jsonData3 = jsonConcat(jsonData3, language);
                    console.log(jsonData3);
                    $.ajax({
                        type: 'post',
                        url: "/deploy",
                        dataType: 'json',
                        data: jsonData3,
                        success: function (data) {
                            console.log(data);
                            if (data.status == 200 && data.error == false) {
                                location.href = "/resume/" + language.language + "/" + data.id;
                            } else {
                                alert("ocurrio un error");
                                loading.addClass('invisible');
                                student = {"countStudent": 0};
                                proyect = {"countProyect": 0};

                            }
                        },
                        error: function (data) {
                            console.log('Error:', data);
                            loading.addClass('invisible');
                            alert("Ocurrio un error vuelva a intertarlo");
                            student = {"countStudent": 0};
                            proyect = {"countProyect": 0};
                        }
                    });
                } else {
                    student = {"countStudent": 0};
                    proyect = {"countProyect": 0};
                    loading.addClass('invisible');
                }
            });

            $("#account-add").click(function (e) {
                $("body").overhang({
                    type: "prompt",
                    message: "Sugerencia de servicio a incorporar"
                });
            });

            function verify() {
                if (account.usernameAccount == null && account.passwordAccount == null && account.type == null) {
                    $("body").overhang({
                        type: "error",
                        message: "Seleccione un tipo de cuenta cloud para desplegar la Instancia"
                    });
                    return false;
                }
                var retProyect = verifyProyect();
                var retStudent = verifyStudent();
                var retCentral = userCentral();
                if (retCentral.status && retStudent.status && retProyect.status) {
                    //alert("correcto");
                    return true;
                } else {
                    $("body").overhang({
                        type: "error",
                        message: retCentral.msg + " " +  retStudent.msg + " " + retProyect.msg,
                        closeConfirm: true
                    });
                }
                return false;
            }

            function jsonConcat(o1, o2) {
                for (var key in o2) {
                    o1[key] = o2[key];
                }
                return o1;
            }

            function verifyStudent() {
                var studentId = $("#new-student");
                var numberCount = studentId.children().length;
                var retValue = {};
                retValue.status = true;
                retValue.msg = "";
                console.log("número de alumnos: " + numberCount);
                for (var i = 0; i < numberCount; i++) {
                    var key = "user" + (i + 1);
                    var newStudent = {};
                    var id = studentId.children()[i].id;
                    if (i == 0 && $("#username-" + id).val() == "") {
                        student.countStudent++;
                        newStudent[key] = {"username": "studentapp", "password": "studentapp"};
                    } else {
                        var username = $("#username-" + id);
                        var password = $("#password-" + id);
                        var validation = validateUserPassword(username, password);
                        if (validation.status) {
                            student.countStudent++;
                            newStudent[key] = {"username": username.val(), "password": password.val()};
                        } else {
                            retValue.status = false;
                            retValue.msg = validation.msg;
                        }
                    }
                    student = jsonConcat(student, newStudent);
                    console.log(student);
                }
                return retValue;
            }
                function verifyProyect() {
                    var practiceId = $("#list-practice");
                    var numberCount = practiceId.children().length;
                    var retValue = {};
                    retValue.status = true;
                    retValue.msg = "";
                    console.log("número de proyectos: " + numberCount);
                    for (var i = 1; i < numberCount; i++) {
                        var key = "proyect" + i ;
                        var newProyect = {};
                        var id = practiceId.children()[i].id;
                        if (i == 0 && $("#practice-" + id).val() == "") {//aumentar la condicional en caso del caso avanzado
                            proyect.countProyect++;
                            var repositoryName = "";
                            var centralName = "";
                            if (seleccion == 'java') {
                                repositoryName = repository["java"].name;
                                centralName = repository["java"].central;
                            }else{
                                repositoryName = repository["c"].name;
                                centralName = repository["c"].central;
                            }
                            newProyect[key] = {"name": "Practica 1","practice": repositoryName, "central": centralName};
                        } else {
                            var name = $("#practice-" + id);
                            var practice = $("#repository-practice-" + id);
                            var central = $("#repository-test-" + id);
                            //en si esta la opción avanzada habilitada revisar las url de los repositorios
                            var validation = validateProyect(name);
                            if (validation.status) {
                                proyect.countProyect++;
                                newProyect[key] = {"name": name.val(), "practice": practice.val(), "central": central.val()};
                            } else {
                                retValue.status = false;
                                retValue.msg = validation.msg;
                            }
                        }
                        proyect = jsonConcat(proyect, newProyect);
                    }
                    return retValue;
                }

            function changeProyect(seleccion) {
                var practiceId = $("#list-practice");
                var numberCount = practiceId.children().length;
                var repositoryName = '';
                var centralName = '';
                if (seleccion == 'java') {
                    repositoryName = repository["java"].name;
                    centralName = repository["java"].central;
                }else{
                    repositoryName = repository["c"].name;
                    centralName = repository["c"].central;
                }
                for (var i = 1; i < numberCount; i++) {
                    var id = practiceId.children()[i].id;

                        var practice = $("#repository-practice-" + id);
                        var testCentral = $("#repository-test-" + id);
                        //en si esta la opción avanzada habilitada revisar las url de los repositorios
                        practice.val(repositoryName);
                        testCentral.val(centralName);
                    }

            }

            function validateUserPassword(username, password) {
                var retValue = {};
                retValue.status = false;
                retValue.msg = "";

                if (username.val().length >= 8 && username.val().length <= 20) {
                    if (username.val() != "copia" || username.val() != "central") {
                        retValue.status = true;
                    } else {
                        retValue.msg += "El Username 'copia' o 'central' son reservados intente con otro nombre, ";
                    }
                } else {
                    retValue.msg += "El Username debe de contener como minimo 8 caracteres y como maximo 20, ";
                }
                if (password.val().length >= 8 && password.val().length <= 20 && retValue.status) {
                    retValue.status = true;
                } else {
                    retValue.status = false;
                    retValue.msg += "El Password debe de contener como minimo 8 caracteres y como maximo 20, ";
                }
                return retValue;
            }

            function validateProyect(name) {
                var retValue = {};
                retValue.status = true;
                retValue.msg = "";

                if (name.val().length >= 5 && name.val().length <= 20) {
                } else {
                    retValue.status = false;
                    retValue.msg += "El nombre del proyecto tiene como minimo 5 letras para ser creado y un maximo de 20";
                }
                return retValue;
            }

            function userCentral() {
                var retValue = {};
                retValue.status = false;
                retValue.msg = "";
                var usernameCental = $("#username-root");
                var passwordCentral = $("#password-root");
                if (usernameCental.val() == "" && usernameCental.val().length == "") {
                    retValue.status = true;
                    return retValue;
                }
                var validation = validateUserPassword(usernameCental, passwordCentral);
                if (validation.status) {
                    retValue.status = true;
                    //central.username = usernameCental.val().replace( /[^-A-Za-z0-9]+/g, '-' ).toLowerCase();
                    central.usernameCentral = usernameCental.val();
                    central.passwordCentral = passwordCentral.val();
                } else {
                    retValue.msg = validation.msg;
                }
                return retValue;
            }

            function validateAccountAws() {
                var retValue = {};
                retValue.status = false;
                retValue.msgSecret = "";
                retValue.msgkey = "";
                var secret = validateSecretKeyValue();
                var key = validateAccessKeyValue();
                if (secret.status && key.status) {
                    retValue.status = true;
                } else {
                    retValue.msgSecret = secret.msg;
                    retValue.msgkey = key.msg;
                }
                return retValue;
            }

            function validateAccessKeyValue() {
                var name = $("#key").val();
                var retValue = {};
                retValue.msg = "";
                if (name == "") {
                    retValue.status = false;
                    retValue.msg = "Esta vacio";
                } else if (name.length < 20 || name.length > 20 || name.charAt(0) != 'A' || name.charAt(1) != 'K') {
                    retValue.status = false;
                    retValue.msg = "AccessKey tiene un mínimo de 20 caracteres y comienza con 'AK'";
                } else {
                    retValue.status = true;
                }
                return retValue;
            }

            function validateSecretKeyValue() {
                var name = $("#secret").val();
                var retValue = {};
                retValue.msg = "";
                if (name == "") {
                    retValue.status = false;
                    retValue.msg = "El campo esta vacio";
                } else if (name.length != 40) {
                    retValue.status = false;
                    retValue.msg = "Secret Access Key debe contener 40 caracteres";
                } else {
                    retValue.status = true;
                }
                return retValue;
            }

            function handleFileSelect(evt) {
                var files = evt.target.files; // FileList object

                // use the 1st file from the list
                f = files[0];

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function(theFile) {
                    return function(e) {
                        console.log(e.target.result);
                        var objectUser;
                        try {
                            objectUser = JSON.parse(e.target.result);
                        }catch(e) {
                            console.log("Error al leer el archivo verifique la sintaxis : ".e);
                        }
                        if (typeof objectUser !== "undefined") {
                            //alert("Correcto");
                            var studentView = $("#new-student");
                            var numberCount = studentView.children().length;
                            try {
                                for (var i = 1; i <= objectUser.countStudent; i++) {
                                    var name = "user"+i;
                                    var studentAccount = objectUser[name];
                                    if(i == 1){
                                        $("#username-alumno1").val(studentAccount.username);
                                        $("#password-alumno1").val(studentAccount.password);
                                    }else{
                                        numberCount++;
                                        var html = '<ul class="machine-view__list" id="alumno' + numberCount + '"> <li class="machine-view__unplaced-unit" draggable="true"><img src="/desplegador/svg/icon-user.svg" alt="Amazon" class="machine-view__unplaced-unit-icon" style="border-radius: 0; -webkit-clip-path: none;"><span>Cuentas del Alumno ' + numberCount + '</span> <div class="more-menu" id="close-student"><img src="/desplegador/img/toggle-off-inactive.png" class="inspector-header__service-icon" style="width:16px;height:16px;margin:5px"></div><div class="add-machine"> <div class="add-machine__constraints"><!--<h4 class="add-machine__title">Estos campos son requeridos</h4>--> <br><div class="constraints"> <label for="username-alumno' + numberCount + '" class="constraints__label">Nombre de Usuario</label> <input type="text" class="constraints__input" id="username-alumno' + numberCount + '" name="username-alumno' + numberCount + '" minlength="8" maxlength="20" value="'+studentAccount.username+'" required> <label for="password-alumno' + numberCount + '" class="constraints__label">Contraseña</label> <input type="text" class="constraints__input" id="password-alumno' + numberCount + '" name="password-alumno' + numberCount + '" minlength="8" maxlength="20" value="'+studentAccount.password+'" required> </div></div></div><div class="machine-view__unplaced-unit-drag-state"></div></li></ul>';
                                        studentView.append(html);
                                    }
                                }
                                $("body").overhang({
                                    type: "success",
                                    message: "Cuentas de Alumnos importadas con Exito"
                                });
                            }catch(e) {
                                alert("Error al Leer las cuentas de los usuarios : ".e);
                            }
                        }else{
                            alert("Incorrecto");
                        }
                    };
                })(f);

                reader.readAsText(f);
            }

            document.getElementById('upload').addEventListener('change', handleFileSelect, false);

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
            var dataToDownload = document.getElementById("userExport").value;
            createDownloadLink("export",dataToDownload,"user.json");
            $("#export").click(function () {
                student.countStudent = 0;
                verifyStudent();
                var anchor = document.getElementById("export");
                anchor.href = "data:Application/octet-stream," + encodeURIComponent(JSON.stringify(student));
            });

        });



    </script>
@stop
