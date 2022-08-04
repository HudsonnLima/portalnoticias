<article>
		<a href="painel.php?exe=posts/index" title="Artigos" class="btn btn-primary" style="float:right;">Listar Postagens</a><br /><br />
        
<?php
		$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $postid = filter_input(INPUT_GET, 'postid', FILTER_VALIDATE_INT);
        if (isset($post) && $post['SendPostForm']):
            $post['post_status'] = ($post['SendPostForm'] == 'Atualizar' ? '0' : '1' );
            $post['post_cover'] = ( $_FILES['post_cover']['tmp_name'] ? $_FILES['post_cover'] : 'null' );
			unset($post['SendPostForm']);
            require('_models/AdminPost.class.php');
            $cadastra = new AdminPost;
            $cadastra->ExeUpdate($postid, $post);

            WSErro($cadastra->getError()[0], $cadastra->getError()[1]);

            if (!empty($_FILES['gallery_covers']['tmp_name'])):
                $sendGallery = new AdminPost;
                $sendGallery->gbSend($_FILES['gallery_covers'], $postid);
            endif;

        else:
            $read = new Read;
            $read->ExeRead("posts", "WHERE post_id = :id", "id={$postid}");
            if (!$read->getResult()):
                header('Location: painel.php?exe=posts/index&empty=true');
            else:
                $post = $read->getResult()[0];
                $post['post_date'] = date('d/m/Y H:i:s', strtotime($post['post_date']));
            endif;
        endif;

        $checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
        if ($checkCreate && empty($cadastra)):
            WSErro("A postagem <b>{$post['post_title']}</b> foi cadastrado com sucesso no sistema!", WS_ACCEPT);
        endif;
        ?>

        <header>
            <div class="titulo">Editar publicação: <strong><?php if (isset($post['post_title'])) echo $post['post_title']; ?></strong>!</div><br/>
        </header>




         <form name="PostForm" action="" method="post" enctype="multipart/form-data">
		
        <div class="form-group">
			<input type="file" name="post_cover" class="form-control" id="upload_file" onchange="getImagePreview(event)">
			<label id="foto" for="upload_file"><i class="fa fa-upload" aria-hidden="true"></i> &nbsp; Selecionar imagem</label>
		</div>
		
        <div class="img" id="preview"></div>
	   
<br />
        <div class="form-floating mb-2">
          <input type="text" name="post_title" class="form-control" id="floatingInput" placeholder="Titulo" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>">
          <label for="floatingInput">Titulo:</label>
        </div>
 	
        <div class="form-group">
        <textarea id="txtArtigo" name="post_content" class="form-control"><?php if (isset($post['post_content'])) echo htmlspecialchars($post['post_content']); ?></textarea>
        </div><br/>

            <div class="form-row">
                
                <div class="form-group col-md-4">
                <div class="form-floating">
                  
                  <input type="text" class="form-control" name="post_date" value="<?php
                    if (isset($post['post_date'])): echo $post['post_date'];
                    else: echo date('d/m/Y H:i:s');
                    endif;
                    ?>">
                  
                  <label for="floatingInputGrid">Data:</label>
                  </div>
                </div>

                <div class="form-group col-md-4">
                <div class="form-floating ">
                 <select name="post_category" class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                 <option><?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_parent IS NULL ORDER BY category_title ASC");
                        if ($readSes->getRowCount() >= 1):
                            foreach ($readSes->getResult() as $ses):
                                echo "<option disabled=\"disabled\" value=\"\"> {$ses['category_title']} </option>";
                                $readCat = new Read;
                                $readCat->ExeRead("categories", "WHERE category_parent = :parent ORDER BY category_title ASC", "parent={$ses['category_id']}");

                                if ($readCat->getRowCount() >= 1):
                                    foreach ($readCat->getResult() as $cat):
                                        echo "<option ";

                                        if ($post['post_category'] == $cat['category_id']):
                                            echo "selected=\"selected\" ";
                                        endif;

                                        echo "value=\"{$cat['category_id']}\"> &raquo;&raquo; {$cat['category_title']} </option>";
                                    endforeach;
                                endif;

                            endforeach;
                        endif;
                        ?></option>
                 
                </select>
              <label for="floatingSelectGrid">Postar em: &nbsp;&nbsp;</label>
                </div>     
      		</div>  
            
            <div class="form-group col-md-4">
        <div class="form-floating">
        
        <input disabled="disabled" type="text" class="form-control" id="data" name="category_date" value="<?= "{$_SESSION['userlogin']['user_name']} {$_SESSION['userlogin']['user_lastname']}"; ?>">
        
        </select>
        <label for="floatingInputGrid">Autor:</label>
      </div>
    </div>   
        </div>
        
    <br />
    		 <?php
                $delGb = filter_input(INPUT_GET, 'gbdel', FILTER_VALIDATE_INT);
                if ($delGb):
                    require_once('_models/AdminPost.class.php');
                    $DelGallery = new AdminPost;
                    $DelGallery->gbRemove($delGb);

                    WSErro($DelGallery->getError()[0], $DelGallery->getError()[1]);

                endif;
                ?>
    <div class="galeria">
    <input type="file" id="file-input" name="gallery_covers[]" accept="image/png, image/jpeg" onchange="preview()" multiple>
    <label id="foto" for="file-input">
            <i class="fa fa-upload" aria-hidden="true"></i> &nbsp; Selecionar imagens da galeria
        </label>
        <p id="num-of-files">Nenhuma imagem selecionada</p>
        <div class="" id="images"></div>
        
        <br />
        <input type="submit" value="Atualizar" name="SendPostForm" class="btn btn-primary" />
        <input type="submit" value="Atualizar e Publicar" name="SendPostForm" class="btn btn-primary" />
    </form>       
        
         <!-- Page Content -->
   <div class="page-top">
        <div class="row">
			<h2>Imagens publicadas</h2>
   	  	<?php 
			$Gallery = new Read;
            $Gallery->ExeRead("posts_gallery", "WHERE post_id = :post", "post={$postid}");
                 if ($Gallery->getResult()):
                 foreach ($Gallery->getResult() as $gb):	 
		?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../uploads/<?= $gb['gallery_image']?>" class="" rel="shadowbox">
                    <img src="../uploads/<?= $gb['gallery_image']?>" class=""  title="<?php echo $post['post_title']?>">
                </a>
               <br /><br />
                <a href="painel.php?exe=posts/update&postid=<?= $postid; ?>&gbdel=<?= $gb['gallery_id']; ?>" class="btn btn-secondary" style="background-color:#F00"">Excluir imagem</a>
            </div>  
            
		<?php 
		endforeach;
		endif;
		?>	
</div>
  </div>
     </div> 
     

        
          
    </article>

    <div class="clear"></div>
</div> <!-- content home -->

