<h3>List of item</h3>
<?php

if(!empty($data)){
    foreach($data as $key => $value){
        echo $value . '<a href="'.URL('removeToCart').'/'.$key.'">Remove</a>' . '<br>';
    }
}
?>

<form action="{{ URL('addToCart') }}" method="POST">
    <input type="hidden" name="item" value="VR Box">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <img src="https://i.ytimg.com/vi/luW9vbsIfEs/maxresdefault.jpg" width="100">
    <button>Add to Cart</button>
</form>

<form action="{{ URL('addToCart') }}" method="POST">
    <input type="hidden" name="item" value="USB">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <img src="http://www.storagereview.com/images/StorageReview-Kingston%20Secure-USB-3-ESET.jpg" width="100">
    <button>Add to Cart</button>
</form>