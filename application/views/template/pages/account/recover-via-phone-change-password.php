<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Recover your password</p>
<div class="panel-body">

    <form name="FormChangePassword" id="recoverviaphonechangepassword" method="POST" novalidate>

         <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control" ng-model="password" name="password" ng-minlength="6" ng-maxlength="30" required password-verify="{{cpassword}}">
            <div ng-messages="FormChangePassword.password.$error" ng-if="FormChangePassword.password.$dirty">
              <span ng-message="minlength" class="label label-danger">Password is too short</span>
              <span ng-message="maxlength" class="label label-danger">Password is too long</span>
              <span ng-message="required"  class="label label-danger">Password is Required</span>
            </div>
        </div>

        <div class="form-group">
        <label>Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword" ng-model="cpassword" ng-minlength="6" ng-maxlength="30" password-verify="{{password}}">
            <div ng-messages="FormChangePassword.cpassword.$error" ng-if="FormChangePassword.cpassword.$dirty">
              <span ng-message="passwordVerify" class="label label-danger">Password not match!</span>
            </div>
        </div>

        <button type="submit" id="recover_step_3" class="btn btn-primary pull-right">Save Changes</button>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right" ><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('login')?>">Sign in</a></p>
</div>
