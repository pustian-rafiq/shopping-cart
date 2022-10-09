<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin Dashboard</title>

    <!-- vendor css -->
    <link href="{{ asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">

     <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link href="{{ asset('backend/lib/rickshaw/rickshaw.min.css" rel="stylesheet')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/lib/toastr/toastr.css') }}">


    {{-- <link href="{{ asset('backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/starlight.css')}}">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <!-- sl-sideleft -->
    @include("admin.partials.left_sidebar")
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include("admin.partials.header")
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include("admin.partials.right_sidebar")
  
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
   @yield("content")
    <!-- ########## END: MAIN PANEL ########## -->
    {{-- @include("admin.partials.footer") --}}
  </div><!-- sl-mainpanel -->
    <script src="{{ asset('backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{ asset('backend/lib/popper.js/popper.js')}}"></script>
    <script src="{{ asset('backend/lib/bootstrap/bootstrap.js')}}"></script>

    <!-- DataTables -->
    <script src="{{ asset('backend/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('backend/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('backend/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{ asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>


    <script src="{{ asset('backend/lib/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/lib/toastr/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/lib/sweetalert/sweetalert.min.js') }}"></script>

    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
          "Scrollable": true,
        });
         
      });
    </script>
    <script src="{{ asset('backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{ asset('backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>
    <script src="{{ asset('backend/js/starlight.js')}}"></script>
    <script src="{{ asset('backend/js/ResizeSensor.js')}}"></script>
    <script src="{{ asset('backend/js/dashboard.js')}}"></script>
   
  

    <script>
        @if (Session::has('message'))
            var type ="{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>


    {{-- Image preview --}}
    <script type="text/javascript">
    $('#image').change(function(){
            
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 

    });
    </script> 

{{-- Delete confirmation --}}
  <script>  
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to delete?",
             text: "Once Delete, This will be Permanently Delete!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe Data!");
             }
           });
       });
</script>
  
  </body>
</html>
