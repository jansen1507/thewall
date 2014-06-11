<?php use TheWall\Core\Helpers; ?>
<nav id="navbar-main-nav" class="navbar">
    <div class="row">
        <div class="two columns" id="main-logo">
            <a href="<?php echo BASE_URL; ?>"><?php echo $this->pagetitle;  ?></a>
        </div>
        <nav class="ten columns navbar">
            <ul id="main-menu">
                <?php if(!Helpers\Auth::check()) : ?>
                    <li>
                        <form action="<?php echo BASE_URL; ?>user/login" method="post">
                            <ul>
                                <li class="field"><input class="medium input" placeholder="Email" type="text" name="email" /></li>
                                <li class="field"><input class="medium input" placeholder="Password" type="password" name="password" /></li>
                                <li class="field"><input type="submit" class="primary medium btn" value="Login" style="font-size:0.8rem;"></li>
                                <li class="field persist">
                                    <label class="checkbox">
                                        <input name="persist" value="1" type="checkbox" />
                                        <span></span><p style="color:white;font-size:10px;"> Remember me</p>
                                    </label>
                                </li>
                            </ul>
                        </form>
                    </li>
                <?php endif; ?>
                    <li id="create-btn" class="field"><button class="btn secondary medium" style="margin-left:10px;margin-top:10px;font-weight:100;line-height:26px;font-size:0.8rem;height:26px;width:123px;">Create Account</button></li>
                <?php if(Helpers\Auth::check()): ?>
                    <span style="color:white;font-size:14px;">Logged in as: <span style="font-weight: bolder;"><?php echo UserQuery::create()->filterById(Helpers\Session::get('user_id'))->findOne()->getUsername(); ?><?php echo (Helpers\Auth::isAdmin() ? '<span style="font-weight:lighter;">(admin)</span>' : ''); ?></span></span>
                    <a href="<?php echo BASE_URL.'user/logout'; ?>" alt="logout"><li class="field"><button class="btn primary medium" style="margin-bottom:3px;margin-top:10px;font-weight:100;line-height:26px;font-size:0.8rem;height:26px;width:63px;">Logout</button></a></li>
                <?php endif; ?>
            </ul>
        </nav>
        
    </div>
</nav>