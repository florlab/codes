List of item
<?php

dd($data);

?>

<form action="{{ URL('addToCart') }}" method="POST">
    <input type="hidden" name="item" value="VR Box">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <img src="https://i.ytimg.com/vi/luW9vbsIfEs/maxresdefault.jpg" width="100">
    <button>Add to Cart</button>
</form>