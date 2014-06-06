<div class="row">
    <div class="twelve columns">
        <div class="row">
            <p>From:</p>
            <?php echo $this->message->getSender()->getEmail(); ?>
        </div>
        <div class="row white-box">
            <p>Content:</p>
            <?php echo $this->message->getText(); ?>
        </div>
    </div>
</div>