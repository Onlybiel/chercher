<?php  
require '../check.php';

?>
<html>
    <head>
        <title>CHECKER WISH</title>
        <link rel="shortcut icon" type="image/png" href="assets/fav.png"/>
        <meta name="author" content="Kobra <@Pandaoficial>">
        <meta name="keywords" content="central,electronic fraud,e-fraud,testadores exclusivos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- Importação de arquivos de customização -->
        <link rel="stylesheet" href="assets/materialize.css">
        <link rel="stylesheet" href="assets/custom.css">
        <link rel="stylesheet" href="assets/animate.css">
        <link rel="stylesheet" href="assets/font-awesome-animation.min.css">
        <!-- Importação de arquivos javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/materialize.js"></script>
        <script src="assets/effects.js"></script>
        <script src="assets/action.js"></script>
        <!-- Importação de arquivos fonte -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Orbitron|Roboto" rel="stylesheet">
    </head>
    <style>
        html {
            text-shadow: 1px 1px 30px #000;
            color:white;
        }

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid #342E73;
            margin: 1em 0;
            padding: 0;
        }

        body::-webkit-scrollbar {
            width: 5px;
            border-radius:6px;
        }

        body::-webkit-scrollbar-track {
            background-color:#332E73;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #554DB3;
        }

        code {
            background-color:#2F2969;
        }

        .destaque {
            background-color:#2F2969;
            width:100%;
            height:12%;
            border-radius:90px;
        }

        .destaque > .avatar-img {
            height:100%;
            width:30%;
            border-radius:900px;
        }

        .destaque > .username {
            vertical-align: top;
            font-size:18px;
            font-family: 'Orbitron', sans-serif;
        }

        textarea {
            font-family: "Roboto", sans-serif;
        }
    </style>

    <header>
        <nav>
            <div class="nav-wrapper purplemx" style="box-shadow: 1px 1px 12px 1px rgba(61,55,128,1);">
                <a href="#" class="brand-logo center"><img src="assets/fav.png" class="faa-float animated" style="-webkit-filter: drop-shadow(1px 1px 5px #EC5539);">#RAPHAELTD2</a>
            </div>
        </nav>    
    </header>

    <main>

        <body class="animated fadeIn">
            <div style="max-width: 100%; margin-left:2rem;  margin-top:1rem">
                <div>
                    <!-- Basic Card -->
                    <div class="card" style="background: linear-gradient(to right,#00D9B8, #00D979); width: 32.3%; display:inline-block; box-shadow: 1px 1px 8px 1px rgba(0,217,119,1);">
                        <div class="card-content white-text">
                            <span class="card-title"><i class="fas fa-asterisk fa-spin"></i> Logins aprovadas</span>
                            <p><i class="fas fa-percent"> </i>          <span class="label label-success aprovada_conta"> [ 0 ] </span>    aprovadas.</p>
                        </div>
                    </div>  
                    <span style="padding-left:1%"></span>
                    <div class="card" style="background: linear-gradient(to right,#FF38A5, #FF3873); width:32.3%; display:inline-block; box-shadow: 1px 1px 8px 1px rgba(255,56,106,1);">
                        <div class="card-content white-text">
                            <span class="card-title"><i class="fas fa-times fa-spin"></i> Logins reprovadas</span>
                            <p><i class="fas fa-percent"> </i>          <span  class="label label-danger reprovada_conta"> [ 0 ] </span>       reprovadas.</p>
                        </div>
                    </div>
                    <span style="padding-left:1%"></span>
                    <div class="card" style="background: linear-gradient(to right,#FFCA00, #FFA300); width:32.3%; display:inline-block; box-shadow: 1px 1px 8px 1px rgba(255,161,0,1);">
                        <div class="card-content white-text">
                            <span class="card-title"><i class="fas fa-users"></i> Logins testados</span>
                            <p><i class="fas fa-percent"> </i>           <span id="testado" class="label label-info"> [ 0 ] </span>    testado.</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div style="margin-left:2rem;">
                <div class="card-panel purplemx" style="width:99%; box-shadow: 1px 1px 12px 1px rgba(61,55,128,1); border-radius:3px">
                    <div class="card-content">
                        <h5 class="card-title white-text"><i class="fa fa-barcode"></i>Checker WISH</code><hr></hr></h5>
                        <h5 class="card-title white-text"><i class="fa fa-barcode"></i>Coder: @RAPHAEL_CHECKERS</code><hr></hr></h5>
                        <textarea id="lista" style="margin: 0px; height: 20%; width: 100%; background-color:#37317A; border-color:#342E73; border-radius:3px; outline-color:#7659FF; resize:none;" placeholder="EMAIL|SENHA SEPARADOR | ; :  "></textarea>
                        </p>
                        <center>
                            <button class = "btn waves-effect waves-light green" id="iniciar">INICIAR<i class = "material-icons right">start</i></button>
                            <button class = "btn waves-effect waves-light red" id="parar">PARAR<i class = "material-icons right">stop</i></button>
                        </center>
                    </div>
                </div>
                <center>Status: <span id="status" class="label label-default">ESPERANDO COMANDO</span><br><p></p></center>
 <div style="max-width: 100%;">
                    <div class="card-panel purplemx" style="width:49%; box-shadow: 1px 1px 12px 1px rgba(61,55,128,1); border-radius:3px; display:inline-block;">
                        <div class="card-content">
                            <h5 class="card-title white-text">Lived<hr></hr></h5>
                            <div class="panel-body">
                                <div id="aprovadas">
                                </div>
                            </div>
                        </div>
                    </div>

                    <span style="padding-left:1%"></span>
                    <div class="card-panel purplemx" style="width:49%; box-shadow: 1px 1px 12px 1px rgba(61,55,128,1); border-radius:3px; display:inline-block; vertical-align: top;">
                        <div class="card-content">
                            <h5 class="card-title white-text">Dies<hr></hr></h5>
                              <div class="panel-body">
                                <div id="reprovadas">

                                </div>
                            </div>
                        </div>
                </div>
            </div>


        <div class="modal fade" id="modal_done" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sucesso</h4>
                    </div>
                    <div class="modal-body">
                        Todos os login foram testados.
                    </div>
                </div>
            </div>
        </div>

                <div class="modal fade" id="modal_mailpass" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Opa!</h4>
                    </div>
                    <div class="modal-body">
                        Lista de logins vazia!!!
                    </div>
                </div>
            </div>
        </div>
                  <div hidden="true" class="row">
                            <div class="col-md-12 col-xs-12 col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        SOCK DIE &nbsp;
                                        <span class="label label-info"  id="sock_die">0</span>
                                        <span class="pull-right">
                                            <button type="button" id="btn-sock-hide" class="btn btn-xs btn-warning"><i class="fa fa-minus"> </i><font color="black"> Esconder </font></button>
                                            <button type="button" class="btn btn-xs btn-warning" onclick="document.getElementById('sock_ruim').innerHTML = ''"><i class="fa fa-close"></i> <font color="black"> Limpar </font></button>
                                        </span>
                                    </div>
                                    <div  class="panel-body">
                                        <div  id="sock_ruim"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
     <textarea name="socks" id="socks" hidden="false"> placeholder="<?php echo "Qualquer formato\nex: 127.0.0.1:80\nUtiliar apenas socket5"; ?>" class="form-control" rows="7"></textarea>

                    
               
                        <footer class="page-footer purplemx" style="box-shadow: 1px 1px 12px 1px rgba(61,55,128,1);">
                            <div class="footer-copyright">
                                <div class="container">
                                     <?php echo date("Y"); ?> #RAPHAELTD2 
                                </div>
                            </div>
                        </3>
                    </div>
                </div>
                        </footer>
                    </div>
                   </body>
               </html>
