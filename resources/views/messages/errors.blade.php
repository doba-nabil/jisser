@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div id="myMsg" class="errorMyMsg">
            <i class="fa fa-times"></i>
            <p style="margin: 0">{{ $error }}</p>
        </div>
    @endforeach
@endif
