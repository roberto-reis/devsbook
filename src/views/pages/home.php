<?php echo $render('header', [ 'loggedUser' => $loggedUser ]); ?>


<?php echo $render('sidebar'); ?>

            
            <div class="row">
                <div class="column pr-5">

                    <?php echo $render('feed-editor', [ 'user' => $loggedUser ]); ?>
                    
                    <?php echo $render('feed-item'); ?>

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