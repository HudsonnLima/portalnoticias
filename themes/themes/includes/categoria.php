<?php
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . BASE . DIRECTORY_SEPARATOR . '404');
endif;
?>



<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4"><?= $category_title; ?></div>
                </div>
                
                <?php
        $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2] : 1);
        $Pager = new Pager(BASE . '/categoria/' . $category_name . '/');
        $Pager->ExePager($getPage, 8);

        $readCat = new Read;
        $readCat->ExeRead("posts", "WHERE post_status = 1 AND (post_category = :cat OR post_cat_parent = :cat) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "cat={$category_id}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
        if (!$readCat->getResult()):
            $Pager->ReturnPage();
            WSErro("Desculpe, a categoria {$category_title} ainda n«ªo tem artigos publicados, favor volte mais tarde!", WS_INFOR);
        else:
		foreach ($readCat->getResult() as $cat):
		?>
                
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="<?= BASE;?>uploads/<?= $cat['post_cover']?>" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="<?= BASE;?>artigo/<?= $cat['post_name']?>" class="fh5co_magna py-2"> <?= $cat['post_title'] = Check::Words($cat['post_title'], 5);?></a></br><br>
                        <div class="fh5co_consectetur"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $cat['datetime'] = date('d-m-Y H:i:s', strtotime($cat['post_date']));?></div></br>
                        <div class="fh5co_consectetur"><?= $cat['post_content'] = Check::Words($cat['post_content'], 30);?>
                        </div>
                    </div>
                </div>
                <?php 
				endforeach; 
				endif;
				?>
                 <?php	
				
				echo '<nav class="paginator">';
        		echo '<h2>'.$category_title.'</h2>';

        		$Pager->ExePaginator("posts", "WHERE post_status = 1 AND (post_category = :cat OR post_cat_parent = :cat)", "cat={$category_id}");
        		echo $Pager->getPaginator();

        		echo '</nav>';
				
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
                        <img src="<?= BASE ?>uploads/<?= $maisvistos['post_cover']?>" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"><a href="<?= BASE;?>artigo/<?= $maisvistos['post_name']?>"> <?= $maisvistos['post_title'] = Check::Words($maisvistos['post_title'], 6); ?></a></div>
                        <div class="most_fh5co_treding_font_123"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $maisvistos['datetime'] = date('d-m-Y H:i:s', strtotime($maisvistos['post_date']));?></div>
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

