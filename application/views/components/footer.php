<script src="<?= site_url('assets/js/jquery.min.js')?>"></script>
<script src="<?= site_url('assets/amaran/dist/js/jquery.amaran.min.js')?>" charset="utf-8"></script>
<script src="<?= site_url('assets/lib/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?= site_url('assets/select2/dist/js/select2.full.min.js')?>"></script>
<script src="<?= site_url('assets/angular/angular-main.min.js')?>"></script>
<script src="<?= site_url('assets/angular/1.4.2.angular.min.js')?>"></script>
<script src="<?= site_url('assets/js/scripts.js')?>" charset="utf-8"></script>
<script src="<?= site_url('assets/js/functions.js')?>" charset="utf-8"></script>
<script src="<?= site_url('assets/js/main.js')?>" charset="utf-8"></script>
<script>
    $(".select2").select2({
        theme: "classic",
        placeholder: 'Select Method',
        allowClear: true
    })
    $(document).ready(function(){
      	var uls = $('.sidebar-nav > ul > *').clone();
        uls.addClass('visible-xs');
        $('#main-menu').append(uls.clone());
    });
</script>


</body>
</html>

