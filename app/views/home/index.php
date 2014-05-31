<?php use TheWall\Core\Helpers\Auth; ?>
<div class="row">
    <div class="eight columns">
        <div class="row">
            <?php if(Auth::check()) : ?>
                <form action="dky" method="post">
                    <ul>
                        <li class="append field">
                            <input type="text" placeholder="Write something!" name="post" class="small input" style="max-width:92%;" />
                            <button class="primary btn medium" style="font-size: 15px;font-weight:100;width:50px;color:white;background-color:#3b5998;">post</button>
                        </li>
                    </ul>
                </form>
            <?php else : ?>
                <p>You need to be logged in to post something</p>
            <?php endif; ?>
        </div>
        <div class="row">
            The posts !!
        </div>
    </div>
    <div class="three columns push_one white-box">
        <h6>Online People:</h6>
        <ul>
            <li>Remeeh</li>
            <li>Stirpan</li>
            <li>Lone</li>
            <li>Lise</li>
        </ul>
    </div>
</div>
