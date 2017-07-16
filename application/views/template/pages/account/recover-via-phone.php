<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Recover your password</p>
<div class="panel-body">
    <form name="FormRecover" id="recoverviaphone" method="POST" novalidate>

        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control span12"  name="username" id="username" ng-minlength="6" ng-maxlength="50" required>
            <div ng-messages="FormRecover.username.$error" ng-if="FormRecover.username.$dirty">
              <span ng-message="minlength" class="label label-danger">Username is too short</span>
              <span ng-message="maxlength" class="label label-danger">Username is too long</span>
              <span ng-message="required" class="label label-danger">Username is required</span>
            </div>
        </div>

        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" class="form-control" name="contact" id="contact" ng-model="contact" id="contact" ng-pattern="/^(.*?[0-9]){10,}$/" ng-maxlength="10"required>
        
            <div ng-messages="FormRecover.contact.$error" ng-if="FormRecover.contact.$dirty">
              <span ng-message="required" class="label label-danger">Contact is required</span>
              <span ng-message="maxlength" class="label label-danger">Please type 10 digits of your number</span>
              <span ng-message="pattern" class="label label-danger">number only</span>
            </div>
        </div>

        <button type="submit" id="recover_via_phone_step_1" ng-disabled="!FormRecover.$valid" class="btn btn-primary pull-right">Recover Password</button>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right" ><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('login')?>">Sign in</a></p>
</div>
