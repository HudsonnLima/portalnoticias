<div class="content form_create">

    <article>

        <header>
            <h1>Criar Categoria:</h1>
        </header>

        <?php
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($data['SendPostForm'])):
            unset($data['SendPostForm']);

            require('_models/AdminCategory.class.php');
            $cadastra = new AdminCategory;
            $cadastra->ExeCreate($data);

            if (!$cadastra->getResult()):
                WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
            else:
                header('Location: painel.php?exe=categories/update&create=true&catid=' . $cadastra->getResult());
            endif;
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


            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-floating">
            <input type="text" class="form-control" name="category_date" value="<?= date('d/m/Y H:i:s'); ?>">
            <label for="floatingInputGrid">Data:</label>
                    </div>
            </div>
            
            
        
            <div class="form-group col-md-6">
                <div class="form-floating ">
                  <select class="form-select" name="category_parent" id="floatingSelectGrid" aria-label="Floating label select example">
                 <option value="null"> Selecione a categoria: </option>
                        <?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_parent IS NULL ORDER BY category_title ASC");
                        if (!$readSes->getResult()):
                            echo '<option disabled="disabled" value="null"> Cadastre antes uma seção! </option>';
                        else:
                            foreach ($readSes->getResult() as $ses):
                                echo "<option value=\"{$ses['category_id']}\" ";
								if(is_array($data)):
                                if ($ses['category_id'] == $data['category_parent']):
                                    echo ' selected="selected" ';
                                endif;
								endif;
                                echo "> {$ses['category_title']} </option>";
                            endforeach;
                        endif;
                        ?>   
                 
                 </select>
              <label for="floatingSelectGrid">Postar em: &nbsp;&nbsp;</label>
                </div>     
      		</div> 
       </div>
            <input type="submit" value="Cadastrar Categoria" name="SendPostForm" class="btn btn-primary" />
            </div>
        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->