<!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2018 <a href="http://www.bluechiptech.biz" target="_blank">Bluechip Technologies Ltd</a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{URL::asset('vendor/chartist/js/chartist.min.js')}}"></script>
<script src="{{URL::asset('vendor/data-tables/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('js/klorofil-common.js')}}"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable({
      "language": {
            "decimal": ",",
            "thousands": "."
        }
    });
} );
</script>
