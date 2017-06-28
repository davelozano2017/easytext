<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Sign In</p>
<div class="panel-body">
    <form name="FormLogin" id="login" method="POST" novalidate>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" ng-model="username" name="username" id="username" ng-minlength="6" ng-maxlength="50" required>
            <div ng-messages="FormLogin.username.$error" ng-if="FormLogin.username.$dirty">
              <span ng-message="minlength" class="label label-danger">Username is too short</span>
              <span ng-message="maxlength" class="label label-danger">Username is too long</span>
              <span ng-message="required" class="label label-danger">Username is required</span>
            </div>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control" ng-model="password" name="password" ng-minlength="6" ng-maxlength="30" required>
            <div ng-messages="FormLogin.password.$error" ng-if="FormLogin.password.$dirty">
              <span ng-message="minlength" class="label label-danger">Password is too short</span>
              <span ng-message="maxlength" class="label label-danger">Password is too long</span>
              <span ng-message="required"  class="label label-danger">Password is Required</span>
            </div>
        </div>
        <button type="submit" id="login" ng-disabled="FormLogin.$invalid" class="btn btn-primary pull-right">Sign In</button>
        <label class="remember-me"><input type="checkbox"> Remember me</label>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right"><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('recover')?>">Forgot your password?</a></p>
</div>
