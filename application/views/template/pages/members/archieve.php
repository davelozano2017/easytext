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
            <li><a href="<?=site_url('messages')?>"><span class="fa fa-caret-right"></span> Messages</a></li>
            <li><a href="<?=site_url('drafts')?>"><span class="fa fa-caret-right"></span> Drafts</a></li>
            <li class="active"><a href="<?=site_url('archieve')?>"><span class="fa fa-caret-right"></span> Archieve</a></li>
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
        <h1 class="page-title">Archieve</h1>
        <ul class="breadcrumb">
            <li>Inbox</li>
            <li class="active"><a href="<?= site_url('archieve')?>"> Archieve</a></li>
        </ul>
    </div>  
<div class="main-content">
<!-- Start -->
<form method="POST" name="FormMessageSend" novalidate>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#archieve" data-toggle="tab">Archieve</a></li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <br>
            <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="archieve">

                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th style="text-align:center">Action</th>
                </tr>
                </thead>

                <?php 
                if(count($getarchieve) == 0) {
                    echo '<td colspan=4 class="text-center alert alert-danger">No record found.</td>';
                }

                $i = 0;
                foreach($getarchieve as $row):
                ?>

                <tbody>
                <tr>
                    <td style="width:1px"><?php echo ++$i?></td>
                    <td><?php echo $row->fullname?></td>
                    <td><?php echo $row->date?></td>
                    <td style="text-align:center">
                       <a href="<?=site_url('view/message/'.$row->id.'')?>" class="btn btn-primary">View</a> 
                    </td>
                </tr>
                </tbody>
                <?php endforeach;?>
                </table>


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
    app.controller('MyCtrl',function($scope){});

    
</script>

