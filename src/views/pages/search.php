<?php echo $render('header', [ 'loggedUser' => $loggedUser ]); ?>

<section class="container main">  

    <?php echo $render('sidebar', ['activeMenu'=>'search']); ?>

    <section class="feed mt-10">

        <div class="row">
            <div class="column pr-5">

            <h2>Você pesquisou por: <?php echo $searchTerm; ?></h2>

            <div class="full-friend-list">

                <?php foreach($users as $user): ?>
                    <div class="friend-icon">
                        <a href="<?php echo $base ?>/perfil/<?php echo $user->id; ?>">
                            <div class="friend-icon-avatar">
                                <img src="<?php echo $base ?>/media/avatars/<?php echo $user->avatar; ?>" />
                            </div>
                            <div class="friend-icon-name">
                                <?php echo $user->name; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>

            </div>
            <div class="column side pl-5">
                <?php echo $render('right-side'); ?>
            </div>
        </div>

    </section>

</section>

<?php echo $render('footer'); ?>