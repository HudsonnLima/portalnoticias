<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="<?=INCLUDE_PATH;?>/images/logo.png" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> Sobre</div>
                <div class="footer_sub_about pb-3"> TR Revista surgiu em março de 2013 com o propósito de ser um órgão de informação independente. Contrariando opiniões sobre a impossibilidade de existir imparcialidade na imprensa do interior, o objetivo era noticiar fatos ocorridos em Três Rios e cidades da região...
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a href="https://www.facebook.com/Tr-Revista-221229028020560" target="_blank" class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3"> Menu</div>
                <ul class="footer_menu">
                <?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_parent is null ORDER BY category_title");
                        if ($readSes->getRowCount() >= 1):
                            foreach ($readSes->getResult() as $categoria):
							?>
                    <li><a href="<?= BASE; ?>categoria/<?= $categoria['category_name'] ?>" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; <?= $categoria['category_title'] ?></a></li>
                    <?php
                    endforeach;
					endif;
					?>
                    <li><a href="<?= BASE; ?>categoria/reportagem" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Reportagem</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3"> Publicações mais vistas</div>
                <?php
                $readPosts = new Read;
        		$readPosts->ExeRead("posts", "ORDER BY post_views DESC LIMIT :limit OFFSET :offset", "limit=3&offset=0");
        		if ($readPosts->getResult()):
				foreach ($readPosts->getResult() as $maisvistos):
				?>

                <div class="footer_makes_sub_font"><i class="fa fa-clock-o"></i>&nbsp;&nbsp; <?= $maisvistos['datetime'] = date('d-m-Y H:i:s', strtotime($maisvistos['post_date']));?></div>
                <a href="<?= BASE; ?>artigo/<?= $maisvistos['post_name'] ?>" class="footer_post pb-4"><?= $maisvistos['post_title'] = Check::Words($maisvistos['post_title'], 10); ?></a>
                <?php
                	endforeach;
					endif;
				?>
                <div class="footer_position_absolute"><img src="<?=INCLUDE_PATH;?>/images/footer_sub_tipik.png" alt="img" class="width_footer_sub_img"/></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3"> Últimas Postagens</div>
                <?php
                    $readPosts = new Read;
                    $readPosts->ExeRead("posts", "ORDER BY post_id DESC LIMIT :limit OFFSET :offset", "limit=9&offset=0");
                    	if ($readPosts->getRowCount() >= 1):
                        foreach ($readPosts->getResult() as $lastposts):
				?>
                <a href="<?php echo BASE;?>artigo/<?= $lastposts['post_name'] ?>" class="footer_img_post_6"><img src="<?= BASE ?>uploads/<?= $lastposts['post_cover']?>"  alt="<?= $lastposts['post_title']?>" title="<?= $lastposts['post_title']?>" width="480" height="320"/></a>
                                 <?php
                	endforeach;
					endif;
				?>
            </div>
        </div>
        
    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved"> 2013 - 2022 © TR Revista. Desenvolvido por: <a href="http://dinholima.com" target="_blank" title="Free HTML5 Bootstrap templates">Dinho Lima</a>. </div>
            <div class="col-12 col-md-6 py-4 Reserved">
                <a href="<?= BASE;?>" class="footer_last_part_menu">Início</a>
                <a href="<?= BASE; ?>quem-somos/" class="footer_last_part_menu">Sobre</a>
                <a href="<?= BASE; ?>contato/" class="footer_last_part_menu">Contato</a>
                
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>



</body>