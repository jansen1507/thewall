<?php use TheWall\Core\Helpers; ?>
<div class="row">
    <div class="eight columns">
        <div class="row">
            <?php if(Helpers\Auth::check()) : ?>
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
        <div id="postsCon" class="row">
            <?php foreach($this->posts as $post) : ?>
            <div class="row post">
                <div class="row header">
                    <?php echo $post->getUser()->getEmail(); ?>
                </div>
                <div class="row body">
                    <?php echo $post->getText(); ?>
                </div>
                <div class="row comments">
                    <?php foreach($post->getComments() as $comment) : ?>
                    <div class="row comment">
                        <span class="username"><?php echo $comment->getUser()->getEmail(); ?></span> <?php echo $comment->getText(); ?>
                    </div>
                    <?php endforeach; ?>
                    <?php if(Helpers\Auth::check()) : ?>
                    <div class="row new">
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
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if(Helpers\Auth::check()) : ?>
    <div class="four columns white-box">
        <p>Your messages</p>
        <?php if(count($this->messages) > 0) : ?>
            <ul>
            <?php foreach($this->messages as $message): ?>
                <li>
                    <h6><?php echo $message->getSender()->getEmail(); ?></h6>
                    <p><?php echo $message->getText(); ?></p>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>You have no messages!</p>
        <?php endif; ?>
            <button id="sendMessageButton" class="primary btn medium" style="font-size: 15px;font-weight:100;color:white;background-color:#3b5998;">Create New Message</button>
    <?php endif; ?>
    </div>
</div>
