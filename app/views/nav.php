<?php use TheWall\Helpers\Auth; ?>
<nav id="navbar-main-nav" class="navbar">
    <div class="row">
        <div class="four columns" id="main-logo">
            <a href="<?php echo BASE_URL; ?>"><?php echo $this->pagetitle;  ?></a>
        </div>
        <nav class="eight columns navbar">
            <ul id="main-menu">
                <li id="create-btn"><a>Create</a></li>
                <?php if(!Auth::check()) : ?>
                    <li id="login-btn"><a>Login</a></li>
                <?php endif; ?>
                <?php if(Auth::check()): ?>
                    <li><a href="<?php echo BASE_URL.'user/logout'; ?>" alt="logout">Logout</a></li>
                <?php endif; ?>
            <ul>
        </nav>
        
    </div>
</nav>