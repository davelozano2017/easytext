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
            <li><a href="<?=site_url('messages')?>"><span class="fa fa-caret-right"></span> Messages</a></li>
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
        <li class="active"><a href="<?=site_url('profile')?>"><span class="fa fa-caret-right"></span> Profile</a></li>
        <li><a href="<?=site_url('add-contact')?>"><span class="fa fa-caret-right"></span> Add Contact</a></li>
        <li><a href="<?=site_url('change-password')?>"><span class="fa fa-caret-right"></span> Change Password</a></li>
        <li><a href="<?=site_url('execute/logout')?>"><span class="fa fa-caret-right"></span> Sign Out</a></li>
    </ul>
</li>



</div>

<div class="content">
    <div class="header">
        <h1 class="page-title">Profile</h1>
        <ul class="breadcrumb">
            <li>Account</li>
            <li class="active"><a href="<?= site_url('profile')?>"> Profile</a></li>
        </ul>
    </div>
<div class="main-content">
<!-- Start -->
<form method="POST" name="FormProfileUpdate" novalidate>
    <button type="submit" id="update" onclick="updateprofile('<?php echo $data['id']?>')" ng-disabled="!FormProfileUpdate.$valid" class="btn btn-primary">Save</button>
    <hr>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#" data-toggle="tab">Profile</a></li>
    </ul>
    <div class="row">
        <div class="col-md-4">
            <br>
            <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" ng-model="fullname" name="fullname" id="fullname" class="form-control" ng-pattern="/^(.*?[a-zA-Z]){2,}$/" required>
            <div ng-messages="FormProfileUpdate.fullname.$error" ng-if="FormProfileUpdate.fullname.$dirty">
              <span ng-message="required" class="label label-danger">Name is required</span>
              <span ng-message="pattern" class="label label-danger">Name is incomplete</span>
            </div>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="contact" id="contact" ng-model="contact" id="contact" ng-pattern="/^(.*?[0-9]){10,}$/" ng-maxlength="10"required>
                    <div ng-messages="FormProfileUpdate.contact.$error" ng-if="FormProfileUpdate.contact.$dirty">
                        <span ng-message="required" class="label label-danger">Contact is required</span>
                        <span ng-message="maxlength" class="label label-danger">Please type 10 digits of your number</span>
                        <span ng-message="pattern" class="label label-danger">number only</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control"> <?php echo $data['email']?></p>
                </div>

                <div class="form-group">
                    <label>Membership date</label>
                    <p class="form-control"> <?php echo $data['date']?></p>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- End -->
</div>
<?php		
$this->load->view('components/footer');
?>
<script type="text/javascript">
    var app = angular.module('app', ['ngMessages']);
    app.controller('MyCtrl',function($scope){
        $scope.fullname = '<?php echo$data['fullname']?>';
        $scope.contact  = '<?php echo$data['contact']?>';
    });
</script>

