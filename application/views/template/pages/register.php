<div class="dialog">
<div class="panel panel-default">
<p class="panel-heading no-collapse">Sign Up</p>
<div class="panel-body">
    <form name="FormRegister" id="register" method="POST" novalidate>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" ng-model="fullname" name="fullname" id="fullname" class="form-control" ng-pattern="/^(.*?[a-zA-Z]){2,}$/" required>
            <div ng-messages="FormRegister.fullname.$error" ng-if="FormRegister.fullname.$dirty">
              <span ng-message="required" class="label label-danger">Name is required</span>
              <span ng-message="pattern" class="label label-danger">Name is incomplete</span>
            </div>
        </div>

        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" ng-model="email" name="email" id="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
            <div ng-messages="FormRegister.email.$error" ng-if="FormRegister.email.$dirty">
              <span ng-message="pattern" class="label label-danger">Please enter a valid email address.</span>
              <span ng-message="required" class="label label-danger">Email Address is required.</span>
            </div>
        </div>

        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" class="form-control" name="contact" id="contact" ng-model="contact" id="contact" ng-pattern="/^(.*?[0-9]){10,}$/" ng-maxlength="10"required>
            <div ng-messages="FormRegister.contact.$error" ng-if="FormRegister.contact.$dirty">
              <span ng-message="required" class="label label-danger">Contact is required</span>
              <span ng-message="maxlength" class="label label-danger">Please type 10 digits of your number</span>
              <span ng-message="pattern" class="label label-danger">number only</span>
            </div>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control span12" ng-model="username" name="username" id="username" ng-minlength="6" ng-maxlength="50" required>
            <div ng-messages="FormRegister.username.$error" ng-if="FormRegister.username.$dirty">
              <span ng-message="minlength" class="label label-danger">Username is too short</span>
              <span ng-message="maxlength" class="label label-danger">Username is too long</span>
              <span ng-message="required" class="label label-danger">Username is required</span>
            </div>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control" ng-model="password" name="password" ng-minlength="6" ng-maxlength="30" required password-verify="{{cpassword}}">
            <div ng-messages="FormRegister.password.$error" ng-if="FormRegister.password.$dirty">
              <span ng-message="minlength" class="label label-danger">Password is too short</span>
              <span ng-message="maxlength" class="label label-danger">Password is too long</span>
              <span ng-message="required"  class="label label-danger">Password is Required</span>
            </div>
        </div>

        <div class="form-group">
        <label>Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword" ng-model="cpassword" ng-minlength="6" ng-maxlength="30" password-verify="{{password}}">
            <div ng-messages="FormRegister.cpassword.$error" ng-if="FormRegister.cpassword.$dirty">
              <span ng-message="passwordVerify" class="label label-danger">Password not match!</span>
            </div>
        </div>

        <button type="submit" id="register" ng-disabled="FormRegister.$invalid"  class="btn btn-primary pull-right">Register</button>
        <div class="clearfix"></div>
    </form>
  </div>
</div>
<p class="pull-right"><a href="<?= site_url('login')?>">Sign In</a></p>
<p><a href="<?= site_url('recover')?>">Forgot your password?</a></p>
</div>
