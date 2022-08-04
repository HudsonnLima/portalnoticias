<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <?php
            $cat = Check::CatByName('noticias');
            $post = new Read;
            $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 45  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=1&offset=0");
            if (!$post->getResult()):
                WSErro('Desculpe, ainda não existem notícias cadastradas. Favor volte mais tarde!', WS_INFOR);
            else:
                foreach ($post->getResult() as $img960):
                    ?>           
                    <div class="fh5co_suceefh5co_height"><img src="uploads/<?= $img960['post_cover'] ?>" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font">
                            <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $img960['datetime'] = date('d-m-Y H:i:s', strtotime($img960['post_date'])); ?></div>
                            <!--<div class=""><a href="" class="fh5co_good_font"> <?= $img960['post_category'] ?> </a></div>-->
                            <div class=""><a href="<?= BASE; ?>artigo/<?= $img960['post_name'] ?>" class="fh5co_good_font"> <?= $img960['post_title'] ?> </a></div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>


        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <?php
                    $post = new Read;
                    $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 45  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=1&offset=1");
                    if (!$post->getResult()):
                        WSErro("Desculpe, não temos mais notícias para serem exibidas aqui. Favor, volte depois!", WS_INFOR);
                    else:
                        foreach ($post->getResult() as $img480x300):
                            ?>     
                            <div class="fh5co_suceefh5co_height_2"><img src="uploads/<?= $img480x300['post_cover'] ?>" alt="img"/>
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $img480x300['datetime'] = date('d-m-Y H:i:s', strtotime($img480x300['post_date'])); ?></div>
                                    <div class=""><a href="<?= BASE; ?>artigo/<?= $img480x300['post_name'] ?>" class="fh5co_good_font_2"><?= $img480x300['post_title'] ?></a></div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <?php
                    $post = new Read;
                    $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 45  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=1&offset=2");
                    if (!$post->getResult()):
                        WSErro("Desculpe, não temos mais notícias para serem exibidas aqui. Favor, volte depois!", WS_INFOR);
                    else:
                        foreach ($post->getResult() as $img480x320):
                            ?>  
                            <div class="fh5co_suceefh5co_height_2"><img src="uploads/<?= $img480x320['post_cover'] ?>" alt="img"/>
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $img480x320['datetime'] = date('d-m-Y H:i:s', strtotime($img480x320['post_date'])); ?></a></div>
                                    <div class=""><a href="<?= BASE; ?>artigo/<?= $img480x320['post_name'] ?>" class="fh5co_good_font_2"><?= $img480x320['post_title'] ?></a></div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <?php
                    $post = new Read;
                    $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 45  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=1&offset=3");
                    if (!$post->getResult()):
                        WSErro("Desculpe, não temos mais notícias para serem exibidas aqui. Favor, volte depois!", WS_INFOR);
                    else:
                        foreach ($post->getResult() as $img480x320x1):
                            ?>  
                            <div class="fh5co_suceefh5co_height_2"><img src="uploads/<?= $img480x320x1['post_cover'] ?>" alt="img"/>
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $img480x320x1['datetime'] = date('d-m-Y H:i:s', strtotime($img480x320x1['post_date'])); ?></a></div>
                                    <div class=""><a href="<?= BASE; ?>artigo/<?= $img480x320x1['post_name'] ?>" class="fh5co_good_font_2"><?= $img480x320x1['post_title'] ?></a></div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <?php
                    $post = new Read;
                    $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 45  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=1&offset=4");
                    if (!$post->getResult()):
                        WSErro("Desculpe, não temos mais notícias para serem exibidas aqui. Favor, volte depois!", WS_INFOR);
                    else:
                        foreach ($post->getResult() as $img480x274):
                            ?>  
                            <div class="fh5co_suceefh5co_height_2"><img src="uploads/<?= $img480x274['post_cover'] ?>" alt="img"/>
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                    <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $img480x274['datetime'] = date('d-m-Y H:i:s', strtotime($img480x274['post_date'])); ?></a></div>
                                    <div class=""><a href="<?= BASE; ?>artigo/<?= $img480x274['post_name'] ?>" class="fh5co_good_font_2"><?= $img480x274['post_title'] ?></a></div>
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
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">MULHER</div>
        </div>

        <div class="owl-carousel owl-theme js" id="slider1">

            <?php
            $post = new Read;
            $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 30  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=10&offset=0");
            if (!$post->getResult()):
                WSErro("Desculpe, não temos mais notícias para serem exibidas aqui. Favor, volte depois!", WS_INFOR);
            else:
                foreach ($post->getResult() as $mulher):
                    ?>  
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img src="uploads/<?= $mulher['post_cover'] ?>" alt=""
                                                                       class="fh5co_img_special_relative"/></div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="<?= BASE; ?>artigo/<?= $mulher['post_name'] ?>" class="text-white"><?= $mulher['post_title'] = Check::Words($mulher['post_title'], 6); ?></a>
                                <div class="fh5co_latest_trading_date_and_name_color"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $mulher['datetime'] = date('d-m-Y H:i:s', strtotime($mulher['post_date'])); ?></div>
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

<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Três Rios</div>
                </div>

                <?php
                $post = new Read;
                $post->ExeRead("posts", "WHERE post_status = 1 && post_cat_parent = 28  ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "&limit=4&offset=0");
                if (!$post->getResult()):
                    WSErro("Desculpe, não temos mais notícias para serem exibidas aqui. Favor, volte depois!", WS_INFOR);
                else:
                    foreach ($post->getResult() as $tresrios):
                        ?>  

                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="uploads/<?= $tresrios['post_cover'] ?>" alt="<?= $tresrios['post_title'] ?>" title="<?= $tresrios['post_title'] ?>"/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="<?= BASE; ?>artigo/<?= $tresrios['post_name'] ?>" class="fh5co_magna py-2"><?= $tresrios['post_title'] = Check::Words($tresrios['post_title'], 5); ?></a> 
                                <a href="<?= BASE; ?>artigo/<?= $tresrios['post_name'] ?>" class="fh5co_mini_time py-3"> </a>
                                <div class="c_g"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $tresrios['datetime'] = date('d-m-Y H:i:s', strtotime($tresrios['post_date'])); ?></div><br/>
                                <div class="fh5co_consectetur"><?= $tresrios['post_content'] = Check::Words($tresrios['post_content'], 35); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Facebook</div>
                </div>
                <div class="clearfix"></div>
                <div class="fb-page" data-href="https://www.facebook.com/Tr-Revista-221229028020560" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Tr-Revista-221229028020560" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Tr-Revista-221229028020560">Tr Revista</a></blockquote></div>

                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">+ Vistos</div>
                </div>

                <?php
                $readPosts = new Read;
                $readPosts->ExeRead("posts", "ORDER BY post_views DESC LIMIT :limit OFFSET :offset", "limit=6&offset=0");
                if ($readPosts->getResult()):
                    foreach ($readPosts->getResult() as $maisvistos):
                        ?>
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="uploads/<?= $maisvistos['post_cover'] ?>" alt="img" class="fh5co_most_trading"/>
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font"><a href="<?= BASE; ?>artigo/<?= $maisvistos['post_name'] ?>"> <?= $maisvistos['post_title'] = Check::Words($maisvistos['post_title'], 6); ?></a></div>
                                <div class="most_fh5co_treding_font_123"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $maisvistos['datetime'] = date('d-m-Y H:i:s', strtotime($maisvistos['post_date'])); ?></div>
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
