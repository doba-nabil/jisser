<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="https://7loll.net/" target="_blank">7loll.net</a>All rights Reserved</span>
    </p>
</footer>
@include('messages.done')
@include('messages.errors')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="{{ asset('dashboard/js/vendors.min.js') }}"></script>
<script src="{{ asset('dashboard/js/app-menu.js') }}"></script>
<script src="{{ asset('dashboard/js/app.js') }}"></script>
<script src="{{ asset('dashboard/js/components.js') }}"></script>
<script src="{{ asset('dashboard/js/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('dashboard/js/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/js/datatable/datatable.js') }}"></script>
<script src="{{ asset('dashboard/js/dropify.min.js') }}"></script>
<script src="{{ asset('dashboard/js/form-file-upload-data.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('dashboard/js/javascript.js') }}"></script>
@section('dashboard-footer')

@show
