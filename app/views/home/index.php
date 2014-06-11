<?php use TheWall\Core\Helpers; ?>
<div class="row">

    <div class="eight columns">
        <div class="row">
            <?php if(Helpers\Auth::check()) : ?>
                <form action="<?php echo BASE_URL.'post/create'; ?>" method="post">
                    <ul>
                        <li class="append field">
                            <input type="text" placeholder="Write something!" name="text" class="small input" style="max-width:92%;" />
                            <input type="hidden" name="csrftoken" value="<?php echo Helpers\Session::get('csrftoken'); ?>" />
                            <button class="primary btn medium" style="font-size: 15px;font-weight:100;width:50px;color:white;background-color:#3b5998;">post</button>
                        </li>
                    </ul>
                </form>
            <?php else : ?>
                <p>You need to be logged in to post something</p>
            <?php endif; ?>
        </div>
        <div id="postsCon" class="row">

            <?php foreach($this->posts as $post) : ?>
            <div class="row post">
                <div class="row header">
                    <?php echo $post->getUser()->getUsername(); ?>
                </div>
                <div class="row body">
                    <?php echo $post->getText(); ?>
                </div>
                <div class="row comments">
                    <?php foreach($post->getComments() as $comment) : ?>
                    <div class="row comment">
                        <div class="twelve columns">
                            <span class="username"><?php echo $comment->getUser()->getUsername(); ?></span> <?php echo $comment->getText(); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php if(Helpers\Auth::check()) : ?>
                    <div class="row new">
                        <form action="<?php echo BASE_URL.'comment/create'; ?>" method="post">
                            <ul>
                                <li class="append field">
                                    <input type="text" placeholder="Write comment!" name="text" class="small input" style="max-width: 90%" />
                                    <input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>" />
                                    <input type="hidden" name="csrftoken" value="<?php echo Helpers\Session::get('csrftoken'); ?>" />
                                    <button class="primary btn medium" style="font-size: 15px;font-weight:100;width:50px;color:white;background-color:#3b5998;">post</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if(Helpers\Auth::check()) : ?>
    <div class="four columns white-box">
        <ul>
            <li>
                <a href="<?php echo BASE_URL.'messages'; ?>" alt="messages">Messages (<?php echo count($this->messages); ?>)</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL.'user/settings'; ?>" alt="settings">Settings</a>
            </li>
            <?php if(Helpers\Auth::isAdmin()) : ?>
            <li>
                <a href="<?php echo BASE_URL.'user/users'; ?>" alt="users">Users</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>

    <?php endif; ?>
</div>