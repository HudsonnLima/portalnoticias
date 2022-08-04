<div class="bloco form" style="display:block">
		<a href="painel.php?exe=users/create" title="Criar Categoria" class="btn btn-primary" style="float:right;">Cadastrar Usuários</a><br /><br />

    <article>

        
        
        <?php
        $delete = filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT);
        if ($delete):
            require('_models/AdminUser.class.php');
            $delUser = new AdminUser;
            $delUser->ExeDelete($delete);
            WSErro($delUser->getError()[0], $delUser->getError()[1]);
        endif;
        ?>
        <table class="table">
                    <tr class="table-active">
                        <td align="">ID</td>
                        <td align="">Nome</td>
                        <td align="">Email</td>
                        <td align="">Registro</td>
                        <td align="">Atualização</td>
                        <td align="">Nivel</td>
                        <td align="center" colspan="2">Ações</td>
                    </tr>
                    
         <?php
            $read = new Read;
            $read->ExeRead("users", "ORDER BY user_level DESC, user_name ASC");
            if ($read->getResult()):
                foreach ($read->getResult() as $user):
                    extract($user);
                    $user_lastupdate = ($user_lastupdate  ? date('d/m/Y H:i',  strtotime($user_lastupdate)) . ' hs' : '-');
                    $nivel = ['', 'Usuário', 'Editor', 'Administrador'];
                    ?>            
                    <tr class="table-light">
                <td align=""><?= $user_id ?></td>
                <td align=""><?= $user_name . ' ' . $user_lastname; ?></td>
                <td align=""><?= $user_email; ?></td>
                <td align=""><?= date('d/m/Y', strtotime($user_registration)); ?></td>
                <td align=""><?= $user_lastupdate; ?></td>
                <td align=""><?= $nivel[$user_level]; ?></td>
                <td align="center">
                <a href="painel.php?exe=users/update&userid=<?= $user_id; ?>" title="Editar usuário"><i class="fa fa-pencil mr-1 text-primary fa-fw" title="Editar Usuário"></i></a>
    			 <a href="painel.php?exe=users/users&delete=<?= $user_id; ?>" title="Excluir usuário"><i class="fa fa-trash mr-1 text-primary fa-fw" title="Excluir Usuário"></i></a>
                
                
                </td>
             </tr>
                    <?php
                endforeach;
            endif;
            ?>
         
         
         </table>
         
         
                    
                    
                   
            

        


    </article>

    <div class="clear"></div>
</div> <!-- content home -->