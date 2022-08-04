<article>
<div class="bloco form" style="display:block">
		<a href="painel.php?exe=posts/index" title="Artigos" class="btn btn-primary" style="float:right;">Listar Postagens</a><br /><br />
<div class="content form_create">

        <header>
            <h1>Criar Post:</h1>
        </header>

        <?php
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($post) && $post['SendPostForm']):
            $post['post_status'] = ($post['SendPostForm'] == 'Cadastrar' ? '0' : '1' );
            $post['post_cover'] = ( $_FILES['post_cover']['tmp_name'] ? $_FILES['post_cover'] : null );
            unset($post['SendPostForm']);

            require('_models/AdminPost.class.php');
            $cadastra = new AdminPost;
            $cadastra->ExeCreate($post);

            if ($cadastra->getResult()):

                if (!empty($_FILES['gallery_covers']['tmp_name'])):
                    $sendGallery = new AdminPost;
                    $sendGallery->gbSend($_FILES['gallery_covers'], $cadastra->getResult());
                endif;

                header('Location: painel.php?exe=posts/update&create=true&postid=' . $cadastra->getResult());
            else:
                WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
            endif;
        endif;
        ?><br />
        
		
         <form name="formulario" action="" method="post" enctype="multipart/form-data">
		
        <div class="form-group">
			<input type="file" name="post_cover" class="form-control" id="upload_file" onchange="getImagePreview(event)">
			<label id="foto" for="upload_file"><i class="fa fa-upload" aria-hidden="true"></i> &nbsp; Selecionar imagem</label>
		</div>
		
        <div class="img" id="preview"></div>
		<br />
        <div class="form-floating mb-2">
          <input type="text" name="post_title" class="form-control" id="floatingInput" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>">
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
                  <select class="form-select" name="post_category" id="floatingSelectGrid" aria-label="Floating label select example">
                 <option value=""> Selecione a categoria: </option>                        
                        <?php
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
										if(is_array($post)):
                                        if($post['post_category'] == $cat['category_id']):
                                            echo "selected=\"selected\" ";
											endif;
                                        endif;

                                        echo "value=\"{$cat['category_id']}\"> &raquo;&raquo; {$cat['category_title']} </option>";
                                   
								    endforeach;
                                endif;

                            endforeach;
                        endif;
                        ?>
                </select>
              <label for="floatingSelectGrid">Postar em: &nbsp;&nbsp;</label>
                </div>     
      		</div> 
            
                        
	<div class="form-group col-md-4">
        <div class="form-floating">
        <input type="text" readonly="readonly" class="form-control" name="post_author" value="<?= "{$_SESSION['userlogin']['user_name']} {$_SESSION['userlogin']['user_lastname']}"; ?>">  											
        <label for="floatingInputGrid">Autor:</label>
        
      </div>
    </div>
               
        </div>
        <input type="submit" value="Cadastrar" name="SendPostForm" class="btn btn-primary" />
        <input type="submit" value="Cadastrar e Publicar" name="SendPostForm" class="btn btn-primary" />

    </form>  
	
    </article>

    <div class="clear"></div>
</div> <!-- content home -->