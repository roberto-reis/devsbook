      <aside class="mt-10">
        <nav>
            <a href="<?php echo $base ?>/">
                <div class="menu-item <?php echo $activeMenu == 'home' ? 'active': ''; ?>">
                    <div class="menu-item-icon">
                        <img src="<?php echo $base ?>/assets/images/home-run.png" width="16" height="16" />
                    </div>
                    <div class="menu-item-text">
                        Home
                    </div>
                </div>
            </a>
            <a href="<?php echo $base ?>/perfil">
                <div class="menu-item <?php echo $activeMenu == 'profile' ? 'active': ''; ?>">
                    <div class="menu-item-icon">
                        <img src="<?php echo $base ?>/assets/images/user.png" width="16" height="16" />
                    </div>
                    <div class="menu-item-text">
                        Meu Perfil
                    </div>
                </div>
            </a>
            <a href="<?php echo $base ?>/amigos">
                <div class="menu-item <?php echo $activeMenu == 'friends' ? 'active': ''; ?>">
                    <div class="menu-item-icon">
                        <img src="<?php echo $base ?>/assets/images/friends.png" width="16" height="16" />
                    </div>
                    <div class="menu-item-text">
                        Amigos
                    </div>
                    <div class="menu-item-badge">
                        33
                    </div>
                </div>
            </a>
            <a href="<?php echo $base ?>/fotos">
                <div class="menu-item <?php echo $activeMenu == 'photos' ? 'active': ''; ?>">
                    <div class="menu-item-icon">
                        <img src="<?php echo $base ?>/assets/images/photo.png" width="16" height="16" />
                    </div>
                    <div class="menu-item-text">
                        Fotos
                    </div>
                </div>
            </a>
            <div class="menu-splitter"></div>
            <a href="<?php echo $base ?>/config">
                <div class="menu-item <?php echo $activeMenu == 'config' ? 'active': ''; ?>">
                    <div class="menu-item-icon">
                        <img src="<?php echo $base ?>/assets/images/settings.png" width="16" height="16" />
                    </div>
                    <div class="menu-item-text">
                        Configura????es
                    </div>
                </div>
            </a>
            <a href="<?php echo $base ?>/sair">
                <div class="menu-item">
                    <div class="menu-item-icon">
                        <img src="<?php echo $base ?>/assets/images/power.png" width="16" height="16" />
                    </div>
                    <div class="menu-item-text">
                        Sair
                    </div>
                </div>
            </a>
        </nav>
    </aside>
<section class="feed mt-10">

