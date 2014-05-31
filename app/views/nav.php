<?php use TheWall\Helpers; ?>
<nav id="navbar-main-nav" class="navbar">
    <div class="row">
        <div class="four columns" id="main-logo">
            <a href="<?php echo BASE_URL; ?>"><?php echo $this->pagetitle;  ?></a>
        </div>
        <nav class="eight columns navbar">
            <ul id="main-menu">

                <?php if(!Helpers\Auth::check()) : ?>
                    <form action="http://localhost:8888/thewall/public/user/login" method="post">
                        <li class="field"><input class="medium input" placeholder="Email" type="text" name="email" /></li>
                        <li class="field"><input class="medium input" placeholder="Password" type="password" name="password" /></li>
                        <li class="field"><input type="submit" class="primary medium btn" value="Login"></li>
                    </form>
                    <li> <span style="color:white";>OR</span> </li>
                <?php endif; ?>
                <li id="create-btn"><a>Create Account</a></li>
                <?php if(Helpers\Auth::check()): ?>
                    <li><a href="<?php echo BASE_URL.'user/logout'; ?>" alt="logout">Logout</a></li>
                <?php endif; ?>
            <ul>
        </nav>
        
    </div>
</nav>