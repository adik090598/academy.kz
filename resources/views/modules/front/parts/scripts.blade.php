<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{asset('modules/admin/assets/js/toastr.js')}}"></script>
<script src="{{asset('modules/front/assets/js/welcome.js')}}"></script>


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

