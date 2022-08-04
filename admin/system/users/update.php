<div class="content">
<div class="content titulo">Atualizar usuário</div>

    <article>
        <?php
        $ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $userId = filter_input(INPUT_GET, 'userid', FILTER_VALIDATE_INT);

        if ($ClienteData && $ClienteData['SendPostForm']):
            unset($ClienteData['SendPostForm']);

            require('_models/AdminUser.class.php');
            $cadastra = new AdminUser;
            $cadastra->ExeUpdate($userId, $ClienteData);

            WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        else:
            $ReadUser = new Read;
            $ReadUser->ExeRead("users", "WHERE user_id = :userid", "userid={$userId}");
            if (!$ReadUser->getResult()):

            else:
                $ClienteData = $ReadUser->getResult()[0];
                unset($ClienteData['user_password']);
            endif;
        endif;

        $checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
        if ($checkCreate && empty($cadastra)):
            WSErro("O usuário <b>{$ClienteData['user_name']}</b> foi cadastrado com sucesso no sistema!", WS_ACCEPT);
        endif;
        ?>
		
        <form name="UserEditForm" action="" method="post" enctype="multipart/form-data"/>
        <div class="form-row">
        
        <div class="form-group col-md-6">
            <div class="form-floating">
              <input type="text" name="user_name" class="form-control" id="floatingInput" value="<?php if (!empty($ClienteData['user_name'])) echo $ClienteData['user_name']; ?>">
              <label for="floatingInput">Nome:</label>
            </div>
        </div>
        
        <div class="form-group col-md-6">
            <div class="form-floating">
              <input type="text" name="user_lastname" class="form-control" id="floatingInput" value="<?php if (!empty($ClienteData['user_lastname'])) echo $ClienteData['user_lastname']; ?>">
              <label for="floatingInput">Sobrenome:</label>
            </div>
         </div>
         
         <div class="form-group col-md-4">
            <div class="form-floating">
              <input type="text" name="user_email" class="form-control" id="floatingInput" value="<?php if (!empty($ClienteData['user_email'])) echo $ClienteData['user_email']; ?>">
              <label for="floatingInput">Email:</label>
            </div>
         </div>
         
         <div class="form-group col-md-4">
            <div class="form-floating">
              <input type="password" name="user_password" class="form-control" id="floatingInput" value="<?php if (!empty($ClienteData['user_password'])) echo $ClienteData['user_password']; ?>">
              <label for="floatingInput">Senha:</label>
            </div>
         </div>
          <div class="form-group col-md-4">
                <div class="form-floating ">
                  <select class="form-select" name="user_level" id="floatingSelectGrid" aria-label="Floating label select example">
                 <option disabled="disabled" selected="selected" value=""> Seleciona o nível deste usuário: </option>                        
                       <option value = "1" <?php if (isset($ClienteData['user_level']) && $ClienteData['user_level'] == 1) echo 'selected="selected"'; ?>>Usuário</option>
                        <option value="2" <?php if (isset($ClienteData['user_level']) && $ClienteData['user_level'] == 2) echo 'selected="selected"'; ?>>Editor</option>
                        <option value="3" <?php if (isset($ClienteData['user_level']) && $ClienteData['user_level'] == 3) echo 'selected="selected"'; ?>>Administrador</option>
                </select>
              <label for="floatingSelectGrid">Nível do usuário: &nbsp;&nbsp;</label>
                </div>     
      		</div> 
		</div>
        
        <input type="submit" name="SendPostForm" value="Editar Usuário" class="btn btn-primary" />
        </form>
       
    </article>
    <div class="clear"></div>
</div> <!-- content home -->