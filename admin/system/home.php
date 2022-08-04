<div class="postagens">
	<section class="ultimaspostagens">
    	<table class="table table-striped">
                    <tr class="">
                        <td align="" width="800"><strong>Últimas postagens</strong></td>
                        <td align="">Data</td>
                        <td align="">Visitas</td>
                        
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
        $Pager->ExePager($getPage, 10);

        $readPosts = new Read;
        $readPosts->ExeRead("posts", "ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
        if ($readPosts->getResult()):
            foreach ($readPosts->getResult() as $post):
                $posti++;
                extract($post);
                $status = (!$post_status ? 'style="background: #fffed8"' : '');
                ?>
                

             	<tr class="">
             
                <td align="">&raquo&raquo <?= Check::Words($post_title, 6) ?></td>
                <td align=""><?= date('d/m/Y', strtotime($post_date)); ?></td>
                <td align=""><?= $post_views; ?></td>
                
             </tr>
                
        <?php
    endforeach;

else:
    $Pager->ReturnPage();
    WSErro("Desculpe, ainda não existem posts cadastrados!", WS_INFOR);
endif;
?>
</table>
    </section>
    <section class="maislidas">
        	<table class="table table-striped">
                    <tr class="">
                        <td align="" width="800"><strong>Postagens + Lidas</strong></td>
                        <td align="">Data</td>
                        <td align="">Visitas</td>
                        
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
        $Pager->ExePager($getPage, 10);

        $readPosts = new Read;
        $readPosts->ExeRead("posts", "ORDER BY post_views DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
        if ($readPosts->getResult()):
            foreach ($readPosts->getResult() as $post):
                $posti++;
                extract($post);
                $status = (!$post_status ? 'style="background: #fffed8"' : '');
                ?>
                

             	<tr class="">
             
                <td align="">&raquo&raquo <?= Check::Words($post_title, 6) ?></td>
                <td align=""><?= date('d/m/Y', strtotime($post_date)); ?></td>
                <td align=""><?= $post_views; ?></td>
                
             </tr>
                
        <?php
    endforeach;

else:
    $Pager->ReturnPage();
    WSErro("Desculpe, ainda não existem posts cadastrados!", WS_INFOR);
endif;
?>
</table>
    </section>
    
 <?php
            //OBJETO READ
            $read = new Read;

            //VISITAS DO SITE
            $read->FullRead("SELECT SUM(siteviews_views) AS views FROM siteviews");
            $Views = $read->getResult()[0]['views'];

            //USUÁRIOS
            $read->FullRead("SELECT SUM(siteviews_users) AS users FROM siteviews");
            $Users = $read->getResult()[0]['users'];

            //MÉDIA DE PAGEVIEWS
            $read->FullRead("SELECT SUM(siteviews_pages) AS pages FROM siteviews");
            $ResPages = $read->getResult()[0]['pages'];
            $Pages = substr($ResPages / $Users, 0, 5);

            //POSTS
            $read->ExeRead("posts");
            $Posts = $read->getRowCount();

            
            ?>

</div>

<div class="graficos">
	<section class="navegadores">
    	 <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Páginas',     <?= $Pages; ?>],
          ['Usuários',      <?= $Posts; ?>],
          ['Postagens',  <?= $Posts; ?>],
          
        ]);

        var options = {
          title: 'Visítas por navegador',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
<div id="piechart_3d" ></di>

</section>
    <section class="visitas">
    	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ano', 'Visítas', ],
          ['2004',  1000,   ],
          ['2005',  1170,   ],
          ['2006',  660,    ],
          ['2007',  1030,   ]
        ]);

        var options = {
          title: 'Visítas no site',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div id="curve_chart"></div>
    </section>
</div>

