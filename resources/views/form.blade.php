<link href="{{ URL('css/template.css') }}" rel="stylesheet" type="text/css">

<form action="{{ URL('uploadIt') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="email" class="flo-input"/>
    <input type="file" name="file" class="flo-input"/>
    <button class="flo-btn green">Submit</button>
</form>