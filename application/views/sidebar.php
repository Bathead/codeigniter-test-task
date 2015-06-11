<aside class="right-sidebar">
    <div class="inside">
    <?if(!$this->ion_auth->logged_in()):?>
    <form class="pure-form pure-form-stacked" action="/auth/login" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>Auth Form</legend>
            <?if($this->session->userdata('message')) echo $this->session->userdata('message');?>
            <label for="email">Email</label>
            <input id="email" type="email" name="identity" placeholder="Email">

            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Password">

            <label for="remember" class="pure-checkbox">
                <input id="remember" type="checkbox" name="remember"> Remember me
            </label>

            <button type="submit" class="pure-button pure-button-primary">Sign in</button>
        </fieldset>
    </form>
    <?else:?>
        You are logged in as <b><?=$user->username?></b>.
        <p><a href="/auth/logout">Logout</a></p>
        <?endif;?>
    </div>
</aside>