<script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
<script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="admin/assets/js/off-canvas.js"></script>
<script src="admin/assets/js/hoverable-collapse.js"></script>
<script src="admin/assets/js/misc.js"></script>
<script src="admin/assets/js/settings.js"></script>
<script src="admin/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="admin/assets/js/dashboard.js"></script>


<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{--select2--}}
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script src="admin/assets/js/select2.full.min.js"></script>
<script>
    $(document).ready( function () {
        $(".select2").select2({

        });

        $('#myTable').DataTable({
            // "scrollX": true
        });
    } );
</script>
<script>
    $(document).ready(function() {
        $('#summernote1').summernote({
            height: 200,
            placeholder: 'Hi, Dress Code Admin. Please, write description here!',

        });
        $('#summernote2').summernote({
            height: 200,
            placeholder: 'Hi, Dress Code Admin. Please, write short description here!',

        });
        $('#summernote3').summernote({
            height: 200,
            placeholder: 'Hi, Dress Code Admin. Please, write feature here!',

        });
        $('#summernote4').summernote({
            height: 200,
            placeholder: 'Hi, Dress Code Admin. Please, write condition here!',

        });
        $('#summernote5').summernote({
            height: 200,
            placeholder: 'Hi, Dress Code Admin. Please, write return policy here!',

        });
    });
</script>

@yield('scripts')
