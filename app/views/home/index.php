<?php use TheWall\Core\Helpers\Auth; ?>
<div class="row">
    <div class="eight columns">
        <div class="row">
            <?php if(Auth::check()) : ?>

                <form action="<?php echo BASE_URL.'post/post'; ?>" method="post">
                    <ul>
                        <li class="append field">
                            <input type="text" placeholder="Write something!" name="text" class="small input" style="max-width:92%;" />
                            <button class="primary btn medium" style="font-size: 15px;font-weight:100;width:50px;color:white;background-color:#3b5998;">post</button>
                        </li>
                    </ul>
                </form>
            <?php else : ?>
                <p>You need to be logged in to post something</p>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php foreach($this->posts as $post) :?>
                <div class="white-box row">
                    <p><?php echo $post->getUser()->getEmail(); ?></p>
                    <p><?php echo $post->getText(); ?></p>
                    <p><?php echo 'comments: '; ?></p>
                    <p>
                        <form action="<?php echo BASE_URL.'comment/create'; ?>" method="post">
                            <ul>
                                <li class="append field"><input type="text" placeholder="Write something!" name="text" class="small input" style="max-width:52%;" /></li>
                                <li class="append field"><button class="primary btn medium" style="font-size: 15px;font-weight:100;width:50px;color:white;background-color:#3b5998;">post</button></li>
                            </ul>
                        </form>
                    </p>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="three columns push_one white-box">
        <p>Sidebar</p>
        <ul>

        </ul>
    </div>
</div>
