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

                        <div class="tabs">
                            <div class="tab-item" data-for="followers">
                                Seguidores
                            </div>
                            <div class="tab-item active" data-for="following">
                                Seguindo
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-body" data-item="followers">
                                
                                <div class="full-friend-list">

                                    <?php foreach($user->followers as $follower): ?>
                                        <div class="friend-icon">
                                            <a href="<?php echo $base ?>/perfil/<?php echo $follower->id; ?>">
                                                <div class="friend-icon-avatar">
                                                    <img src="<?php echo $base ?>/media/avatars/<?php echo $follower->avatar; ?>" />
                                                </div>
                                                <div class="friend-icon-name">
                                                    <?php echo $follower->name; ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>

                            
                                </div>
                            </div>

                            <div class="tab-body" data-item="following">
                                
                                <div class="full-friend-list">

                                    <?php foreach($user->following as $follower): ?>
                                        <div class="friend-icon">
                                            <a href="<?php echo $base ?>/perfil/<?php echo $follower->id; ?>">
                                                <div class="friend-icon-avatar">
                                                    <img src="<?php echo $base ?>/media/avatars/<?php echo $follower->avatar; ?>" />
                                                </div>
                                                <div class="friend-icon-name">
                                                    <?php echo $follower->name; ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>        
                                    
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            
        </div>

    </section>

</section>

<?php echo $render('footer'); ?>