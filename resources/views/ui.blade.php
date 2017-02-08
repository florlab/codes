<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Resizable - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        #resizable { width: 150px; height: 150px; padding: 0.5em; }
        #resizable h3 { text-align: center; margin: 0; }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#resizable" ).resizable();
        } );


    </script>

    <style>
        #draggable {
            width: 100px;
            height: 100px;
            background: #ccc;
        }
        #droppable {
            position: absolute;
            left: 250px;
            top: 0;
            width: 125px;
            height: 125px;
            background: #999;
            color: #fff;
            padding: 10px;
        }
    </style>
</head>
<body>

<div id="droppable">Drop here</div>
<div id="draggable">Drag me</div>

<div id="resizable" class="ui-widget-content">
    <h3 class="ui-widget-header">Resizable</h3>
</div>

<script>
    $( "#resizable" ).draggable();
    $( "#droppable" ).droppable({
        drop: function() {
            alert( "dropped" );
        }
    });
</script>
</body>
</html>