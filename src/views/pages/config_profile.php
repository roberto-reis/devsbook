<?php echo $render('header', [ 'loggedUser' => $loggedUser ]); ?>

<section class="container main">  

    <?php echo $render('sidebar', ['activeMenu'=>'config']); ?>


    <div class="row">
        <div class="column pr-5">

            <div class="form-config">
                <h2>Configurações</h2>

                <form action="<?php echo $base; ?>/config" method="post" enctype="multipart/form-data">

                    <?php if( !empty($flash) ): ?>
                        <div class="flash">
                            <?php echo $flash; ?>
                        </div>
                    <?php endif; ?>
                    

                    <label for="avatar">Novo Avatar:
                        <input type="file" class="input" name="avatar" id="avatar">
                        <img class="image-edit" src="<?php echo $base; ?>/media/avatars/<?php echo $user->avatar; ?>" alt="">
                    </label><br/>

                    <label for="cover">Nova Capa:
                        <input type="file" class="input" name="cover" id="cover">
                        <img class="image-edit" src="<?php echo $base; ?>/media/covers/<?php echo $user->cover; ?>" alt="">
                    </label><br/>

                    <hr><br/>

                    <label for="name">Nome Completo:</label>
                    <input type="text" class="input" name="name" id="name" value="<?php echo $user->name; ?>"><br/>

                    <label for="birthdate">Data nascimento:</label>
                    <input type="text" name="birthdate" id="birthdate" value="<?php echo date('d/m/Y', strtotime($user->birthdate)); ?>"><br/>

                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email" value="<?php echo $user->email; ?>"><br/>

                    <label for="city">Cidade:</label>
                    <input type="text" name="city" id="city" value="<?php echo $user->city; ?>"><br/>

                    <label for="work">Trabalho:</label>
                    <input type="text" name="work" id="work" value="<?php echo $user->work; ?>"><br/>

                    <hr><br>

                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password"><br/>

                    <label for="confirmPassword">Confirmar senha:</label>
                    <input type="password" name="confirmPassword" id="confirmPassword"><br/>


                    <button class="button" type="submit">Salvar</button>
                </form>

            </div> 

        </div>
    </div>

</section>

<?php echo $render('footer'); ?>