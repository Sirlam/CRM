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
    $('#special1').DataTable();
    
    var otable = $('#myTable').DataTable({
      "searching": false
    });

    $('#search').click(function(){
      var param = $('#param').val().toLowerCase();
      var param2 = $('#param2').val().toLowerCase();
      var param3 = $('#param3').val().toLowerCase();
      //var param4 = $('#param4').val().toLowerCase();
      //console.log(param);
      $("#myTable tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(param) > -1)
        $(this).toggle($(this).text().toLowerCase().indexOf(param2) > -1)
        $(this).toggle($(this).text().toLowerCase().indexOf(param3) > -1)
        //$(this).toggle($(this).text().toLowerCase().indexOf(param4) > -1)
      });

    });

    $('#export').click(function() {
        $('#reportTable').table2excel({
            exclude: ".noExl",
            name: "Worksheet Name",
            fileext: ".xls",
            filename: "Report File"
        });
    });

    $('#special tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#special').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

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
