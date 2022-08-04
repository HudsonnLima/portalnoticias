<?php
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . BASE . DIRECTORY_SEPARATOR . '404');
endif;
?>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v14.0&appId=690201454841846&autoLogAppEvents=1" nonce="ADil7FZ8"></script>


<div id="fh5co-title-box" align="center" ><img src="<?= BASE;?>uploads/<?= $post_cover?>" class="img img-fluid" </div>
    <div class="overlay"></div>
    <div class="page-title"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;
        <time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate>Enviada em: <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</time>
        <h2><?= $post_title; ?></h2>
    </div>
</div>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <h2><?= $post_title?></h2><br /><br /><?= $post_content?>
                
                <!--COMENTÁRIOS FACEBOOK-->
                <div class="fb-comments" data-href="<?= BASE?>artigo/<?= $post_name?>" data-width="auto" data-numposts="10"></div>
                <!--//COMENTÁRIOS FACEBOOK-->
                <!--GALERIA DE IMAGENS-->
                
            <div class="row">
            <?php 
			$Gallery = new Read;
            //$Gallery->ExeRead("posts_gallery", "WHERE post_id = :post", "post={$postid}");
			$Gallery->ExeRead("posts_gallery", "WHERE post_id = :post", "post={$post_id}");
                 if ($Gallery->getResult()):
                 foreach ($Gallery->getResult() as $gb):
				 	 
			?>
			

            <div class=" col-md-4 col-xs-6 thumb">
                <a href="../uploads/<?= $gb['gallery_image']?>" rel="shadowbox">
                <img src="../uploads/<?= $gb['gallery_image']?>" class="zoom img-fluid "  title="<?php echo $post_title?>">
                    
                   
                </a>
            </div>
          	<?php 
			endforeach;
			endif;
			?>	
       </div>

                
                <!--//GALERIA DE IMAGENS-->
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
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>


            
        </div>
    </div>
</div>