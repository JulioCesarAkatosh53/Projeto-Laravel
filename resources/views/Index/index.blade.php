<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sistema de Eventos</title>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link  href="{{asset('css/semantic.min.css')}}"  rel="stylesheet" type="text/css"/>
        <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon" type="image/vnd.microsoft.icon" />   
        <link  href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <link  href="{{asset('css/icon.min.css')}}" rel="stylesheet" type="text/css"/>
        <script src="{{asset('js/jquery-3.1.1.min.js')}}"  type="text/javascript" ></script>
        <script  src="{{asset('js/semantic.min.js')}}" type="text/javascript" ></script>
        <script  src="{{asset('js/app.js')}}" type="text/javascript" ></script>
        <script  src="{{asset('js/app_e.js')}}" type="text/javascript" ></script>
        @yield('css')
    </head>
    <body>
        <!--        <div class="ui active inverted dimmer" id="loader">
                    <div class="ui large text loader">Carregando...</div>
                </div>-->
        <div class="ui grid">
        <!-- MOBILE -->
            <div class="mobile only row">
                <div class="ui sidebar vertical left menu overlay visible very thin icon" style="-webkit-transition-duration: 0.1s; overflow: visible !important; background-color: #006D44 !important;" id="sidebarMobile">
                    <div class="item logo">
                        <img src="img/LogoSysraBranca.png"  style="display: none" id="imgBig"/>
                        <img src="img/intra_bola_branca.png" id="imgSmall" />
                    </div>
                    <div class="ui accordion displaynone">
                        <a class="item notContent" id="paginaInicial">
                            <p class="pTitle"><i class="home layout icon" id="iconSidebar"></i> <span id="textDrop">Página Inicial</span></p>
                        </a>
                        <a class="item notContent" id="voltar">
                            <p class="pTitle"><i class="arrow alternate circle left outline icon" id="iconSidebar"></i> <span id="textDrop">Voltar</span></p>
                        </a>
                        <a class="item notContent" id="pesquisaSatisfacao">
                            <p class="pTitle"><i class="search icon" id="iconSidebar"></i> <span id="textDrop">Pesquisa Satisfação</span></p>
                        </a>
                        <a class="title item" id="pessoa">
                            <p class="pTitle"><i class="user icon" id="iconSidebar"></i> <span id="textDrop">Pessoa</span> <i class="dropdown icon" id="dropdownIconSidebar"></i></p>
                        </a>
                        <div class="content" id="pessoa">
                            <div class="" id="subSubMenu">
                                <a class="title item" id="permissao">
                                    <p class="pTitle"><span style="">Permissão</span> <i class="dropdown icon" id="dropdownIconSidebarSub"></i></p>
                                </a>
                                <div class="content" id="permissao">
                                    <a class="item itemInSubMenu aLoadContainer" id="cadastrarPermissao" href="#!">Cadastrar Permissão
                                    </a>
                                    <a class="item itemInSubMenu aLoadContainer" id="gerenciarPermissao" href="#!">Gerenciar Permissão
                                    </a>S
                                </div>
                            </div>
                            <a class="item itemNotInSubMenu notContent" id="cadastrarPessoa" href="#!"><span>Cadastrar Pessoa</span>
                            </a>
                            <a class="item itemNotInSubMenu notContent" id="gerenciarPessoa" href="#!"><span>Gerenciar Pessoa</span>
                            </a>
                        </div>
                    </div>
                    <div class="" id="iconesSidebarMenor">
                        <div class="ui dropdown item" id="dropdownToOneIcon">
                            <z class="displaynone">Página Inicial</z>
                            <i class="home layout icon" id="paginaInicial"></i>
                        </div>
                        <div class="ui dropdown item" id="dropdownToOneIcon">
                            <z class="displaynone">Voltar</z>
                            <i class="arrow alternate circle left outline icon" id="voltar"></i>
                        </div>
                        <div class="ui dropdown item" id="dropdownToOneIcon">
                            <z class="displaynone">Pesquisa Satisfação</z>
                            <i class="search icon" id="pesquisaSatisfacao"></i>
                        </div>
                        <div class="ui dropdown link item" id="dropdownToOneIcon">
                            <z class="displaynone">Pessoa</z>
                            <i class="user icon" id="pessoa"></i>
                            <div class="menu pessoa" id="dropwdownIcones">
                                <div class="header">
                                    Pessoa
                                </div>
                                <div class="ui divider"></div>
                                <a class="item" href="#!"> <i class="dropdown icon" style="margin-top: -2px !important;"></i>Permissão
                                    <div class="menu">
                                        <div class="item">Cadastrar Permissão</div>
                                        <div class="item">Gerenciar Permissão</div>
                                    </div>
                                </a>
                                <a class="item" href="#!">Cadastrar Pessoa</a>
                                <a class="item" href="#!">Gerenciar Pessoa</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- FIM MOBILE -->
             <!-- COMPUTER -->
             <div class="computer only row">
                <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow: visible !important; background-color: #006D44 !important;" id="sidebarPC">
                    <div class="item logo">
                        <img src="/img/LogoSysraBranca.png"  id="imgBig"/>
                        <img src="/img/intra_bola_branca.png" style="display: none"  id="imgSmall" />
                    </div>

                    <!-- SIDE BAR ABERTA -->
                    <div class="ui accordion">
                         <a class="item notContent{{ (request()->is('pesquisa'.'*')) ? ' active' : '' }}" id="pesquisa">
                            <p class="pTitle"><i class="search icon" id="iconSidebar"></i> <span id="textDrop">Pesquisa</span></p>
                        </a>
                        <a class="item notContent{{ (request()->is('paginaInicial'.'*')) ? ' active' : '' }}" id="paginaInicial">
                            <p class="pTitle"><i class="home layout icon" id="iconSidebar"></i> <span id="textDrop">Página Inicial</span></p>
                        </a>

                        <a class="item notContent{{ (request()->is('voltar'.'*')) ? ' active' : '' }}" id="voltar">
                            <p class="pTitle"><i class="arrow alternate circle left outline icon" id="iconSidebar"></i> <span id="textDrop">Voltar</span></p>
                        </a>

                        <a href="/Evento" class="item notContent{{ (request()->is('Evento'.'*')) ? ' active' : '' }}" id="Evento">
                            <p class="pTitle"><i class="calendar alternate icon" id="iconSidebar"></i> <span id="textDrop">Eventos</span></p>
                        </a>

                        <a  class="title item{{ (request()->is('pessoa'.'*')) ? ' active' : '' }}" id="minhasInscricoes" id="pessoa">
                            <p class="pTitle"><i class="user icon" id="iconSidebar"></i> <span id="textDrop">Pessoa</span> <i class="dropdown icon" id="dropdownIconSidebar"></i></p>
                        </a>
                        <div class="content{{ (request()->is('pessoa'.'*')) ? ' active' : '' }}" id="minhasInscricoes" id="pessoa">

                             <a href="/pessoa/minhasInscricoes" class="item itemNotInSubMenu notContent{{ (request()->is('pessoa/minhasInscricoes'.'*')) ? ' active' : '' }}" id="minhasInscricoes"    ><span>Minhas Inscrições</span>
                            </a>
                            <a href="/pessoa/solicitarEventos" class="item itemNotInSubMenu notContent{{ (request()->is('pessoa/solicitarEventos'.'*')) ? ' active' : '' }}" id="solicitarEventos"   ><span>Solicitar Eventos</span>
                            </a>
 
                        </div>


                        <a class="title item{{ (request()->is('admin'.'*')) ? ' active' : '' }}" id="admin">
                            <p class="pTitle"><i class="file alternate outline icon" id="iconSidebar"></i> <span id="textDrop">Administrador</span> <i class="dropdown icon" id="dropdownIconSidebar"></i></p>
                        </a>
                        <div class="content{{ (request()->is('admin'.'*')) ? ' active' : '' }}" id="admin">
 
                            <a href="/admin/cadastrarEvento" class="item itemNotInSubMenu notContent{{ (request()->is('admin/cadastrarEvento'.'*')) ? ' active' : '' }}" id="cadastrarEvento" ><span>Cadastrar Evento</span>
                            </a>
                            <a href="/admin/gerenciarEvento" class="item itemNotInSubMenu notContent{{ (request()->is('admin/gerenciarEvento'.'*')) ? ' active' : '' }}" id="gerenciarEvento" ><span>Gerenciar Evento</span>
                            </a>
                        </div>


                        <a class="item notContent" id="ajuda">
                            <p class="pTitle"><i class="question circle outline icon" id="iconSidebar"></i> <span id="textDrop">Ajuda</span></p>
                        </a>

                    </div>
                    <!-- FIM SIDE BAR ABERTA -->

                    <!-- SIDE BAR DESLIGADA -->
                    <div class="" id="iconesSidebarMenor">
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Pesquisa</z>
                            <i class="search icon" id="pesquisa"></i>
                        </div>

                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Página Inicial</z>
                            <i class="home layout icon" id="paginaInicial"></i>
                        </div>

                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Voltar</z>
                            <i class="arrow alternate circle left outline icon" id="voltar"></i>
                        </div>

                        <div  class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Eventos</z>
                            <a href="/Evento"><i class="calendar alternate outline icon" id="proximoEvento"></i></a>
                        </div>

                        <div class="ui dropdown link item displaynone" id="dropdownToOneIcon">
                            <z>Pessoa</z>
                            <i class="user icon" id="pessoa"></i>
                            <div class="menu pessoa" id="dropwdownIcones">
                                <div class="header">
                                    Pessoa
                                </div>
                                <div class="ui divider"></div>
                                <a class="item" href="/pessoa/minhasInscricoes">Minhas Inscrições</a>
                                <a class="item" href="/pessoa/solicitarEventos">Solicitar Eventos</a>
                            </div>
                        </div>



                             <div class="ui dropdown link item displaynone" id="dropdownToOneIcon">
                            <z>Administrador</z>
                            <i class="file alternate outline icon" id="publicarEvento"></i>
                            <div class="menu pessoa" id="dropwdownIcones">
                                <div class="header">
                                    Administrador
                                </div>
                                <div class="ui divider"></div>
                                <a class="item" href="/admin/cadastrarEvento">Cadastrar Evento</a>
                                <a class="item" href="/admin/gerenciarEvento">Gerenciar Evento</a>
                            </div>
                            
                        </div>


                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Ajuda</z>
                            <i class="question circle outline icon" id="ajuda"></i>
                        </div>

                    </div>
                    <!-- FIM DA SIDE BAR DESLIGADA -->
                </div>
            </div>
            <!-- FIM COMPUTER -->
            <div class="tablet only row">
                <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow: visible !important; background-color: #006D44 !important;" id="sidebarTablet">
                    <div class="item logo">
                        <img src="img/LogoSysraBranca.png"  id="imgBig"/>
                        <img src="img/intra_bola_branca.png" style="display: none"  id="imgSmall" />
                    </div>
                    <div class="ui accordion">
                        <a class="item notContent" id="paginaInicial">
                            <p class="pTitle"><i class="home layout icon" id="iconSidebar"></i> <span id="textDrop">Página Inicial</span></p>
                        </a>
                        <a class="item notContent" id="voltar">
                            <p class="pTitle"><i class="arrow alternate circle left outline icon" id="iconSidebar"></i> <span id="textDrop">Voltar</span></p>
                        </a>
                        <a class="item notContent" id="pesquisaSatisfacao">
                            <p class="pTitle"><i class="search icon" id="iconSidebar"></i> <span id="textDrop">Pesquisa Satisfação</span></p>
                        </a>
                        <a class="title item" id="pessoa">
                            <p class="pTitle"><i class="user icon" id="iconSidebar"></i> <span id="textDrop">Pessoa</span> <i class="dropdown icon" id="dropdownIconSidebar"></i></p>
                        </a>
                        <div class="content" id="pessoa">
                            <div class="" id="subSubMenu">
                                <a class="title item" id="permissao">
                                    <p class="pTitle"><span style="">Permissão</span> <i class="dropdown icon" id="dropdownIconSidebarSub"></i></p>
                                </a>
                                <div class="content" id="permissao">
                                    <a class="item itemInSubMenu aLoadContainer" id="cadastrarPermissao" href="#!">Cadastrar Permissão
                                    </a>
                                    <a class="item itemInSubMenu aLoadContainer" id="gerenciarPermissao" href="#!">Gerenciar Permissão
                                    </a>
                                </div>
                            </div>
                            <a class="item itemNotInSubMenu notContent" id="cadastrarPessoa" href="#!"><span>Cadastrar Pessoa</span>
                            </a>
                            <a class="item itemNotInSubMenu notContent" id="gerenciarPessoa" href="#!"><span>Gerenciar Pessoa</span>
                            </a>
                        </div>
                    </div>
                    <div class="" id="iconesSidebarMenor">
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Página Inicial</z>
                            <i class="home layout icon" id="paginaInicial"></i>
                        </div>
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Voltar</z>
                            <i class="arrow alternate circle left outline icon" id="voltar"></i>
                        </div>
                        <div class="ui dropdown item displaynone" id="dropdownToOneIcon">
                            <z>Pesquisa Satisfação</z>
                            <i class="search icon" id="pesquisaSatisfacao"></i>
                        </div>
                        <div class="ui dropdown link item displaynone" id="dropdownToOneIcon">
                            <z>Pessoa</z>
                            <i class="user icon" id="pessoa"></i>
                            <div class="menu pessoa" id="dropwdownIcones">
                                <div class="header">
                                    Pessoa
                                </div>
                                <div class="ui divider"></div>
                                <a class="item" href="#!"> <i class="dropdown icon" style="margin-top: -2px !important;"></i>Permissão
                                    <div class="menu">
                                        <div class="item">Cadastrar Permissão</div>
                                        <div class="item">Gerenciar Permissão</div>
                                    </div>
                                </a>
                                <a class="item" href="#!">Cadastrar Pessoa</a>
                                <a class="item" href="#!">Gerenciar Pessoa</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="pusher">
            <div class="ui fixed menu asd borderless" style="" id="navbarSistema">
                <div class="ui grid">
                    <div class="computer only row">
                        <a class="item openbtn">
                            <i class="icon content"></i>
                        </a>
                    </div>
                    <div class="mobile only row">
                        <a class="item openbtnmobile">
                            <i class="icon content"></i>
                        </a>
                    </div>
                    <div class="tablet only row">
                        <a class="item openbtntablet">
                            <i class="icon content"></i>
                        </a>
                    </div>
                </div>
                <div class="right menu" id="iconesNavbar">
                    <div class="ui grid">
                        <div class="computer only row">
                            <a class="item">
                                <i class="th icon big" id="system"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a class="item">
                                <i class="bell icon big" id="notifications"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a class="item">
                                <i class="user icon big" id="informationsUser"></i>
                                <!--<img class="ui avatar image openDivNone" id="informationsUser" src="img/user.png" style="cursor: pointer;">-->
                            </a>
                            &nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="ui popup bottom left transition hidden" id="popUpSystem">
                        <div class="ui one column relaxed equal height divided grid">
                            <div class="column">
                                <ul class="ulGeral" id="system">
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li> <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>
                                    <li class="liGeral" id="system">
                                        <a class="aGeral" id="system">
                                            <img src="img/logo_sysreserva.png" class="imgSys">
                                            <span>SysReserva</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Pop Up para sistemas -->
                    <div class="ui popup bottom left transition hidden" id="popUpNotifications">
                        <div class="ui one column relaxed equal height divided grid">
                            <div class="column">
                                <div class="ui comments" id="commentsNotifications">
                                    <h3 class="ui dividing header">Notificações</h3>
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="img/matt.jpg">
                                        </a>
                                        <div class="content">
                                            <a class="author">Emerson Henrique</a>
                                            <div class="metadata">
                                                <span class="date">Hoje as 09:40AM</span>
                                            </div>
                                            <div class="text">
                                                Termo de compromisso de estágio disponível para download
                                            </div>
                                            <!--                                            <div class="actions">
                                                                                            <a class="reply">Reply</a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="img/matt.jpg">
                                        </a>
                                        <div class="content">
                                            <a class="author">Emerson Henrique</a>
                                            <div class="metadata">
                                                <span class="date">Hoje as 09:40AM</span>
                                            </div>
                                            <div class="text">
                                                Termo de compromisso de estágio disponível para download
                                            </div>
                                            <!--                                            <div class="actions">
                                                                                            <a class="reply">Reply</a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="img/matt.jpg">
                                        </a>
                                        <div class="content">
                                            <a class="author">Emerson Henrique</a>
                                            <div class="metadata">
                                                <span class="date">Hoje as 09:40AM</span>
                                            </div>
                                            <div class="text">
                                                Termo de compromisso de estágio disponível para download
                                            </div>
                                            <!--                                            <div class="actions">
                                                                                            <a class="reply">Reply</a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Pop Up para sistemas -->
                    <div class="ui popup bottom left transition hidden" id="popUpInformationUser">
                        <div class="ui one column relaxed equal height divided grid">
                            <div class="column">
                                <div class="ui cards">
                                    <div class="card"  id="cardUser">
                                        <div class="content">
                                            <img class="right floated mini ui image" src="img/matt.jpg">
                                            <div class="header">
                                                Anderson Alves
                                            </div>
                                            <div class="meta">
                                                Administrador
                                            </div>
                                            <div class="description">
                                                Último acesso: Hoje, 01 de julho de 2019
                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <div class="ui two buttons">
                                                <div class="ui basic green button">Conta</div>
                                                <div class="ui basic red button">Sair</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui container containerPrincipal segment" id="containerToInformations" style="">
    
                    @yield('body')
                 

            </div>
        </div>
        @yield('js')
    </body>
</html>