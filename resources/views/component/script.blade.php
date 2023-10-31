<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- Vector map-->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
<!--Swiper slider js-->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<!-- Jquery 3.6.0 -->
{{-- <script src="{{ asset('assets/libs/jquery-3.6.0.min.js') }}" ></script> --}}
<script src="{{ asset('assets/libs/jquery-1.9.1.min.js') }}" ></script>

<!--datatable js-->
<script src="{{ asset('assets/libs/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/dataTables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Sweet alert init js-->
<script src="{{ asset('assets/js/pages/sweetalerts.init.js') }}"></script>
<!-- App js -->
{{--<script src="{{ asset('assets/js/app.js') }}"></script>--}}
<!-- Include Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<script src="{{ asset('assets/libs/summernote/summernote.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
                [ 'insert', [ 'link'] ],
                [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
            ]
        });
    });
    function deleteData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                fakeRemoveData(id);
            }
        });
    }
    if ("{{Session::get('success')}}") {
        Swal.fire({
            title: 'Good job!',
            text: "{{Session::get('success')}}",
            icon: 'success',
            confirmButtonColor: "#f46a6a",
            cancelButtonColor: "#3051d3"
        })
    }
    if ("{{Session::get('error')}}") {
        Swal.fire({
            title: 'Sorry!',
            text: "{{Session::get('error')}}",
            icon: 'error',
            confirmButtonColor: "#f46a6a",
            cancelButtonColor: "#3051d3"
        })
    }

    function validationFile(id) {
        const fileInput = document.getElementById(id);
        const file = fileInput.files[0];
        if (!file) {
            alert('No file');
            return; // No file selected
        }

        // Check file size (2MB)
        if (file.size > 2 * 1024 * 1024) { // 2MB in bytes
            Swal.fire({
                title: 'Sorry!',
                text: "File size must be less than 2MB",
                icon: 'error',
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#3051d3"
            })
            fileInput.value = ''; // Clear the selected file
            return;
        }

        // Check file extension
        const allowedExtensions = ['pdf'];
        const fileExtension = file.name.split('.').pop().toLowerCase();

        if (!allowedExtensions.includes(fileExtension)) {
            Swal.fire({
                title: 'Sorry!',
                text: "Only PDF files are allowed",
                icon: 'error',
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#3051d3"
            })
            fileInput.value = ''; // Clear the selected file
        }
    }

    function validationFileDocx(id) {
        const fileInput = document.getElementById(id);
        const file = fileInput.files[0];
        if (!file) {
            alert('No file');
            return; // No file selected
        }

        // Check file size (2MB)
        if (file.size > 2 * 1024 * 1024) { // 2MB in bytes
            Swal.fire({
                title: 'Sorry!',
                text: "File size must be less than 2MB",
                icon: 'error',
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#3051d3"
            })
            fileInput.value = ''; // Clear the selected file
            return;
        }

        // Check file extension
        const allowedExtensions = ['docx'];
        const fileExtension = file.name.split('.').pop().toLowerCase();

        if (!allowedExtensions.includes(fileExtension)) {
            Swal.fire({
                title: 'Sorry!',
                text: "Only Docx files are allowed",
                icon: 'error',
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#3051d3"
            })
            fileInput.value = ''; // Clear the selected file
        }
    }

    $(function(){
        $(".uploadModal").click(function(){
            var LabelFile = "File " + $(this).data('label')
            var LabelModal = "Upload File " + $(this).data('label')
            var Name = $(this).data('name')

            $('#uuid').val($(this).data('id'));
            $('#code_file').val(Name);

            document.getElementById("label-file").innerHTML = LabelFile;
            document.getElementById("zoomInModalLabel").innerHTML = LabelModal;
        });
    });

    $(function(){
        $(".uploadModalUpdate").click(function(){
            var LabelFile = "File " + $(this).data('label')
            var LabelModal = "Upload File " + $(this).data('label')
            var Name = $(this).data('name')
            var Href = $(this).data('href')
            var timeUpload = $(this).data('time-file')
            $('#uuidUpdate').val($(this).data('id'));
            $('#codeFileUpdate').val(Name);

            document.getElementById("label-file").innerHTML = LabelFile;
            document.getElementById("zoomInModalLabel").innerHTML = LabelModal;
            document.getElementById("href-download").href = Href;
            document.getElementById("time-upload").innerHTML = timeUpload;
        });
    });
</script>

<script type="text/javascript">
    var envData = @json(env('FLAG_DATE_LIMIT_TAHAP_2', false));
    var dateToday = new Date();
    // Calculate 7 days ago from the current date
    var sevenDaysAgo = new Date(dateToday);
    sevenDaysAgo.setDate(dateToday.getDate() - 7);
    if(envData){
        $('.date').datepicker({  
            format: 'mm/dd/yyyy',
            startDate: sevenDaysAgo,
            endDate: dateToday
         });  
    }else{
        $('.date').datepicker({  
            format: 'mm/dd/yyyy',
         }); 
    }
</script> 