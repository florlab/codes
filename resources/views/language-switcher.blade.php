@extends('layouts.default')

@section('content')


<script>
    $(document).ready(function(){
       $('#language-switcher').change(function(){
          var locale = $(this).val();
          var _token = $('input[name=_token]').val();
           $.ajax({
               url:'/changeLanguage',
               type:'POST',
               data: {locale: locale, _token: _token},
               dataType:'json',
               sucess:function(data){

               },
               error:function(data){

               },
               beforeSend:function(){

               },
               complete:function(data){
                   window.location.reload(true);
               }
           })
       });
    });
</script>
{!! csrf_field() !!}

{{ trans('app.test') }}
<select name="language-switcher" id="language-switcher">
    <option value=""></option>
    <option value="en">English</option>
    <option value="de">German</option>
</select>


@stop
