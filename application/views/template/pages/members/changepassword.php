<?php 
$role = $this->session->userdata('role');
foreach($results as $row) {
$data = array('id' => $row->id,'fullname' => $row->fullname,'email' => $row->email,'contact' => $row->contact, 'date' => $row->date);
}
?>
<div class="sidebar-nav">
<ul>
    <li data-popover="true">
        <a href="#" data-target=".dashboard-menu" class="nav-header collapsed" data-toggle="collapse">
            <i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i>
        </a>
    </li>
    
    <li>
        <ul class="dashboard-menu nav nav-list collapse">
            <li><a href="<?=site_url('compose')?>"><span class="fa fa-caret-right"></span> Compose</a></li>
        </ul>
    </li>

    <li data-popover="true">
        <a href="#" data-target=".inbox-menu" class="nav-header collapsed" data-toggle="collapse">
            <i class="fa fa-fw fa-envelope"></i> Inbox<i class="fa fa-collapse"></i>
        </a>
    </li>
    
    <li>
        <ul class="inbox-menu nav nav-list collapse">
            <li><a href="<?=site_url('drafts')?>"><span class="fa fa-caret-right"></span> Drafts</a></li>
            <li><a href="<?=site_url('archieve')?>"><span class="fa fa-caret-right"></span> Archieve</a></li>
            <li><a href="<?=site_url('important')?>"><span class="fa fa-caret-right"></span> Important</a></li>
        </ul>
    </li>

    <li>
    <a href="#" data-target=".account-menu" class="nav-header" data-toggle="collapse">
        <i class="fa fa-fw fa-user"></i> Account<i class="fa fa-collapse"></i>
    </a>
</li>
<li>
    <ul class="account-menu nav nav-list collapse in">
        <li><a href="<?=site_url('profile')?>"><span class="fa fa-caret-right"></span> Profile</a></li>
        <li><a href="<?=site_url('add-contact')?>"><span class="fa fa-caret-right"></span> Add Contact</a></li>
        <li class="active"><a href="<?=site_url('change-password')?>"><span class="fa fa-caret-right"></span> Change Password</a></li>
        <li><a href="<?=site_url('execute/logout')?>"><span class="fa fa-caret-right"></span> Sign Out</a></li>
    </ul>
</li>



</div>

<div class="content">
    <div class="header">
        <h1 class="page-title">Change Password</h1>
        <ul class="breadcrumb">
            <li>Account</li>
            <li class="active"><a href="<?= site_url('change-password')?>"> Change Password</a></li>
        </ul>
    </div>
<div class="main-content">
<!-- Start -->
<form method="POST" name="FormChangePassword" novalidate>
    <button type="submit" id="update" onclick="changepassword('<?php echo $data['id']?>')" ng-disabled="!FormChangePassword.$valid" class="btn btn-primary">Save</button>
    <hr>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#" data-toggle="tab">Change Password</a></li>
    </ul>
    <div class="row">
        <div class="col-md-4">
            <br>
            <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">
                
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

            </div>
        </div>
    </div>
</form>

<!-- End -->
</div>
<?php $this->load->view('components/footer');?>
<script>
    

(function() {
  "use strict";
  angular
    .module('app', ['ngMessages'])
    .controller('MyCtrl', mainController)
    .directive('passwordVerify', passwordVerify);

  function mainController($scope) {
    // Some code
  }

  function passwordVerify() {
    return {
      restrict: 'A', // only activate on element attribute
      require: '?ngModel', // get a hold of NgModelController
      link: function(scope, elem, attrs, ngModel) {
        if (!ngModel) return; // do nothing if no ng-model

        // watch own value and re-validate on change
        scope.$watch(attrs.ngModel, function() {
          validate();
        });

        // observe the other value and re-validate on change
        attrs.$observe('passwordVerify', function(val) {
          validate();
        });

        var validate = function() {
          // values
          var val1 = ngModel.$viewValue;
          var val2 = attrs.passwordVerify;

          // set validity
          ngModel.$setValidity('passwordVerify', val1 === val2);
        };
      }
    }
  }
})();

</script>
