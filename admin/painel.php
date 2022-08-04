<?php
ob_start();
session_start();
require('../_app/Config.inc.php');
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
$login = new Login(3);
$logoff = filter_input(INPUT_GET, 'logoff', FILTER_VALIDATE_BOOLEAN);
$getexe = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);

if (!$login->CheckLogin()):
    unset($_SESSION['userlogin']);
    header('location: index.php?exe=restrito');
else:
    $userlogin = $_SESSION['userlogin'];
endif;

if ($logoff):
    unset($_SESSION['userlogin']);
    header('location: index.php?exe=logoff');
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Painel Administrativo - </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="icons/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <!--<link rel="stylesheet" href="css/admin.css">-->
        <!--BOOTSTRAP 4.6.1--> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <!--//BOOTSTRAP 4.6.1--> 

        <!--BOOTSTRAP 5.0.2-->  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!--//BOOTSTRAP 5.0.2--> 

        <!--ICONES-->
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--//ICONES-->   
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>  
        <!--CHARTS-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!--//CHARTS-->

        <!--SHADOWBOX-->
        <link rel="stylesheet" type="text/css" href="js/shadowbox/shadowbox.css"/>
        <script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var opções = {
                    resizeLgImages: true,
                    displayNav: false,
                    handleUnsupported: 'remover',
                    keysClose: ['c', 27], // c ou esc
                    autoplayFilmes: false
                };
                Shadowbox.init(opções);
            });
        </script>


    </head>
    <body>
        <?php require('system/menu.php'); ?>

        <!-- Page content holder -->
        <div class="page-content p-3" id="content">
            <!-- Toggle button -->
            <button id="sidebarCollapse" type="button" class="btn btn-light shadow-sm "><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Menu</small></button>


            <div id="conteudo"><!--CONTEUDO-->

                <?php
                //QUERY STRING
                if (!empty($getexe)):
                    $includepatch = __DIR__ . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . strip_tags(trim($getexe) . '.php');
                else:
                    $includepatch = __DIR__ . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'home.php';
                endif;

                if (file_exists($includepatch)):
                    require_once($includepatch);
                else:
                    echo "<div class=\"content notfound\">";
                    WSErro("<b>Erro ao incluir tela:</b> Erro ao incluir o controller  {$getexe}.php!", WS_ERROR);
                    echo "</div>";
                endif;
                ?>



            </div><!--//CONTEUDO-->
        </div><!--PAGE CONTENT-->
        <!-- End demo content -->
        <footer class="main_footer">
            <a href="http://www.dinholima.com" target="_blank" title="Dinho Lima">&copy; Dinho Lima - Todos os Direitos Reservados</a>
        </footer>
    </body>


</html>
<!-- EDITOR DE TEXTO -->
<script src="js/ckeditor/ckeditor.js"></script>
<script>CKEDITOR.replace('txtArtigo');</script>
<script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script>
<!-- //EDITOR DE TEXTO -->
<!--PREVIEW IMAGEM CAPA-->
<script src="js/previewimg.js"></script>
<!--//PREVIEW IMAGEM CAPA-->
<!--PREVIEW GALERIA DE IMAGENS DO POST-->
<script src="js/galeriapreviewimg.js"></script>
<!--//PREVIEW GALERIA DE IMAGENS DO POST-->





<?php ob_end_flush(); ?>
