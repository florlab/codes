<style>
    .box {
        width: 100px;
        height: 100px;
        background: #2db34a;
        transition-property: background;
        transition-duration: 1s;
        transition-timing-function: linear;
    }
    .box:hover {
        background: #ff7b29;
    }



    .box2 {
        width: 100px;
        height: 100px;
        background: #2db34a;
        border-radius: 6px;
        transition-property: background, border-radius;
        transition-duration: 1s;
        transition-timing-function: linear;
    }
    .box2:hover {
        background: #ff7b29;
        border-radius: 50%;
    }


    .box3 {
        width: 100px;
        height: 100px;
        background: #2db34a;
        border-radius: 6px;
        transition-property: background, border-radius;
        transition-duration: .2s, 1s;
        transition-timing-function: linear, ease-in;
        transition-delay: 0s, 1s;
    }
    .box3:hover {
        background: #ff7b29;
        border-radius: 50%;
    }


</style>

<div class="box"></div>
<div class="box2"></div>
<div class="box3"></div>