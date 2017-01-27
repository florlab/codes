<style>
    input[type=checkbox] {
        display:none;
    }
    input[type=checkbox] + label
    {
        border:1px solid black;
        height: 16px;
        width: 16px;
        display: block;
    }
    input[type=checkbox] + label
    {
        border:1px solid black;
        height: 16px;
        width: 16px;
        display: inline-block;
        position: relative;
    }
    input[type=checkbox]:checked + label:after{
        background:url("http://www.downloadclipart.net/large/17071-check-mark-design.png") no-repeat;
        background-size: 10px 10px;
        height: 10px;
        width: 10px;
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
    }
</style>

<input type='checkbox' name='thing' value='valuable' id="thing"/><label for="thing"></label>
<input type='checkbox' name='thing' value='valuable' id="thing2"/><label for="thing2"></label>
<input type='checkbox' name='thing' value='valuable' id="thing3"/><label for="thing3"></label>
