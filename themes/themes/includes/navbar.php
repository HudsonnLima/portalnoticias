<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="<?= BASE;?>"><img src="<?=INCLUDE_PATH;?>/images/logo.png" alt="<?= SITENAME;?>" alt="<?= SITENAME;?>" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= BASE;?>">Início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= BASE; ?>quem-somos/">Quem somos <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdownMenuButton2" data-toggle="dropdown"
						<?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_id = 28 ORDER BY category_title ASC");
                        if ($readSes->getRowCount() >= 1):
                            foreach ($readSes->getResult() as $ses):
							?>
                           aria-haspopup="true" aria-expanded="false"><?= $ses['category_title'] ?> <span class="sr-only">(current)</span></a>
                        <?php 
						endforeach;
						endif;
						?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                        <?php 
						$readCat = new Read;
                                $readCat->ExeRead("categories", "WHERE category_parent = :parent ORDER BY category_title ASC", "parent={$ses['category_id']}");

                                if ($readCat->getRowCount() >= 1):
                                    foreach ($readCat->getResult() as $cat):
						?>
                            <a class="dropdown-item" href="<?= BASE?>categoria/<?= $cat['category_name'] ?> "><?= $cat['category_title'] ?></a>
                        <?php 
						endforeach;
						endif;
						?>    
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= BASE ?>categoria/colunas" id="dropdownMenuButton2" data-toggle="dropdown"
                        <?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_id = 29 ORDER BY category_title ASC");
                        if ($readSes->getRowCount() >= 1):
                            foreach ($readSes->getResult() as $ses):
							?>
                           aria-haspopup="true" aria-expanded="false"><?= $ses['category_title'] ?><span class="sr-only">(current)</span></a>
                            <?php 
						endforeach;
						endif;
						?>  
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                        <?php 
						$readCat = new Read;
                                $readCat->ExeRead("categories", "WHERE category_parent = :parent ORDER BY category_title ASC", "parent={$ses['category_id']}");

                                if ($readCat->getRowCount() >= 1):
                                    foreach ($readCat->getResult() as $cat):
						?>
                            <a class="dropdown-item" href="<?= BASE?>categoria/<?= $cat['category_name'] ?> "><?= $cat['category_title'] ?></a>
                        <?php 
						endforeach;
						endif;
						?>    
                            
                        </div>
                    </li>
                                        
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="dropdownMenuButton3" data-toggle="dropdown"
                        <?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_id = 30 ORDER BY category_title ASC");
                        if ($readSes->getRowCount() >= 1):
                            foreach ($readSes->getResult() as $ses):
						?>
                           aria-haspopup="true" aria-expanded="false"><?= $ses['category_title'] ?><span class="sr-only">(current)</span></a>
                            <?php 
						endforeach;
						endif;
						?>  
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                        <?php 
						$readCat = new Read;
                                $readCat->ExeRead("categories", "WHERE category_parent = :parent ORDER BY category_title ASC", "parent={$ses['category_id']}");

                                if ($readCat->getRowCount() >= 1):
                                    foreach ($readCat->getResult() as $cat):
						?>
                            <a class="dropdown-item" href="<?= BASE?>categoria/<?= $cat['category_name'] ?> "><?= $cat['category_title'] ?></a>
                        <?php 
						endforeach;
						endif;
						?>    
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= BASE ?>categoria/colunas" id="dropdownMenuButton2" data-toggle="dropdown"
                        <?php
                        $readSes = new Read;
                        $readSes->ExeRead("categories", "WHERE category_id = 45 ORDER BY category_title ASC");
                        if ($readSes->getRowCount() >= 1):
                            foreach ($readSes->getResult() as $ses):
							?>
                           aria-haspopup="true" aria-expanded="false"><?= $ses['category_title'] ?><span class="sr-only">(current)</span></a>
                            <?php 
						endforeach;
						endif;
						?>  
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                        <?php 
						$readCat = new Read;
                                $readCat->ExeRead("categories", "WHERE category_parent = :parent ORDER BY category_title ASC", "parent={$ses['category_id']}");

                                if ($readCat->getRowCount() >= 1):
                                    foreach ($readCat->getResult() as $cat):
						?>
                            <a class="dropdown-item" href="<?= BASE?>categoria/<?= $cat['category_name'] ?> "><?= $cat['category_title'] ?></a>
                        <?php 
						endforeach;
						endif;
						?>    
                            
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= BASE;?>contato/">Contato <span class="sr-only">(current)</span></a>
                    </li>
                    
                    
                    
                </ul>
            </div>
        </nav>
    </div>
</div>