<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Republisys Rewards</title>
    <style>
        html,body{
            margin: 0;
        }
        .header-container{
            position: fixed;
            width: 100%;
            height: 50px;
            background: cadetblue;
        }
        .wrapper{
            height: 100vh;
            margin: auto;
            padding-top: 50px;
        }
        .left-container{
            width: 25%;
            height: 100%;
            float: left;
            background: #009998;
        }
            .login-form{
                width: 80%;
                margin: auto;
                margin-top: 20px;
            }
                .login-form form input{
                    width: 100%;
                }
        .center-container{
            width: 60%;
            height: 100%;
            float: left;
            background: #20895e;
        }
            .center-inner-container{
                padding: 20px;
            }
                .slider{
                    width: 100%;
                    height: 400px;
                    background: #245269;
                }
                .information{
                    margin-top: 20px;
                }
                    .background-information{
                        width: 60%;
                        float: left;
                        height: 200px;
                        background: #3d6983;
                    }
                    .other-information{
                        width: 40%;
                        float: left;
                        height: 200px;
                        background: #c7ddef;
                    }
        .right-container{
            width: 15%;
            height: 100%;
            float: left;
            background: #286090;
        }
        @media screen and (min-width: 1024px){
            .wrapper{
                width: 1024px;
            }
        }
        @media screen and (max-width: 1190px) {  /*laptop*/
            .header-container{background: blue;}
        }
        @media screen and (max-width: 980px) { /* pad */
            .header-container{background: violet;}

            .center-container{
                width: 75%;
            }
            .right-container{
                width: 100%;
            }
        }
        @media screen and (max-width:960px){
            .header-container{background: green;}
        }
        @media screen and (max-width: 800px) and (min-width: 750px){
            .header-container{background: orange;}
        }
        @media screen and (max-width:767px){ /* phone */
            .header-container{background: brown;}
        }
        @media screen and (max-width: 749px) and (min-width: 700px){
            .header-container{background: lightblue;}
        }
        @media screen and (max-width: 500px){
            .header-container{background: lime;}
        }
        @media screen and (max-width: 479px) { /* mini phone */
            .header-container{background: magenta;}

            .left-container{
                position: fixed;
                height: 200px;
            }
            .center-container{
                width: 100%;
            }
        }











        /*@media screen and (min-width:767px) and (max-width:980px){
            .header-container{background: black;}
        }*/
        /*@media screen and (max-width: 699px) and (orientation: landscape){
            .header-container{background: olive;}
        }
        @media screen and (max-width: 600px) and (orientation: landscape){
            .header-container{background: teal;}
        }*/


        /*@media screen and (min-resolution:300dpi) and (max-width:960px){
            .header-container{background: white;}
        }*/


        /* iPads (portrait) ----------- */
        @media only screen
        and (min-device-width : 768px)
        and (max-device-width : 1024px)
        and (orientation : portrait) {
            .header-container{background: yellow;}
        }
        /* iPads (landscape) ----------- */
        @media only screen
        and (min-device-width : 768px)
        and (max-device-width : 1024px)
        and (orientation : landscape) {
            .header-container{background: red;}
        }

    </style>
</head>
<body>
    <div class="header-container">
    </div>
    <div class="wrapper">
        <div class="left-container">
            <div class="left-inner-container">
                <div class="logo">
                    <img src="https://www.tassimo.co.uk/INTERSHOP/static/WFS/Tassimo-GB-Site/-/-/en_GB/img/notavailable.svg" width="100%">
                </div>
                <div class="login-form">
                    <form>
                        <input type="text" name="username" placeholder="username"/>
                        <input type="text" name="password" placeholder="password"/><br/>
                        <input type="submit" name="login" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="center-container">
            <div class="center-inner-container">
                <div class="slider">

                </div>
                <div class="information">
                    <div class="background-information">

                    </div>
                    <div class="other-information">

                    </div>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="right-inner-container">
                <div class="recent-updates">
                     <h5>News and Events</h5>
                    <ul>
                        <li><a href="#">Article 1</a></li>
                        <li><a href="#">Article 2</a></li>
                        <li><a href="#">Article 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
