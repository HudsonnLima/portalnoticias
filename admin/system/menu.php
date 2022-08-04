<header>
<!-- End vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center">
            <img id="fotomenu" loading="lazy" src="images/logo.png" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
            <?php extract($_SESSION['userlogin']); ?>
            <h4 class="m-0"><?= "{$user_name}"; ?></h4>
            <p class="font-weight-normal text-muted mb-0">
            <?php if (isset($user_level) && $user_level == 1) echo 'Usuário'; ?>
            <?php if (isset($user_level) && $user_level == 2) echo 'Editor'; ?>
            <?php if (isset($user_level) && $user_level == 3) echo 'Administrador'; ?>
            </p>
            </div>
        </div>
    </div>
			            
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Painel Administrativo</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="./" class="nav-link text-dark">
                <i class="fa fa-signal mr-3 text-primary fa-fw"></i>
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="../" target="_blank"  class="nav-link text-dark">
                <i class="fa fa-home mr-3 text-primary fa-fw" style="font-size:20px"></i>
                Ver Site
            </a>
        </li>

        <li class="nav-item">
            <a href="painel.php?logoff=true" class="nav-link text-dark">
                <i class="fa fa-sign-out mr-3 text-primary fa-fw" style="font-size:20px"></i>
                Sair
            </a>
        </li>
    </ul>
    <br>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Artigos</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="painel.php?exe=posts/create" title="Criar artigo" class="nav-link text-dark">
                <i class="fa fa-keyboard-o mr-3 text-primary fa-fw" style="font-size:20px"></i>Criar
            </a>
        </li>
        <li class="nav-item">
            <a href="painel.php?exe=posts/index" title="Editar artigo" class="nav-link text-dark">
                <i class="fa fa-edit mr-3 text-primary fa-fw" style="font-size:20px"></i>Editar
            </a>
        </li>
        <li class="nav-item">
            <a href="painel.php?exe=categories/index" class="nav-link text-dark">
                <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                Categorias
            </a>
        </li>
    </ul>

    <br>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Usuários</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="painel.php?exe=users/profile" title="Perfil" class="nav-link text-dark">
                <i class="fa fa-user mr-3 text-primary fa-fw" style="font-size:20px"></i>
                Meu Perfil
            </a>
        </li>

        <li class="nav-item">
            <a href="painel.php?exe=users/create" title="Criar Usuário" class="nav-link text-dark">
                <i class="fa fa-user-plus mr-3 text-primary fa-fw" style="font-size:20px"></i>
                Cadastrar
            </a>
        </li>
        <li class="nav-item">
            <a href="painel.php?exe=users/users" title="Gerenciar Usuário" class="nav-link text-dark">
                <i class="fa fa-user-o mr-3 text-primary fa-fw" style="font-size:20px"></i>
                Listar Usuários
            </a>
        </li>
        
    </ul>
    <br />
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Configurações</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="<?=BASE?>admin/db/" title="Perfil" class="nav-link text-dark">
                <i class="fa fa-database mr-3 text-primary fa-fw" style="font-size:20px"></i>
                Backup DB
            </a>
        </li>
    </ul>

    <br>

    </ul>
</div>
</header>
<!-- End vertical navbar -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>