
<div class="content list_content">

    <section>
	
        <br />

        <table class="table table-striped">
                    <tr class="">
                        <td align="" width="800">Matéria</td>
                        <td align="">Data</td>
                        <td align="">Visitas</td>
                        <td align="center" colspan="3">Ações</td>
                    </tr>

        <?php
        $empty = filter_input(INPUT_GET, 'empty', FILTER_VALIDATE_BOOLEAN);
        if ($empty):
            WSErro("Oppsss: Você tentou editar um post que não existe no sistema!", WS_INFOR);
        endif;

        $action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
        if ($action):
            require ('_models/AdminPost.class.php');

            $postAction = filter_input(INPUT_GET, 'post', FILTER_VALIDATE_INT);
            $postUpdate = new AdminPost;

            switch ($action):
                case 'active':
                    $postUpdate->ExeStatus($postAction, '1');
                    WSErro("O status do post foi atualizado para <b>ativo</b>. Post publicado!", WS_ACCEPT);
                    break;

                case 'inative':
                    $postUpdate->ExeStatus($postAction, '0');
                    WSErro("O status do post foi atualizado para <b>inativo</b>. Post agora é um rascunho!", WS_ALERT);
                    break;

                case 'delete':
                    $postUpdate->ExeDelete($postAction);
                    WSErro($postUpdate->getError()[0], $postUpdate->getError()[1]);
                    break;

                default :
                    WSErro("Ação não foi identifica pelo sistema, favor utilize os botões!", WS_ALERT);
            endswitch;
        endif;

        $posti = 0;
        $getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        $Pager = new Pager('painel.php?exe=posts/index&page=');
        $Pager->ExePager($getPage, 20);

        $readPosts = new Read;
        $readPosts->ExeRead("posts", "ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
        if ($readPosts->getResult()):
            foreach ($readPosts->getResult() as $post):
                $posti++;
                extract($post);
                $status = (!$post_status ? 'style="background: #fffed8"' : '');
                ?>
                

             	<tr class="">
             
                <td align="">&raquo&raquo <?= Check::Words($post_title, 10) ?></td>
                <td align=""><?= date('d/m/Y', strtotime($post_date)); ?></td>
                <td align=""><?= $post_views; ?></td>
                <td align="center">
                <a target="_blank" href="../artigo/<?= $post_name; ?>" title="Ver Post"><i class="fa fa-eye mr-1 text-primary fa-fw" style="font-size:16px" title="Ver no site"></i></a>
                <a href="painel.php?exe=posts/update&postid=<?= $post_id; ?>"><i class="fa fa-edit mr-1 text-primary fa-fw" style="font-size:16px" title="Editar"></i></a>
                <?php if (!$post_status): ?>
                <a href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=active"><i class="fa fa-times mr-1 text-primary fa-fw" style="font-size:16px" title="Ativar"></i></a>
                <?php else: ?>
                <a href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=inative"><i class="fa fa-check mr-1 text-primary fa-fw" style="font-size:16px" title="Desativar"></i></a>
                <?php endif; ?>
                
                <a href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=delete"><i class="fa fa-trash mr-1 text-primary fa-fw" style="font-size:16px" title="Excluir"></i></a>                        </td>
             </tr>
                
        <?php
    endforeach;

else:
    $Pager->ReturnPage();
    WSErro("Desculpe, ainda não existem posts cadastrados!", WS_INFOR);
endif;
?>
</table>
        <div class="clear"></div>
    </section>

<?php
$Pager->ExePaginator("posts");
echo $Pager->getPaginator();
?>

    <div class="clear"></div>
</div> <!-- content home -->