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
                sectionsColor: ['', '#ff6038', '', '#ff375c'],
                autoScrolling: false
            });

            $('#myModalService').on('shown.bs.modal', function (e) {
                $('#fullpage').addClass('blur');
            })
            $('#myModalService').on('hidden.bs.modal', function (e) {
                $('#fullpage').removeClass('blur');
            })
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
    <div class="section" id="section0" style="background: url('/img/about-bg.jpeg') center center / cover no-repeat fixed">
        <div class="flo-container">
            <section class="flo-section one-column">
                <div class="flo-column">
                    <h1 class="flo-label white">Hello from Flow</h1>
                    <p class="flo-center">"Stay hungry. Stay Foolish. - Steve Jobs"</p>
                    <a class="flo-btn green" href="#contact">Build Something Better</a>
                </div>
            </section>
        </div>
    </div>
    <div class="section" id="section1" style="background: url('/img/services-bg.jpeg') center center / cover no-repeat fixed">
        <div class="flo-container">
            <section class="flo-section one-column">
                <div class="flo-column">
                    <p class="text-left">Start your ideas by us and make it simple with amazing outputs.</p>
                </div>
            </section>
            <section class="flo-section two-columns">
                <div class="flo-column">
                    <div data-toggle="modal" data-target="#myModalService">
                        <img src="{{ url('/img/icon-laravel.svg') }}" width="100">
                        <h3 class="flo-label white">Website Development</h3>
                    </div>
                </div>
                <div class="flo-column">
                    <div data-toggle="modal" data-target="#myModalService">
                        <img src="{{ url('/img/icon-android.svg') }}" width="100">
                        <h3 class="flo-label white">Mobile Apps</h3>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="slide" id="slide1">

        </div>

        <div class="slide" id="slide2">
            <h1>Horizontal sliders!</h1>
            <img src="imgs/iphone-blue.png" alt="iphone" id="iphone-two" />
        </div>
    </div>
    <div class="section" id="section3">

    </div>
</div>

<div style="position: fixed;bottom: 20px;right: 20px;">
    <h4>Flow</h4>
</div>

<!-- Modal -->
<div class="modal fade" id="myModalService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

</body>
</html>