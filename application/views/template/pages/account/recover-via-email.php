<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Recover your password</p>
<div class="panel-body">
    <form name="FormRecover" id="recoverviaemail" method="POST" novalidate>
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" ng-model="email" name="email" id="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
            <div ng-messages="FormRecover.email.$error" ng-if="FormRecover.email.$dirty">
              <span ng-message="pattern" class="label label-danger">Please enter a valid email address.</span>
              <span ng-message="required" class="label label-danger">Email Address is required.</span>
            </div>
        </div>

        <button type="submit" id="recover_via_email_step_1" class="btn btn-primary pull-right">Recover Password</button>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right" ><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('login')?>">Sign in</a></p>
</div>
