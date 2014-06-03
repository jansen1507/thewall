<?php use TheWall\Core\Helpers; ?>
<div class="row">
    <div class="four columns">
        <ul id="conversations">
           <?php foreach($this->messages as $message) : ?>
               <li class="conversation">
                   <span class="username"><?php echo $message->getSender()->getEmail(); ?></span>
                   <p class="excerpt"><?php echo Helpers\truncator::excerpt($message->getText(), 50); ?></p>
               </li>
           <?php endforeach; ?>
        </ul>
    </div>
    <div class="eight columns">
        <ul id="messages">
            <?php foreach($this->messages as $message) : ?>
                <li class="message">
                    Message
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>