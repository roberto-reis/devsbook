<?php echo $render('header', [ 'loggedUser' => $loggedUser ]); ?>

<section class="container main">  

    <?php echo $render('sidebar', ['activeMenu'=>'profile']); ?>

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

            <div class="column side pr-5">
                
                <div class="box">
                    <div class="box-body">
                        
                        <div class="user-info-mini">
                            <img src="<?php echo $base; ?>/assets/images/calendar.png" />
                            <?php echo date('d/m/Y', strtotime($user->birthdate)); ?> (<?php echo $user->ageYears; ?> anos)
                        </div>

                        <?php if( !empty($user->city) ): ?>
                            <div class="user-info-mini">
                                <img src="<?php echo $base; ?>/assets/images/pin.png" />
                                <?php echo $user->city; ?>
                            </div>
                        <?php endif; ?>

                        <?php if( !empty($user->work) ): ?>
                            <div class="user-info-mini">
                                <img src="<?php echo $base; ?>/assets/images/work.png" />
                                <?php echo $user->work; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="box">
                    <div class="box-header m-10">
                        <div class="box-header-text">
                            Seguindo
                            <span>(<?php echo count($user->following); ?>)</span>
                        </div>
                        <div class="box-header-buttons">
                            <a href="<?php echo $base; ?>/perfil/<?php echo $user->id; ?>/amigos">ver todos</a>
                        </div>
                    </div>
                    <div class="box-body friend-list">
                        
                        <?php for($q=0; $q < 9 ; $q++): ?>
                            <?php if( isset($user->following[$q]) ): ?>
                                <div class="friend-icon">
                                    <a href="<?php echo $base; ?>/perfil/<?php echo $user->following[$q]->id; ?>">
                                        <div class="friend-icon-avatar">
                                            <img src="<?php echo $base; ?>/media/avatars/<?php echo $user->following[$q]->avatar; ?>" />
                                        </div>
                                        <div class="friend-icon-name">
                                            <?php echo $user->following[$q]->name; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </div>
                </div>

            </div>
            <div class="column pl-5">

                <div class="box">
                    <div class="box-header m-10">
                        <div class="box-header-text">
                            Fotos
                            <span>(<?php echo count($user->photos); ?>)</span>
                        </div>
                        <div class="box-header-buttons">
                            <a href="">ver todos</a>
                        </div>
                    </div>
                    <div class="box-body row m-20">

                        <?php for($q=0; $q < 4; $q++): ?>
                            <?php if( isset($user->photos[$q]) ): ?>
                                <div class="user-photo-item">
                                    <a href="#modal-<?php echo $user->photos[$q]->id; ?>" rel="modal:open">
                                        <img src="<?php echo $base; ?>/media/uploads/<?php echo $user->photos[$q]->body; ?>" />
                                    </a>
                                    <div id="modal-<?php echo $user->photos[$q]->id; ?>" style="display:none">
                                        <img src="<?php echo $base; ?>/media/uploads/<?php echo $user->photos[$q]->body; ?>" />
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>                        

                    </div>
                </div>

                <?php if($user->id == $loggedUser->id): ?>
                    <?php echo $render('feed-editor', [ 'user' => $loggedUser ]); ?>
                <?php endif; ?>

                <?php foreach($feed['posts'] as $feedItem): ?>
                    <?php echo $render('feed-item', [
                            'data' => $feedItem,
                            'loggedUser' => $loggedUser
                        ]); ?>
                <?php endforeach; ?>

                <div class="feed-pagination">
                    <?php for($q=0; $q < $feed['pageCount']; $q++): ?>
                        <a class=" <?php echo $feed['currentPage'] == $q ? 'active': ''; ?> " href="<?php echo $base; ?>/perfil/<?php echo $user->id; ?>?page=<?php echo $q; ?>"><?php echo $q + 1; ?></a>
                    <?php endfor; ?>
                </div>


            </div>
            
        </div>

    </section>

</section>

<?php echo $render('footer'); ?>