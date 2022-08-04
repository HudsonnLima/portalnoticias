<div class="content cat_list">
    <section>
        
        <div class="bloco form" style="display:block">
		<a href="painel.php?exe=categories/create" title="Criar Categoria" class="btn btn-primary" style="float:right;">Criar Categoria</a><br /><br />
        <h1>Categorias:</h1>
        <section>
                <header>
                <table class="table">
                    <tr class="table-active">
                        <td align="" width="800">Categorias</td>
                        <td align="">Data</td>
                        <td align="">Postagens</td>
                        <td align="">Sub-Categorias</td>
                        <td align="center" colspan="3">Ações</td>
                    </tr>

        <?php
        $empty = filter_input(INPUT_GET, 'empty', FILTER_VALIDATE_BOOLEAN);
        if ($empty):
            WSErro("Você tentou editar uma categoria que não existe no sistema!", WS_INFOR);
        endif;

        $delCat = filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT);
        if ($delCat):
            require ('_models/AdminCategory.class.php');
            $deletar = new AdminCategory;
            $deletar->ExeDelete($delCat);
            
            WSErro($deletar->getError()[0], $deletar->getError()[1]);
        endif;


        $readSes = new Read;
        $readSes->ExeRead("categories", "WHERE category_parent IS NULL ORDER BY category_title ASC");
        if (!$readSes->getResult()):

        else:
            foreach ($readSes->getResult() as $ses):
                extract($ses);

                $readPosts = new Read;
                $readPosts->ExeRead("posts", "WHERE post_cat_parent = :parent", "parent={$category_id}");

                $readCats = new Read;
                $readCats->ExeRead("categories", "WHERE category_parent = :parent", "parent={$category_id}");

                $countSesPosts = $readPosts->getRowCount();
                $countSesCats = $readCats->getRowCount();
                ?>
                

             	<tr class="table-active">
                <td align="">&raquo&raquo <?= $category_title; ?></td>
                <td align=""><?= date('d/m/Y', strtotime($category_date)); ?></td>
                <td align=""><?= $countSesPosts; ?></td>
                <td align=""><?= $countSesCats; ?></td>
                <td align="center">      
     <a href="../categoria/<?= $category_name; ?>" title="Ver no site"><i class="fa fa-eye mr-1 text-primary fa-fw" style="font-size:16px" title="Ver no site"></i></a>
     <a href="painel.php?exe=categories/create-sub&catid=<?= $category_id; ?>" title="Ver no site"><i class="fa fa-plus mr-1 text-primary fa-fw" style="font-size:16px" title="Adicionar Sub-Categoria"></i></a> 
     <a href="painel.php?exe=categories/update&catid=<?= $category_id; ?>" title="Editar"><i class="fa fa-pencil mr-1 text-primary fa-fw" style="font-size:16px" title="Editar"></i></a>
     <a href="painel.php?exe=categories/index&delete=<?= $category_id; ?>" title="Excluir"><i class="fa fa-trash mr-1 text-primary fa-fw" style="font-size:16px" title="Excluir"></i></a>
     			</td>
	            </tr>
                
                
                <?php
                    $readSub = new Read;
                    $readSub->ExeRead("categories", "WHERE category_parent = :subparent", "subparent={$category_id}");
                    if (!$readSub->getResult()):

                    else:
                        $a = 0;
                        foreach ($readSub->getResult() as $sub):
                            $a++;

                            $readCatPosts = new Read;
                            $readCatPosts->ExeRead("posts", "WHERE post_category = :categoryid", "categoryid={$sub['category_id']}");
							$countSesSubPosts = $readCatPosts->getRowCount();
                			$countSesSubCats = $readCatPosts->getRowCount();
                            ?>
                <tr class="table-light">
                <td align="">&raquo&raquo&raquo&raquo <?=$sub['category_title']; ?></td>
                <td align=""><?= date('d/m/Y', strtotime($category_date)); ?></td>
                <td align=""><?= $countSesSubPosts ?></td>
                <td align=""></td>
                <td align="center">       
     <a href="../categoria/<?= $sub['category_name']; ?>" title="Ver no site"><i class="fa fa-eye mr-1 text-primary fa-fw" style="font-size:16px" title="Ver no site"></i></a>
     <a href="painel.php?exe=categories/update&catid=<?= $sub['category_id']; ?>" title="Editar sub-categoria"><i class="fa fa-pencil mr-1 text-primary fa-fw" style="font-size:16px" title="Editar sub-categoria"></i></a>
     <a href="painel.php?exe=categories/index&delete=<?= $sub['category_id']; ?>" title="Excluir sub-categoria"><i class="fa fa-trash mr-1 text-primary fa-fw" style="font-size:16px" title="Excluir sub-categoria"></i></a>
     			</td>
	            </tr>
                
                
                
                
                 </section>
		<?php
            endforeach;
        endif;endforeach;
        endif;

        ?>
</table>
                    </header>

    </section>


</div> <!-- content home -->
</div>