<script src="{{asset('modules/admin/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/vendor/chartjs-plugin-style/dist/chartjs-plugin-style.min.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/sidebar-nav.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/main.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/charts/area-chart.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/charts/area-chart-small.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/charts/doughnut-chart.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/toastr.js')}}"></script>
{{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
<script>
    toastr.options.closeButton = true;
    @if(session()->has('success'))
    toastr.success("{!! session()->get('success') !!}");
    @endif

    @if(session()->has('info'))
    toastr.info("{!! session()->get('info') !!}");
    @endif

    @if(session()->has('error'))
    toastr.info("{!! session()->get('error') !!}");
    @endif

    @if(session()->has('warning'))
    toastr.info("{!!session()->get('warning') !!}");
    @endif
    // tinymce.init({
    //     selector: 'textarea.description',
    //     height: 300,
    //     menubar: false,
    //     plugins: [
    //         'advlist autolink lists link image charmap print preview anchor',
    //         'searchreplace visualblocks code fullscreen',
    //         'insertdatetime media table paste code help wordcount'
    //     ],
    //     toolbar: 'undo redo | formatselect | ' +
    //         'bold italic backcolor | alignleft aligncenter ' +
    //         'alignright alignjustify | bullist numlist outdent indent | ' +
    //         'removeformat | help',
    //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    // });
</script>
