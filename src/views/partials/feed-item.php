<div class="box feed-item" data-id="<?php echo $data->id; ?>">
    <div class="box-body">
        <div class="feed-item-head row mt-20 m-width-20">
            <div class="feed-item-head-photo">
                <a href=""><img src="<?php echo $base; ?>/media/avatars/<?php echo $data->user->avatar; ?>" /></a>
            </div>
            <div class="feed-item-head-info">
                <a href=""><span class="fidi-name"><?php echo $data->user->name; ?></span></a>
                <span class="fidi-action">
                    <?php 
                        switch($data->type) {
                            case 'text':
                                echo 'fez um post';
                                break;
                            case 'phpto':
                                echo 'postou uma foto';
                                break;
                        }
                    ?>
                </span>
                <br/>
                <span class="fidi-date"><?php echo date('d/m/Y', strtotime($data->created_at) ); ?></span>
            </div>
            <div class="feed-item-head-btn">
                <img src="<?php echo $base; ?>/assets/images/more.png" />
            </div>
        </div>
        <div class="feed-item-body mt-10 m-width-20">
            <?php echo nl2br($data->body); ?>
        </div>
        <div class="feed-item-buttons row mt-20 m-width-20">
            <div class="like-btn <?php echo ($data->liked ? 'on': ''); ?>"><?php echo $data->likeCount; ?></div>
            <div class="msg-btn"><?php echo count($data->comments); ?></div>
        </div>
        <div class="feed-item-comments">
            
            <!-- <div class="fic-item row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href=""><img src="<?php echo $base; ?>/media/avatars/<?php echo $data->user->avatar; ?>" /></a>
                </div>
                <div class="fic-item-info">
                    <a href="">Roberto</a>
                    Comentando no meu próprio post
                </div>
            </div> -->

            <div class="fic-answer row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href=""><img src="<?php echo $base; ?>/media/avatars/<?php echo $loggedUser->avatar; ?>" /></a>
                </div>
                <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
            </div>

        </div>
    </div>
</div>