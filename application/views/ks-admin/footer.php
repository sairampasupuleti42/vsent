
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        Developed by fadeIn Developers
    </div>
    <strong>Copyright &copy; <?php echo date('Y')?> <a href="#">Kolanukonda Shivaji</a>.</strong> All rights
    reserved.
</footer>

<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->

<script src="<?php echo base_url(); ?>dist/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>




<script>
    $(function(){
        $('.select2').select2()
        $('#dtable').DataTable();
        $('.input-daterange').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
    });
</script>

</body>
</html>
