@if (session()->has('done'))
    <div id="myMsg">
        <i class="fa fa-check"></i>
        <p style="margin: 0">{{ session()->get('done') }}</p>
    </div>
@endif
@if (session()->has('error'))
    <div id="myMsg" class="errorMyMsg">
        <i class="fa fa-times"></i>
        <p style="margin: 0">{{ session()->get('error') }}</p>
    </div>
@endif
