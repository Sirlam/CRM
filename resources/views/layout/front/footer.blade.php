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
<script src="{{URL::asset('js/jquery.table2excel.js')}}"></script>
<script type="text/javascript">
$(document).ready( function () {
    //default dataTables
    $('#special1').DataTable();

    //Indvidual column search
    // Setup - add a text input to each footer cell
    $('#exampleSearch tfoot th').each( function (index) {
        var title = $(this).text();
        $(this).html( '<input class="form-control" type="text" placeholder="'+title+'" id="column_'+index+'" />' );
    } );

    var table = $('#myTable').DataTable();
    var search = $('#exampleSearch');

    $('#search').on( 'click', function () {
        table.columns( 0 ).search( document.getElementById('column_0').value ).draw();
        table.columns( 1 ).search( document.getElementById('column_1').value ).draw();
        table.columns( 2 ).search( document.getElementById('column_2').value ).draw();
        table.columns( 3 ).search( document.getElementById('column_3').value ).draw();
    } );


    //Export function
    $('#export').click(function() {
        $('#reportTable').table2excel({
            exclude: ".noExl",
            name: "Worksheet Name",
            fileext: ".xls",
            filename: "Report File"
        });
    });


} );
//display password

function showPassword(){
  var x = document.getElementById("password");
  if(x.type === "password"){
    x.type = "text";
  }else {
    {
      x.type = "password";
    }
  }
}
</script>
