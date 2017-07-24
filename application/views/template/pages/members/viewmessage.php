<?php foreach($viewmessage as $row) {} ?>
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
        <ul class="inbox-menu nav nav-list collapse in">
            <li class="active"><a href="<?=site_url('messages')?>"><span class="fa fa-caret-right"></span> Messages</a></li>
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
        <h1 class="page-title">View Message</h1>
        <ul class="breadcrumb">
            <li>Inbox</li>
            <li><a href="<?= site_url('messages')?>"> Messages</a></li>
            <li class="active"><a href="<?= site_url('view/message/'.$row->id.'')?>"> View</a></li>
        </ul>
    </div>
<div class="main-content">
<!-- Start -->
<form method="POST" novalidate name="FormViewMessage">
  <button type="submit" id="moveto" ng-disabled="!FormViewMessage.$valid" class="btn btn-primary">Go</button>
  <a href="<?=site_url('messages')?>" class="btn">Back</a>
  <hr>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#addcontacts" data-toggle="tab">Message details</a></li>
  </ul>

  <div class="row">
    <div class="col-md-12">
      <br>

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane active in" id="addcontacts">
          <input type="hidden" name="id" value="<?php echo $row->id?>">
          <div class="form-group">
            <label>Full Name</label>
            <p class="form-control"><?php echo $row->fullname?></p> 
          </div>

          <div class="form-group">
            <label>Message</label>
            <p style="resize:none;height:100px" class="form-control"><?php echo $row->message?></p> 
          </div>

          <div class="form-group">
            <label>Date</label>
            <p class="form-control"><?php echo $row->date?></p> 
          </div>

          <div class="form-group">
            <label>Choose</label>
            <select name="choose" style="width:100%" class="form-control choose" ng-model="choose" id="choose" required>
                <option value=""></option>
                <option value="Archieve">Archieve</option>
                <option value="Important">Important</option>
            </select>
            <div ng-messages="FormViewMessage.choose.$error" ng-if="FormViewMessage.choose.$dirty">
                <span ng-message="required" class="label label-danger">Please select one</span>
            </div>
            </div>
            
        </div>

      </div>
    </div>
  </div>
</div>
</form>

<!-- End -->
<?php $this->load->view('components/footer');?>
<script type="text/javascript">
    var app = angular.module('app', ['ngMessages']);
    app.controller('MyCtrl',function($scope){});
    $(document).ready(function() {
        $(".choose").select2({
            theme: "classic",
            placeholder: 'Move to',
            allowClear: true
        })
    });
</script>