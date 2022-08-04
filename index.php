<?php ob_start();?>
<!DOCTYPE html>
<!--
	Desenvolvido por: Dinho Lima
    Site: http://www.dinholima.com
-->

<?php

require('./_app/Config.inc.php');

?>

<html lang="pt-br" class"no-js" >

    <head>
        <meta charset="UTF-8">

        <!--[if lt IE 9]>
            <script src="../../_cdn/html5.js"></script>
         <![endif]-->        

        <title><?= SITENAME;?></title>

        <link rel="stylesheet" href="<?php echo BASE?>/_cdn/shadowbox/shadowbox.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= INCLUDE_PATH; ?>/css/media_query.css" rel="stylesheet" type="text/css"/>
        <link href="<?= INCLUDE_PATH; ?>/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="<?= INCLUDE_PATH; ?>/css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link href="<?= INCLUDE_PATH; ?>/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="<?= INCLUDE_PATH; ?>/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap CSS -->
        <link href="<?= INCLUDE_PATH; ?>/css/style_1.css" rel="stylesheet" type="text/css"/>
        <!-- Modernizr JS -->
        <script src="<?= INCLUDE_PATH; ?>/js/modernizr-3.5.0.min.js"></script>
        <link rel="icon" type="image/png" href="<?= INCLUDE_PATH; ?>/images/trrevista.png" />
        <!-- Galeria de Imagens -->
        <link href="<?= INCLUDE_PATH; ?>/galery/galeria.css" rel="stylesheet" type="text/css"/>
		<script src="<?= INCLUDE_PATH; ?>/galery/galeria.js"></script>
		<!--SHADOWBOX-->
        <script type="text/javascript" src="<?= BASE ?>shadowbox/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= BASE ?>shadowbox/shadowbox/shadowbox.css"/>
        
        <script type="text/javascript" src="<?= BASE ?>shadowbox/shadowbox/shadowbox.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
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
       <!--//SHADOWBOX-->

		 <?php
         $Link = new Link;
         $Link->getTags();
         ?>
         
         <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v14.0&appId=690201454841846&autoLogAppEvents=1" nonce="888cS17F"></script>
       </head>
    <body>

        <?php
        require(REQUIRE_PATH . '/includes/header.php');



        $url = ( isset($_GET['url']) ? strip_tags(trim($_GET['url'])) : 'index');
        $url = explode('/', $url);
        $url[0] = ($url[0] == null ? 'index' : $url[0]);
        $url[1] = ( empty($url[1]) ? null : $url[1]); //EVITA NOCICE
        
		if (!require($Link->getPatch())):
            WSErro('Erro ao incluir arquivo de navegação!', WS_ERROR, true);
        endif;

        require(REQUIRE_PATH . '/includes/footer.php');
		
        ?>

    </body>

	<!--
    <script src="<?= BASE ?>_cdn/jcycle.js"></script>
    <script src="<?= BASE ?>_cdn/jmask.js"></script>
    <script src="<?= BASE ?>_cdn/shadowbox/shadowbox.js"></script>
    <script src="<?= BASE ?>_cdn/_plugins.conf.js"></script>
    <script src="<?= BASE ?>_cdn/_scripts.conf.js"></script>
    -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?= BASE ?>js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="<?= BASE ?>js/jquery.waypoints.min.js"></script>
<!-- Parallax -->
<script src=<?= BASE ?>js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="<?= BASE ?>js/main.js"></script>
<script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>
</html>
