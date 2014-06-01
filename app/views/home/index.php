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
                <div class="row">
                    <div class="white-box twelve columns" style="margin-bottom:20px;">
                        <p><?php echo $post->getUser()->getEmail(); ?></p>
                        <p><?php echo $post->getText(); ?></p>
                        <p><?php echo 'comments: '; ?></p>
                        <?php foreach($post->getComments() as $comment) : ?>
                            <p><?php echo $comment->getText(); ?></p>
                        <?php endforeach; ?>
                        <form action="<?php echo BASE_URL.'comment/create'; ?>" method="post">
                            <ul>
                                <li class="append field">
                                    <input type="text" placeholder="Write comment!" name="text" class="small input" style="max-width: 90%" />
                                    <input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>" />
                                    <button class="primary btn medium" style="font-size: 15px;font-weight:100;width:50px;color:white;background-color:#3b5998;">post</button>
                                </li>
                            </ul>
                        </form>

                    </div>
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
