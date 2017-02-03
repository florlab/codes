<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="author" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="Resource-type" content="Document"/>

    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery.fullPage.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-modal.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-theme-modal.css') }}" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="{{ url('js/scrolloverflow.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery.fullPage.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap-modal.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#fullpage').fullpage({
                menu: '#menu',
                anchors: ['about', 'service', 'portfolio', 'contact'],
                sectionsColor: ['', '', '', '#7E8F7C'],
                autoScrolling: false
            });
        });
    </script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="{{ URL('css/template.css') }}" rel="stylesheet" type="text/css">
    <style>
        .section .fp-tableCell{
            background: rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body>
<header id="masthead" style="z-index: 1008;">
    <nav class="flo-nav">
        <div class="flo-menu-container">
            <ul class="flo-primary-menu green">
                <li><a href="#about">About</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

<div id="fullpage">
    <div class="section" id="section0" style="background: url('https://static.pexels.com/photos/297755/pexels-photo-297755.jpeg') center center / cover no-repeat fixed">
        <div class="flo-container">
            <section class="flo-section one-column">
                <div class="flo-column">
                    <h1 class="label-white">Dolorem Ipsum Quia</h1>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    <button class="flo-btn pink">Rem Ipsum</button>
                </div>
            </section>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="slide" id="slide1">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide" id="slide2">
            <h1>Horizontal sliders!</h1>
            <img src="imgs/iphone-blue.png" alt="iphone" id="iphone-two" />
        </div>

    </div>
    <div class="section" id="section2" style="background: url('https://static.pexels.com/photos/265613/pexels-photo-265613.jpeg') center center / cover no-repeat fixed">
        <div class="intro">
            <h1>Just use </h1>
            <p>autoScrolling:false</p>
        </div>
    </div>
</div>

</body>
</html>