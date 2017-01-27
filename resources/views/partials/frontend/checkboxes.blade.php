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
    @media screen and (min-resolution:300dpi) and (max-width:960px){

    }
    @media screen and (max-width: 479px) { /* mini phone */

    }
    @media screen and (max-width: 500px){

    }
    @media screen and (max-width: 600px) and (orientation: landscape){

    }
    @media screen and (max-width: 699px) and (orientation: landscape){

    }
    @media screen and (max-width: 749px) and (min-width: 700px){

    }
    @media screen and (max-width: 800px) and (min-width: 700px){

    }
    @media screen and (max-width: 800px) and (min-width: 750px){

    }
    @media screen and (max-width:767px){ /* phone */

    }
    @media screen and (min-width:767px) and (max-width:980px){

    }
    @media screen and (max-width: 980px) { /* pad */

    }
    @media screen and (max-width:960px){

    }
    @media screen and (max-width: 1190px) { /* laptop */

    }
    /* iPads (portrait) ----------- */
    @media only screen
    and (min-device-width : 768px)
    and (max-device-width : 1024px)
    and (orientation : portrait) {

    }

    /* iPads (landscape) ----------- */
    @media only screen
    and (min-device-width : 768px)
    and (max-device-width : 1024px)
    and (orientation : landscape) {

    }
</style>

<input type='checkbox' name='thing' value='valuable' id="thing"/><label for="thing"></label>
<input type='checkbox' name='thing' value='valuable' id="thing2"/><label for="thing2"></label>
<input type='checkbox' name='thing' value='valuable' id="thing3"/><label for="thing3"></label>
