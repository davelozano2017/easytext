<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Recover your password</p>
<div class="panel-body">

    <form name="FormSecurityCode" id="recoverviaemailinsertsecuritycode" method="POST" novalidate>

        <div class="form-group">
            <label>Security Code</label>
            <input type="text" class="form-control" name="securitycode" id="securitycode" ng-model="securitycode" ng-pattern="/^(.*?[0-9]){6,}$/" ng-maxlength="6" required>
            <div ng-messages="FormSecurityCode.securitycode.$error" ng-if="FormSecurityCode.securitycode.$dirty">
              <span ng-message="required" class="label label-danger">Security Code is required</span>
              <span ng-message="maxlength" class="label label-danger">Please type 6 digits of your security code</span>
              <span ng-message="pattern" class="label label-danger">number only</span>
            </div>
        </div>
        <button type="submit" id="recover_via_email_step_2" ng-disabled="!FormSecurityCode.$valid" class="btn btn-primary pull-right">Verify</button>
        <label class="remember-me">Click <a id="resendemail" href="#">here</a> to resend.</label>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right" ><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('login')?>">Sign in</a></p>
</div>
