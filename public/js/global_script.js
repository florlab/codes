$('.numberOnly').bind('keypress', function (e) {
    return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
});


$(".txtboxLetterOnly").keypress(function(event) {
    if (event.charCode!=0) {
        var regex = new RegExp("^[ A-Za-z,.]*$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);

        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
});

$(".autocap1sttype").keypress(function(event) {
    var inputValue = event.which;
    if($("#"+this.id).val().length==1) {
        $("#"+this.id).val($("#"+this.id).val().toUpperCase());
    }
    // allow letters and whitespaces only.

});

$(".txtboxNumberOnly").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
        // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        // let it happen, don't do anything
        return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});


$(".txtboxNumber").keypress(function(event) {
    if (event.charCode!=0) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);

        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
});

$('input[type=text]').bind("paste",function(e) {
    e.preventDefault();
});

$('input[type=text]').bind("copy",function(e) {
    e.preventDefault();
});

function capitalizedInput(e){
    var txt = $(e).val();
    $(e).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));
}


$(".txtboxNumberOnlyAmount").on("keypress keyup blur", function (event) {
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57) && event.which != 8) {
        event.preventDefault();
    }
});
$(".txtboxNumberOnlyAmountWithComma").on("keypress keyup blur", function (event) {
    $(this).val($(this).val().replace(/[^0-9 ,\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57) && event.which != 8) {
        event.preventDefault();
    }
});

$(".txtOnlyNoSymbol").keypress(function(e){
    e = e || event;
    return /^[-.a-z-ñÑ' ]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,37,39,46,9,126,164,165].indexOf(e.keyCode));
});

$(".txtAlphaNumericAddress").keypress(function(e){
    e = e || event;
    return /^[#0-9, a-z.,-]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,9,37,39,46].indexOf(e.keyCode));
});

$(".noSpecialCharacter").keypress(function(e){
    e = e || event;
    return /^[0-9, a-z-]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,9,37,39,46].indexOf(e.keyCode));
});

$(".txtAlphaNumericAddressZip").keypress(function(e){
    e = e || event;
    return /^[0-9 a-z-]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,9,37,39,46].indexOf(e.keyCode));
});

$(".txtOnlyNoSymbol").keypress(function(e){
    e = e || event;
//            return /[a-z0-9]/i.test(String.fromCharCode(e.charCode || e.keyCode))
    return /^[.a-z ]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,37,39,46,9,126].indexOf(e.keyCode));
});

$(".numberOnly").keypress(function(e){
    e = e || event;

    if($(this).val().indexOf(".") > -1)
    {
        return /^[0-9]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
            || !!(!e.charCode && ~[8,9,37,39,46,9].indexOf(e.keyCode));
    }
    else
    {
        return /^[0-9.]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
            || !!(!e.charCode && ~[8,9,37,39,46,9].indexOf(e.keyCode));
    }
});

$(".number").keypress(function(e){
    e = e || event;
    return /^[0-9]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,9,37,39,46,9].indexOf(e.keyCode));

});

$(".numberOnly").on("blur", function(){
    var num = $(this).val();
    $(this).val(parseFloat(Math.round(num * 100) / 100).toFixed(2));
});

$(".txtAlphaNumericAddress").keypress(function(e){
    e = e || event;
//            return /[a-z0-9]/i.test(String.fromCharCode(e.charCode || e.keyCode))
    return /^[#0-9, a-z.,-]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,9,37,39,46].indexOf(e.keyCode));
});

$(".txtAlphaNumericAddressZip").keypress(function(e){
    e = e || event;
//            return /[a-z0-9]/i.test(String.fromCharCode(e.charCode || e.keyCode))
    return /^[0-9, a-z-]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,9,37,39,46].indexOf(e.keyCode));
});

$(".txtAlphaNumeric").keypress(function(e){
    e = e || event;
//            return /[a-z0-9]/i.test(String.fromCharCode(e.charCode || e.keyCode))
    return /^[0-9, a-z-]+$/i.test(String.fromCharCode(e.charCode || e.keyCode))
        || !!(!e.charCode && ~[8,9,37,39,46].indexOf(e.keyCode));
});

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

if (!isMobile.any()){

}