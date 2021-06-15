<?php

require 'assets/sys/config.php';
require 'assets/sys/init.php';

if (!$user -> LoggedIn())
{
header('Location: index.php');
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CulturaWeb</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- CSS Principal -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    

  </head>
  <body>
    <div class="sidebar">
        <div class="logo-div">
            <div class="logo">
                <div class="culturaweb">CulturaWeb</div>
            </div>
            <i class="bx bx-menu" id="btn-menu"></i>
        </div>
        <ul class="side-menu">
            <li>
                    <i class="bx bx-search" id="btn-search"></i>
                    <input type="text" placeholder="Pesquisar...">
                    <span class="info">Pesquisar</span>
            </li>
            <li style="margin-top: 5vh">
                <a href="#">
                    <i class="bx bxs-home"></i>
                    <span class="side-link">Principal</span>
                </a>
                <span class="info">Principal</span>
            </li>
            <li>
                <a href="#">
                    <i><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 332.804 332.804" style="enable-background:new 0 0 332.804 332.804;" xml:space="preserve"> <g> <g> <g> <path d="M330.804,171.002c-3.6-6.4-12-8.8-18.8-4.8l-45.6,26.4l-11.6,6.8v63.2l10.8,6.4c0.4,0,0.4,0.4,0.8,0.4l44.8,26 c2,1.6,4.8,2.4,7.6,2.4c7.6,0,13.6-6,13.6-13.6v-53.6l0.4-52.8C332.804,175.402,332.404,173.002,330.804,171.002z"/> <path d="M64.404,150.602c35.6,0,64.4-28.8,64.4-64.4c0-35.6-28.8-64.4-64.4-64.4s-64.4,28.8-64.4,64.4 C-0.396,121.802,28.804,150.602,64.404,150.602z M64.404,59.802c14.8,0,26.4,12,26.4,26.4c0,14.8-12,26.4-26.4,26.4 c-14.4,0-26.4-12-26.4-26.4C37.604,71.402,49.604,59.802,64.404,59.802z"/> <path d="M227.604,154.202c-10.4,5.2-22,8.4-34.4,8.4c-15.2,0-29.6-4.4-41.6-12.4h-45.6c-12,8-26.4,12.4-41.6,12.4 c-12.4,0-24-2.8-34.4-8.4c-9.2,5.2-15.6,15.6-15.6,26.8v97.6c0,18,14.8,32.4,32.4,32.4h164.4c18,0,32.4-14.8,32.4-32.4v-97.6 C243.204,169.802,236.804,159.402,227.604,154.202z"/> <path d="M193.204,150.602c35.6,0,64.4-28.8,64.4-64.4c0-35.6-28.8-64.4-64.4-64.4c-35.6,0-64.4,28.8-64.4,64.4 C128.804,121.802,157.604,150.602,193.204,150.602z M193.204,59.802c14.8,0,26.4,12,26.4,26.4c0,14.8-12,26.4-26.4,26.4 c-14.4,0-26.4-12-26.4-26.4C166.804,71.402,178.404,59.802,193.204,59.802z"/> </g> </g> </svg></i>
                    <span class="side-link">Filmes/Series</span>
                </a>
                <span class="info">Filmes/Series</span>
            </li>
            <li>
                <a href="#">
                    <i><svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m286 444 223-48v-300l-233 40-3 133z" fill="#9c6750"/><path d="m3 411 224 33 19-181-10-125-233-33z" fill="#9c6750"/><path d="m227 444h59l-10-308-40 2z" fill="#844f3e"/></g><g fill="#f3d544"><path d="m484 406 28-7v-33l-8 1-3 20-17 7z"/><path d="m489 96 23-4v29l-7-1-1-16-13-2z"/><path d="m0 129v-28l26 4-2 8-15 1-3 14z"/></g><g><path d="m256 159-226-103-7 337 239 43z" fill="#e7e2d5"/><path d="m256 159 221-107 12 328-227 56z" fill="#e7e2d5"/><path d="m50 356 33-328 173 131 6 277z" fill="#f4efe3"/><path d="m147 0 109 159 6 277-176-121z" fill="#fdf9f2"/><path d="m256 159 167-130 35 315-196 92z" fill="#f4efe3"/><path d="m256 159 104-159 60 311-158 125z" fill="#fdf9f2"/><path d="m252 151h8l6 361h-20z" fill="#d68034"/><g fill="#e7e2d5"><g><path d="m156 56 82 100-3 87-98-92z"/><path d="m131 172 102 85-2 13-103-88z"/><path d="m125 203 92 69-2 10-93-70z"/><path d="m120 228 106 73-2 12-106-75z"/><path d="m115 254 115 76v16l-118-82z"/><path d="m107 282 105 66-4 14-103-69z"/></g><g><path d="m271 162 81-116 3 12-82 118z"/><path d="m274 189 86-113 3 14-87.653 108.426z"/><path d="m279 218 84-92 3 14-87 92z"/><path d="m279 246 82-81 2 14-84 79z"/><path d="m386 320 17-14-7-18-13 10z"/></g></g></g><path d="m34 420-34-6v-42l11 3 2 21 20 13z" fill="#f3d544"/></g></svg></i>
                    <span class="side-link">Livros</span>
                </a>
                <span class="info">Livros</span>
            </li>
            <li>
                <a href="#">
                    <i><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve"> <g> <g> <path d="M472.184,4.347c-3.631-3.209-8.441-4.75-13.261-4.25l-307.2,34.133c-8.647,0.957-15.19,8.265-15.189,16.964V355.34 c-15.468-9.256-33.174-14.102-51.2-14.012C38.281,341.329,0,371.946,0,409.595s38.281,68.267,85.333,68.267 s85.333-30.601,85.333-68.267V151.889l273.067-30.413v199.68c-15.473-9.238-33.179-14.066-51.2-13.961 c-47.053,0-85.333,30.618-85.333,68.267c0,37.649,38.281,68.267,85.333,68.267s85.333-30.601,85.333-68.267v-358.4 C477.866,12.208,475.8,7.584,472.184,4.347z"/> </g> </g> </svg></i>
                    <span class="side-link">Música</span>
                </a>
                <span class="info">Música</span>
            </li>
            <li>
                <a href="#">
                    <i><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="431.985px" viewBox="0 0 431.985 431.985" style="enable-background:new 0 0 431.985 431.985;" xml:space="preserve"> <g> <path d="M423.257,51.829c-0.808-2.045-2.67-3.484-4.853-3.751c-2.177-0.266-4.335,0.682-5.612,2.472 c-7.581,10.629-17.529,14.172-29.053,18.275c-9.292,3.31-18.901,6.73-29.286,14.186c-14.687,10.544-21.405,24.917-18.055,38.54 l-0.358,0.459c-6.133-8.897-12.806-17.126-19.848-24.474c-32.947-34.378-78.984-55.046-126.311-56.703 c-2.085-0.073-4.204-0.11-6.298-0.11c-52.846,0-103.428,23.624-138.775,64.813C9.646,146.512-5.939,199.853,2.051,251.882 c0.668,4.349,1.504,8.743,2.487,13.063c12.996,57.202,46.189,100.717,91.069,119.383c11.063,4.602,22.222,6.934,33.163,6.934 c27.183,0,50.926-14.539,65.143-39.889c5.404-9.646,8.891-19.621,10.36-29.651c0.866-5.92,0.274-11.835-0.3-17.567 c-0.591-5.9-1.149-11.476-0.256-17.09c2.047-12.869,11.036-20.553,24.047-20.553c3.701,0,7.483,0.609,11.26,1.812 c-4.422,8.11-8.438,15.854-11.947,23.032c-7.437,15.212-12.567,27.81-15.252,37.44c-1.655,5.939-6.052,21.722,4.67,29.164 c3.405,2.363,7.722,3.197,12.215,2.361c4.049-0.752,16.369-3.041,51.378-42.896c9.396-10.695,19.521-23.072,30.104-36.794 c27.168-9.15,48.31-31.921,53.903-58.087c1.4-6.541,1.984-13.541,1.735-20.812c10.172-15.72,19.094-30.388,28.072-46.156 c0.172-0.304,0.342-0.628,0.51-0.96c13.031-3.569,24.254-13.71,30.842-27.891C434.872,106.028,434.163,79.428,423.257,51.829z M276.385,149.834c-4.713,7.485-12.814,11.954-21.673,11.954c-4.81,0-9.515-1.361-13.605-3.937 c-5.782-3.642-9.803-9.317-11.316-15.98s-0.345-13.518,3.298-19.301c4.714-7.485,12.816-11.954,21.675-11.954 c4.811,0,9.515,1.361,13.604,3.938c5.782,3.64,9.802,9.315,11.316,15.979C281.197,137.197,280.026,144.051,276.385,149.834z M309.592,196.187c12.934-19.057,26.612-38,39.604-54.85c2.106,1.902,4.461,3.76,7.012,5.53c4.227,2.933,8.648,5.201,13.164,6.754 c-10.969,18.758-22.763,37.342-37.043,58.375c-23.463,34.571-47.859,66.684-68.695,90.424 c-11.638,13.26-21.823,23.498-29.671,29.839c3.029-9.69,8.818-22.989,16.875-38.746 C265.245,265.336,286.111,230.772,309.592,196.187z M82.506,196.023c-4.811,0-9.516-1.361-13.607-3.938 c-5.782-3.641-9.801-9.314-11.315-15.979c-1.514-6.664-0.342-13.519,3.301-19.302c4.711-7.484,12.813-11.953,21.671-11.953 c4.812,0,9.517,1.361,13.607,3.938c11.936,7.518,15.532,23.345,8.019,35.279C99.466,191.554,91.363,196.023,82.506,196.023z M55.688,252.358c4.713-7.486,12.814-11.955,21.673-11.955c4.81,0,9.514,1.362,13.606,3.938c5.782,3.641,9.801,9.315,11.315,15.979 c1.515,6.662,0.343,13.516-3.301,19.301c-4.711,7.483-12.813,11.953-21.671,11.953c-4.811,0-9.517-1.361-13.609-3.938 c-5.782-3.642-9.8-9.315-11.313-15.979C50.876,264.995,52.049,258.14,55.688,252.358z M137.62,100.414 c4.713-7.485,12.815-11.954,21.673-11.954c4.809,0,9.514,1.361,13.604,3.937c11.937,7.516,15.533,23.344,8.019,35.28 c-4.715,7.486-12.817,11.955-21.675,11.955c-4.81,0-9.515-1.361-13.605-3.938c-5.781-3.64-9.799-9.314-11.313-15.979 C132.807,113.052,133.979,106.198,137.62,100.414z"/> </g> </svg></i>
                    <span class="side-link">Desenhos</span>
                </a>
                <span class="info">Desenhos</span>
            </li>
            <li style="margin-top: 12vh">
                <a href="#">
                    <i class="bx bxs-heart"></i>
                    <span class="side-link">Curtidos</span>
                </a>
                <span class="info">Curtidos</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-cog"></i>
                    <span class="side-link">Configurações</span>
                </a>
                <span class="info">Configurações</span>
            </li>
        </ul>
        <div class="perfil-usuario">
            <div class="perfil">
                <div class="perfil-detalhes">
                    <img src="images/perfil.jpeg" alt="">
                    <div class="perfil-nome">
                        <div class="nome-usuario">Paulo Cesar</div>
                        <div class="funcao-usuario">Programador</div>
                    </div>
                </div>
                    <a href="logout.php"><i class="bx bx-log-out" id="logout" style="color:#fff;"></i></a>
            </div>
        </div>
    </div>
    <div class="conteudo-site">
        <div class="text">
        <div class="row filme-princ">
            <div class="col-lg-8 box-filme">
                <h1 class="glitch">
                    <span aria-hidden="true">MR. Robot</span>
                    MR. Robot
                    <span aria-hidden="true">MR. Robot</span>
                </h1>
                <p>Elliot é um jovem programador que trabalha como engenheiro de segurança virtual durante o dia, e como hacker vigilante durante a noite. Elliot se vê em uma encruzilhada quando é recrutado para destruir a firma que ele é pago para proteger.</p>
                <div class="avaliacao">
                    <div class="card card-comentarios">
                        <div class="card-header">
                            <span>
                                Paulo Cesar
                            </span>
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <p>
                                "Brabassssso"
                                <input type="radio" name="estrela" id="est1"><i class='fa fa-star' style="margin-left: 100px"></i>
                                <input type="radio" name="estrela" id="est2"><i class='fa fa-star'></i>
                                <input type="radio" name="estrela" id="est3"><i class='fa fa-star'></i>
                                <input type="radio" name="estrela" id="est4"><i class='fa fa-star'></i>
                                <input type="radio" name="estrela" id="est5"><i class='fa fa-star'></i>
                            </p>
                        </div>
                        </div>
                    </div>
                    <input type="radio" name="estrela" id="est1"><i class='fa fa-star'></i>
                    <input type="radio" name="estrela" id="est2"><i class='fa fa-star'></i>
                    <input type="radio" name="estrela" id="est3"><i class='fa fa-star'></i>
                    <input type="radio" name="estrela" id="est4"><i class='fa fa-star'></i>
                    <input type="radio" name="estrela" id="est5"><i class='fa fa-star' style="margin-right: 20px;opacity:0.5"></i>
                    <img src="images/18.svg" alt="" width="25" style="margin-bottom: 3px;">
                    <span class="badge badge-info" style="padding: 4px;">Minissérie</span>
                    <span class="badge badge-dark" style="padding: 4px;">4 Temporadas</span>
                    <span class="badge badge-success" style="padding: 4px;">12 Comentários</span>
                </div>
                <a href="#" class="btn-normal"><i class="fa fa-info"></i>Mais Informações</a>
                <a href="CulturaWeb.zip" class="btn-download"><i class="fa fa-download"></i>Download App</a>
                <button type="button" href="#" class="btn-avaliar video-play-btn"><i class="fa fa-play"></i></button>
            </div>

        </div>
        <div class="filmes-lista">
            <h1 class="filmes-titulo">Informativos</h1>
            <div class="filmes-row">
                    <div class="col-md-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/dilema/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-md-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/explicando/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-md-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/codigo/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/privacidade/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
            </div>
            <h1 class="filmes-titulo">Populares</h1>
            <div class="filmes-row">
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/jobs/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/rede/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/estagiarios/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/who/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
            </div>
            <h1 class="filmes-titulo">Documentários</h1>
            <div class="filmes-row">
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/wikileaks/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/internetown/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/tpb/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-lg-3 filmes-lista-item">
                        <img class="filmes-lista-img" src="filmes/eniac/filme.jpg" alt="">
                        <i class="fa fa-eye"></i>
                    </div>
            </div>
        </div>
        </div>
    </div>

    <div class="video-popup">
      <div class="video-popup-inner">
        <i class="fa fa-times video-popup-close"></i>
        <div class="iframe-box">
          <iframe id="player-1" src="https://www.youtube.com/embed/8qZYW_1hj2g" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <script>
        let btn = document.querySelector("#btn-menu");
        let sidebar = document.querySelector(".sidebar");
        let pesquisar = document.querySelector("#btn-search");

        pesquisar.onclick = function() {
            sidebar.classList.toggle("active");
        }

        btn.onclick = function() {
            sidebar.classList.toggle("active");
            sidebar.style.display = "block";
        }
        
    </script>

    <script src="https://use.fontawesome.com/245363fc8d.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>