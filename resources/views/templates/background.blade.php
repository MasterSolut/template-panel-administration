@extends('PanelAdministration::templates.base')

@section('content')
<body class=" register-page ">
<!-- Site wrapper -->

    <!-- Main content -->
    <section class="content skin-blue col-xs-12" >

      <!-- Default box -->
      <div class="skin-blue">
        <div class=" with-border"> 
          <br>
        </div>
        <div>
         @yield('content')
        </div> 
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
 
<!-- jQuery 2.2.3 -->
<script src=" {{asset('/resources/assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src=" {{asset('/resources/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('/resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src=" {{ asset('/resources/assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script> 
<!-- FastClick -->
<script src=" {{ asset('/resources/assets/plugins/fastclick/fastclick.js') }}"></script>  
<!-- bootstrap datepicker -->
<script src=" {{ asset('/resources/assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>  
<!-- date-range-picker -->
<script src=" {{ asset('/resources/assets/ajax/libs/moment.js/2.11.2/moment.min.js') }}"></script>  
<script src=" {{ asset('/resources/assets/plugins/daterangepicker/daterangepicker.js') }}"></script> 
<!-- Select2 -->
<script src="{{ asset('/resources/assets/plugins/select2/select2.full.min.js') }}"></script>  
<!-- InputMask -->
<script src="{{ asset('/resources/assets/plugins/input-mask/jquery.inputmask.js') }}"></script>  
<script src="{{ asset('/resources/assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>  
<script src="{{ asset('/resources/assets/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script> 

<!-- bootstrap datepicker -->
<script src="{{ asset('/resources/assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script> 
<!-- bootstrap color picker -->
<script src="{{ asset('/resources/assets/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script> 
<!-- bootstrap time picker -->
<script src="{{ asset('/resources/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script> 
<!-- SlimScroll 1.3.0 -->

<!-- iCheck 1.0.1 -->
<script src="{{ asset('/resources/assets/plugins/iCheck/icheck.min.js') }}"></script>  
<!-- AdminLTE App -->
<script src=" {{ asset('/resources/assets/dist/js/app.min.js') }}"></script>  
<!-- AdminLTE for demo purposes -->
<script src=" {{ asset('/resources/assets/dist/js/demo.js') }}"></script>  

<script src=" {{ asset('/resources/assets/jasny/js/jasny-bootstrap.min.js') }}"></script>  

<script  src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });

  CKEDITOR.replace( 'article-ckeditor' );
</script>

@stop


