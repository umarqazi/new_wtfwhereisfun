<!--____________End body HTML________-->
<script>
    function base_url()
    {
        return "{{url('')}}";
    }
</script>
<!-- owl Carousel js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
<!-- Sweet Alert Script -->
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
<!-- Custom Script -->
<script src="{{asset('js/custom.js')}}"></script>
<!-- My Custom Script -->
<script src="{{asset('js/my-custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom/account.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom/signup-login.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom/organizer.js')}}"></script>
<script type="text/javascript" src="{{asset('js/eventpage/events.js')}}"></script>
<script src="{{asset('listgo/js/scripts.js')}}" type="text/javascript"></script>
<script src="{{asset('js/fancybox/jquery.fancybox.min.js')}}"></script>

{{--Event Page JS--}}
<script src="{{asset('js/eventpage/jquery.richtext.js')}}"></script>
<script src="{{asset('js/eventpage/custom.js')}}"></script>
<!-- <script src="{{asset('js/dropzone.js')}}"></script> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>--}}
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/eventpage/bootstrap-datetimepicker.min.js')}}"></script>


<!-- Show Toaster Messages -->
<script type="text/javascript">
    $(document).ready(function(){
        {{-- If Error--}}
//        showToaster('error',"msgshould be given here");
        {{--Else Success--}}
//        showToaster('success',"msgshould be given here");
        {{--End if--}}
    });

</script>
@include('sweet::alert')