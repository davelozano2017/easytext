<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Sign In</p>
<div class="panel-body">
    <form>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control span12">
        </div>
        <div class="form-group">
        <label>Password</label>
            <input type="password" class="form-controlspan12 form-control">
        </div>
        <button type="submit" class="btn btn-primary pull-right">Sign In</button>
        <label class="remember-me"><input type="checkbox"> Remember me</label>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right"><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('recover')?>">Forgot your password?</a></p>
</div>
