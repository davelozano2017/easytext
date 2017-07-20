<table class="table table-bordered table-striped">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Contact</th>
    <th style="text-align:center">Action</th>
</tr>
</thead>
<?php 
$i = 0;
foreach($mycontacts as $row):
$block = $row->blocklist;
$blocklist = $block == 0 ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
?>

<tbody>
<tr>
    <td style="width:1px"><?php echo ++$i?></td>
    <td><?php echo $row->fullname?></td>
    <td><?php echo $row->contact?></td>
    <td style="text-align:center">
        <button id="blocklist" onclick="blocklisting('<?php echo$row->id?>')" class="btn btn-primary">
            <?php echo$blocklist?>
        </button>
        <button id="delete" onclick="delete_contact('<?php echo$row->id?>')" class="btn btn-danger">
            <i class="fa fa-trash"></i>
        </button>
        <a href="<?= site_url('contact/edit/'.$row->id)?>" id="edit"  class="btn btn-info">
            <i class="fa fa-pencil"></i>
        </a>
    </td>
</tr>
</tbody>
<?php endforeach;?>
</table>
