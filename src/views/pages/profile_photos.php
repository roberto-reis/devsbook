<?php echo $render('header', [ 'loggedUser' => $loggedUser ]); ?>

<section class="container main">  

    <?php echo $render('sidebar', ['activeMenu'=>'friends']); ?>

    <section class="feed">

        <div class="row">
            <div class="box flex-1 border-top-flat">
                <div class="box-body">
                    <div class="profile-cover" style="background-image: url('<?php echo $base; ?>/media/covers/<?php echo $user->cover; ?>');"></div>
                    <div class="profile-info m-20 row">
                        <div class="profile-info-avatar">
                            <img src="<?php echo $base; ?>/media/avatars/<?php echo $user->avatar; ?>" />
                        </div>
                        <div class="profile-info-name">
                            <div class="profile-info-name-text"><?php echo $user->name; ?></div>
                            <div class="profile-info-location"><?php echo $user->city; ?></div>
                        </div>
                        <div class="profile-info-data row">

                            <?php if($user->id != $loggedUser->id): ?>
                                <div class="profile-info-item m-width-20">
                                    <a href="<?php echo $base; ?>/perfil/<?php echo $user->id; ?>/follow" class="button"><?php echo (!$isFollowing) ? 'Seguir' : 'Deixa de Seguir'; ?></a>
                                </div>
                            <?php endif; ?>

                            <div class="profile-info-item m-width-20">
                                <div class="profile-info-item-n"><?php echo count($user->followers); ?></div>
                                <div class="profile-info-item-s">Seguidores</div>
                            </div>
                            <div class="profile-info-item m-width-20">
                                <div class="profile-info-item-n"><?php echo count($user->following); ?></div>
                                <div class="profile-info-item-s">Seguindo</div>
                            </div>
                            <div class="profile-info-item m-width-20">
                                <div class="profile-info-item-n"><?php echo count($user->photos); ?></div>
                                <div class="profile-info-item-s">Fotos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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