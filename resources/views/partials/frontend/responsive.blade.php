<!DOCTYPE html>
<html>
<head>
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
            width: 1024px;
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
