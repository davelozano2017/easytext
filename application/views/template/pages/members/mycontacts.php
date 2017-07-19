<?php 
foreach($results as $row) {
$data = array('fullname' => $row->fullname,'email' => $row->email,'contact' => $row->contact, 'date' => $row->date);
}
?>
<div class="sidebar-nav">
<ul>
    <li><a href="<?=site_url('compose')?>" class="nav-header"><i class="fa fa-fw fa-pencil"></i>Compose</a></li>

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
        <li class="active"><a href="<?=site_url('add-contact')?>"><span class="fa fa-caret-right"></span> Add Contact</a></li>
        <li><a href="<?=site_url('change-password')?>"><span class="fa fa-caret-right"></span> Change Password</a></li>
        <li><a href="<?=site_url('execute/logout')?>"><span class="fa fa-caret-right"></span> Sign Out</a></li>
    </ul>
</li>



</div>

<div class="content">
    <div class="header">
        <h1 class="page-title">My Contacts</h1>
        <ul class="breadcrumb">
            <li>Account</li>
            <li><a href="<?= site_url('add-contact')?>"> Add Contact</a></li>
            <li class="active"><a href="<?= site_url('my-contacts')?>"> My Contacts</a></li>
        </ul>
    </div>
<div class="main-content">
<!-- Start -->
<form method="POST" name="FormAddContact" novalidate>
    <a href="<?=site_url('add-contact')?>" class="btn">Back</a>
    <hr>
           
  <ul class="nav nav-tabs">
    <li class="active"><a href="#mycontacts" data-toggle="tab">My Contacts</a></li>
  </ul>

  <div class="row">
    <div class="col-md-12">
      <br>

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane active in" id="mycontacts">
           
                <div id="show"></div>

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
</script>


