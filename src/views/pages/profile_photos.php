<?php echo $render('header', [ 'loggedUser' => $loggedUser ]); ?>

<section class="container main">  

    <?php echo $render('sidebar', ['activeMenu'=>'photos']); ?>

    <section class="feed">

        <?= $render('perfil-header', [
            'loggedUser' => $loggedUser,
            'user' => $user,
            'isFollowing' => $isFollowing
        ]); ?>
        
        <div class="row">

            <div class="column">
                        
                <div class="box">
                    <div class="box-body">

                        <div class="full-user-photos">

                            <?php if(count($user->photos) > 0): ?>
                                <?php foreach($user->photos as $photo): ?>
                                    <div class="user-photo-item">
                                        <a href="#modal-<?php echo $photo->id; ?>" rel="modal:open">
                                            <img src="<?php echo $base; ?>/media/uploads/<?php echo $photo->body; ?>" />
                                        </a>
                                        <div id="modal-<?php echo $photo->id; ?>" style="display:none">
                                            <img src="<?php echo $base; ?>/media/uploads/<?php echo $photo->body; ?>" />
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                Este usuário não possui fotos.
                            <?php endif; ?>

                        </div>
                        

                    </div>
                </div>

            </div>
            
        </div>

    </section>

</section>

<?php echo $render('footer'); ?>