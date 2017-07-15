<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Recover your password</p>
<div class="panel-body">
    <form name="FromRecover" id="method" method="POST" novalidate>
        <div class="form-group">
            <label for="method">Choose your method</label>
            <select ng-model="method" id="method" style="width:100%" name="method" class="form-control select2" required>
                <option value="">Select</option>
                <option value="phone">Phone</option>
                <option value="email">Email</option>
            </select>
            <div ng-messages="FromRecover.method.$error" ng-if="FromRecover.method.$dirty">
              <span ng-message="required" class="label label-danger">Method is required.</span>
            </div> 
        </div>
        <button type="submit" id="method" ng-disabled="FromRecover.$invalid" class="btn btn-primary pull-right">Go</button>
        <div class="clearfix"></div>
    </form>
</div>
</div>
<p class="pull-right" ><a href="<?= site_url('register')?>">Sign up</a></p>
<p><a href="<?= site_url('login')?>">Sign in</a></p>
</div>
