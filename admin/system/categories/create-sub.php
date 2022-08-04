<?php
if (!class_exists('Login')) :
    header('Location: ../../painel.php');
    die;
endif;
?>

<div class="content form_create">

    <article>
		<?php 
		$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $catid = filter_input(INPUT_GET, 'catid', FILTER_VALIDATE_INT);
		$readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_id = :id", "id={$catid}");
						foreach ($readSes->getResult() as $ses):                                
                               
						endforeach;											
		?>
        <header><br/>
            <h2>Adicionar sub-categoria em: <strong><?php echo $ses['category_title'];?></strong></h2>
        </header><br/>

        <?php
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $catid = filter_input(INPUT_GET, 'catid', FILTER_VALIDATE_INT);

        if (!empty($data['SendPostForm'])):
            unset($data['SendPostForm']);

            require('_models/AdminCategory.class.php');
            $cadastra = new AdminCategory;
            $cadastra->ExeCreate($data);

            WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        else:
            
        endif;
        
        $checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
        if($checkCreate && empty($cadastra)):
            $tipo = ( empty($data['category_parent']) ? 'Categoria' : 'Sub-Categoria');
            WSErro("A {$tipo} <b>{$data['category_title']}</b> foi cadastrada com sucesso!", WS_ACCEPT);
        endif;
      
        ?>

        <form name="PostForm" action="" method="post" enctype="multipart/form-data">
            
            <div class="form-floating mb-2">
          <input type="text" name="category_title" class="form-control" id="floatingInput" value="<?php if (isset($data)) echo $data['category_title']; ?>" />
          <label for="floatingInput">Categoria:</label>
        </div>

            <div class="form-floating mb-2">
          <input type="text" name="category_content" class="form-control" id="floatingInput" value="<?php if (isset($data)) echo $data['category_content']; ?>">
          <label for="floatingInput">Descrição:</label>
        </div>

            <div class="label_line">
            
            <div class="form-row">
                <div  class="form-group col-md-6">
                    <div hidden="hidden" class="form-floating">
            <input type="text" class="form-control" name="category_date" value="<?= date('d/m/Y H:i:s'); ?>">
            <label for="floatingInputGrid">Data:</label>
                    </div>
            </div>


			<div class="form-group col-md-6">
        <div class="form-floating">
          		        
      </div>
    </div>


				<div hidden="" class="form-group col-md-6">
                <div class="form-floating ">
                  <select  class="form-select" name="category_parent" id="floatingSelectGrid" aria-label="Floating label select example">

                       <?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_id = :id", "id={$catid}");
                        
                            foreach ($readSes->getResult() as $ses):
                                echo "<option value=\"{$ses['category_id']}\" ";
								if(is_array($data)):
                                if ($ses['category_id'] == $data['category_parent']):
                                    echo ' selected="selected" ';
                                endif;
								endif;
                                echo "> {$ses['category_title']} </option>";
                            endforeach;
                        
                        ?>
                 
                 </select>
              <label for="floatingSelectGrid">Postar em: &nbsp;&nbsp;</label>
                </div>     
      		</div> 
            <input type="submit" class="btn btn-primary" value="Atualizar Categoria" name="SendPostForm" />
        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->