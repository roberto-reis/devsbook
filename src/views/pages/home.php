<?php echo $render('header', [ 'loggedUser' => $loggedUser ]); ?>

<section class="container main">  

<?php echo $render('sidebar', ['activeMenu'=>'home']); ?>

            
            <div class="row">
                <div class="column pr-5">

                    <?php echo $render('feed-editor', [ 'user' => $loggedUser ]); ?>

                    <?php foreach($feed['posts'] as $feedItem): ?>
                        <?php echo $render('feed-item', [
                                'data' => $feedItem,
                                'loggedUser' => $loggedUser
                            ]); ?>
                    <?php endforeach; ?>

                    <div class="feed-pagination">
                        <?php for($q=0; $q < $feed['pageCount']; $q++): ?>
                            <a class=" <?php echo $feed['currentPage'] == $q ? 'active': ''; ?> " href="<?php echo $base; ?>/?page=<?php echo $q; ?>"><?php echo $q + 1; ?></a>
                        <?php endfor; ?>
                    </div>

                </div>
                <div class="column side pl-5">
                    <div class="box banners">
                        <div class="box-header">
                            <div class="box-header-text">Patrocinios</div>
                            <div class="box-header-buttons">
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <a href=""><img src="https://teste.com.br/media/courses/php-nivel-1.jpg" /></a>
                            <a href=""><img src="https://teste.com.br/media/courses/laravel-nivel-1.jpg" /></a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body m-10">
                            Criado com amor por Roberto
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section>

<?php echo $render('footer'); ?>