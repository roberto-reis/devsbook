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
            <?php echo $render('right-side'); ?>
        </div>
    </div>

</section>

<?php echo $render('footer'); ?>