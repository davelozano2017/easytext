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
        <ul class="dashboard-menu nav nav-list collapse in">
            <li class="active"><a href="<?=site_url('compose')?>"><span class="fa fa-caret-right"></span> Compose</a></li>
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
    <ul class="account-menu nav nav-list collapse">
        <li><a href="<?=site_url('profile')?>"><span class="fa fa-caret-right"></span> Profile</a></li>
        <li><a href="<?=site_url('add-contact')?>"><span class="fa fa-caret-right"></span> Add Contact</a></li>
        <li><a href="<?=site_url('change-password')?>"><span class="fa fa-caret-right"></span> Change Password</a></li>
        <li><a href="<?=site_url('execute/logout')?>"><span class="fa fa-caret-right"></span> Sign Out</a></li>
    </ul>
</li>



</div>

<div class="content">
    <div class="header">
        <h1 class="page-title">Compose</h1>
        <ul class="breadcrumb">
            <li>Dashboard</li>
            <li class="active"><a href="<?= site_url('compose')?>"> Compose</a></li>
        </ul>
    </div>
<div class="main-content">
<!-- Start -->
<form method="POST" name="FormMessageSend" novalidate>
    <button type="submit" id="send" ng-disabled="!FormMessageSend.$valid" class="btn btn-primary">Send</button>
    <hr>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#compose" data-toggle="tab">Compose now</a></li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="compose">
                <div class="form-group">
                    <label>Send to</label>
                    <select style="width:100%" multiple class="contact_multiple form-control" id="contact" ng-model="contact" name="contact[]" required>
                        <?php foreach($mycontactbyuserid as $r): ?>
                            <option value="<?php echo $r->contact?>"><?php echo $r->fullname?></option>
                        <?php endforeach?>
                    </select>
                    <div ng-messages="FormMessageSend.contact.$error" ng-if="FormMessageSend.contact.$dirty">
                        <span ng-message="required" class="label label-danger">Contact is required</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea style="resize:none;height:70px" class="form-control" name="message" id="message" ng-model="message" required></textarea>
                    <div ng-messages="FormMessageSend.message.$error" ng-if="FormMessageSend.message.$dirty">
                        <span ng-message="required" class="label label-danger">Message is required</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</form>

<!-- End -->
</div>
<?php		
$this->load->view('components/footer');
?>
<script type="text/javascript">
    var app = angular.module('app', ['ngMessages']);
    app.controller('MyCtrl',function($scope){});

    $(document).ready(function() {
        $(".contact_multiple").select2({
          maximumSelectionLength: 20,
          placeholder: "With Max Selection limit 20",
          allowClear: true
        });
      });
</script>

