<script src="<?= site_url('assets/js/jquery.min.js')?>"></script>
<script src="<?= site_url('assets/amaran/dist/js/jquery.amaran.min.js')?>" charset="utf-8"></script>
<script src="<?= site_url('assets/lib/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?= site_url('assets/select2/dist/js/select2.full.min.js')?>"></script>
<script src="<?= site_url('assets/angular/angular-main.min.js')?>"></script>
<script src="<?= site_url('assets/angular/1.4.2.angular.min.js')?>"></script>
<script src="<?= site_url('assets/js/scripts.js')?>" charset="utf-8"></script>
<script src="<?= site_url('assets/js/functions.js')?>" charset="utf-8"></script>
<script>
    $(".select2").select2({
    theme: "classic",
    placeholder: 'Select Method',
    allowClear: true
    })
    var myVar;
    function Animate() {
        myVar = setTimeout(showPage(), 3000);
    }
    function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("AnimateHeader").style.display = "block";
    document.getElementById("AnimateContent").style.display = "block";
    }
</script>


</body>
</html>

