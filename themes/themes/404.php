<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
    
    <div class="container-fluid pt-3"><br/>
    <h2>Não encontramos a página que você tentou acessar! <p>
    Mas separamos algumas matérias que talves você possa gostar de ler!</h2>
        <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">REPORTAGEM</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">

           <?php
            $cat = Check::CatByName('noticias');
            $post = new Read;
            $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 45  ORDER BY post_date DESC  LIMIT :limit OFFSET :offset", "&limit=20&offset=0");
            if (!$post->getResult()):
                WSErro('Desculpe, ainda não existem notícias cadastradas. Favor volte mais tarde!', WS_INFOR);
            else:
                foreach ($post->getResult() as $reportagem):
                    ?>  
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img src="uploads/<?= $reportagem['post_cover'] ?>" alt=""
                                                                       class="fh5co_img_special_relative"/></div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="<?= BASE; ?>artigo/<?= $reportagem['post_name'] ?>" class="text-white"><?= $reportagem['post_title'] = Check::Words($reportagem['post_title'], 6); ?></a>
                                <div class="fh5co_latest_trading_date_and_name_color"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $reportagem['datetime'] = date('d-m-Y H:i:s', strtotime($reportagem['post_date'])); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        		</div>
   			 </div>
		</div>
        
        
        
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Colunas</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            <?php
            $post = new Read;
            $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 29  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=10&offset=0");
            if (!$post->getResult()):
                WSErro("Desculpe, não temos mais notícias para serem exibidas aqui. Favor, volte depois!", WS_INFOR);
            else:
                foreach ($post->getResult() as $colunas):
                    ?>  
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="uploads/<?= $colunas['post_cover'] ?>" alt=""/></div>
                            <div>
                                <a href="<?= BASE; ?>artigo/<?= $colunas['post_name'] ?>" class="d-block fh5co_small_post_heading"><span class=""><?= $colunas['post_title'] = Check::Words($colunas['post_title'], 6); ?></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $colunas['datetime'] = date('d-m-Y H:i:s', strtotime($colunas['post_date'])); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>        
        
        
    </div>
 </div>
