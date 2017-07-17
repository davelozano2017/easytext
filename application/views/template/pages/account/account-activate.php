<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Activate your account</p>
<div class="panel-body">
    <form name="FormActivate" id="activateform" method="POST" novalidate>
        
        <div class="form-group">
        <label>Contact Number</label>
        <input type="text" class="form-control" name="activationcode" id="activationcode" ng-model="activationcode" ng-pattern="/^(.*?[0-9]){6,}$/" ng-maxlength="6" required>
        <div ng-messages="FormActivate.activationcode.$error" ng-if="FormActivate.activationcode.$dirty">
            <span ng-message="required" class="label label-danger">Contact is required</span>
            <span ng-message="maxlength" class="label label-danger">Please type 6 digits of your number</span>
            <span ng-message="pattern" class="label label-danger">number only</span>
        </div>
        </div>

        <button type="submit" id="activateform" ng-disabled="!FormActivate.$valid" class="btn btn-primary pull-right">Verify</button>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right" ><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('login')?>">Sign in</a></p>
</div>
