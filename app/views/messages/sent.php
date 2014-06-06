<?php use TheWall\Core\Helpers; ?>
<div class="row">
    <div class="twelve columns">
        <table>
            <thead>
            <tr>
                <th>To:</th>
                <th>Message Excerpt:</th>
                <th><th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($this->messages as $message) : ?>
                <tr>
                    <td><?php echo $message->getReceiver()->getEmail(); ?></td>
                    <td><?php echo Helpers\truncator::excerpt($message->getText(), 50); ?></td>
                    <td><a href="<?php echo BASE_URL.'messages/show/'.$message->getId(); ?>">Open</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>