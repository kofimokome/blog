<html>
<head>
    <style>


        body {
            background: #08121A;
            background-image: url('../img2.jpg');
            background-repeat: no-repeat;
            margin:0;
            padding:0;
            font-family: 'Source Sans Pro', 'sans-serif';
            font-size: 1.1em;
            color: #545B64;
            font-weight: 300;
        }

        * {
            margin:0;
            padding:0;
        }


        p {
            line-height: 1.7em;
            margin-bottom: 25px;
        }

        a {
            color: #6B7480;
            border-bottom: 1px solid #6B7480;
            text-decoration: none;
        }

        a:hover {
            border-bottom-color: #5DA1C3;
            color: #5DA1C3;
        }

        a:focus {
            outline: none;
        }


        a.button { background: #5DA1C3;
            color: #FFF;
            display: inline-block;

            padding: 8px 22px;

            font-size: 0.85em;
            letter-spacing: 0.25px;
            line-height: 1.3em;
            border-radius: 5px;
            text-decoration: none;
            border:none;
            text-transform: uppercase;
            font-weight: bold;
        }

        a.button:hover {
            background:#4995BC;
        }

        a.button-reversed {
            background-color: #ddd;
            color: #666;
        }

        a.button-reversed:hover {
            background: #ccc;
        }


        span.required {
            color: #ff0000;
        }

        h1 {
            color: #eee;
            font-size: 2.7em;
            margin-bottom: 10px;
        }

        h2 {
            color: #6D7883;
            font-size: 2.8em;
            letter-spacing: -2px;
            padding: 0px 0px 10px;
            font-weight: bold;
            margin: 0px;
        }

        h3 {
            color: #5DA1C3;
            font-size: 1.9em;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        h4 {
            color: #ccc;
            font-size: 1.2em;
            text-transform: uppercase;
            padding-bottom: 10px;
            font-weight: bold;
        }

        h5 {
            padding-bottom: 10px;
            font-size: 1.1em;
            color: #999;
        }

        ul, ol {
            margin: 0 0 35px 35px;
            padding: 0;
            list-style: disc;
        }

        li {
            padding-bottom: 10px;
        }

        li ol, li ul {
            font-size: 1.0em;
            margin-bottom: 0;
            padding-top: 5px;
        }


        .width {
            max-width: 1100px;
            margin: 0 auto;
        }


        #container {
            width: auto;
            margin: 0 auto;
        }

        header {
            padding: 0;
            z-index: 9999;
            border-radius: 10px;
            opacity: 0.97;
            margin: 20px auto 0;
            position: relative;
            text-align: left;
            background-color: #363A3F;
        }



        header h1 {
            margin: 0;
            float: left;
        }

        header h1 a {
            color: #fff;
            padding: 20px 25px;
            font-size: 0.8em;
            border-bottom: none;
            text-transform: uppercase;
            display: block;
            font-weight: 600;
        }
        header h1 a:hover {
            text-decoration: underline;
            color: #fff;
        }

        nav {
            float: right;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        nav ul ul {
            margin: 0;
            padding: 0 0 15px 0;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        nav ul li {
            display: block;
            float: left;
            padding: 0px;
        }

        nav ul li li {
            padding: 0;
        }


        nav ul li a {
            display: block;
            float: left;
            padding: 32px 28px;
            color: #fff;
            font-size: 0.95em;
            margin: 0;
            border-bottom: none;
            letter-spacing: 0px;
        }

        nav ul li a i { padding-right: 5px; }

        nav ul li li a {
            float: none;
            padding: 15px 0 15px 32px;
        }

        nav ul li a:hover {
            color: #fff;
            text-decoration: none;
        }

        nav ul li.selected a, nav ul li.selected a:hover {
            color: #fff;
            background-color: #2A2E32;
            font-weight: bold;
        }


        nav ul li a:hover, nav ul li.sfHover a {
            color: #fff;
        }


        nav ul li a.sf-with-ul:hover, nav ul li.sfHover a {
            color: #fff;
        }


        nav ul li.sfHover ul a, nav ul ul {
            background: #363A3F;
        }

        nav ul li.sf-with-ul.selected ul li a, nav ul li.selected.sfHover li a,  nav ul li.sfHover a a, nav ul li.selected li a  {
            font-weight: normal;
        }

        nav ul li li a:hover, nav ul li.sfHover li a:hover {
            color: #fff;
            background-color: #2A2E32;
        }

        /*** ESSENTIAL STYLES ***/
        .sf-menu, .sf-menu * {
            list-style:		none;
        }
        .sf-menu {
            line-height:	1.0;
        }
        .sf-menu ul {
            position:		absolute;
            top:			-999em;
            width:			200px; /* left offset of submenus need to match (see below) */
            margin-top: 	10px;
        }
        .sf-menu ul li {
            width:			100%;
        }
        .sf-menu li:hover {
            visibility:		inherit; /* fixes IE7 'sticky bug' */
        }
        .sf-menu li {
            float:			left;
            position:		relative;
        }
        .sf-menu a {
            display:		block;
            position:		relative;
        }
        .sf-menu li:hover ul,
        .sf-menu li.sfHover ul {
            left:			0;
            top:			71px; /* match top ul list item height */
            z-index:		99;
        }
        ul.sf-menu li:hover li ul,
        ul.sf-menu li.sfHover li ul {
            top:			-999em;
        }
        ul.sf-menu li li:hover ul,
        ul.sf-menu li li.sfHover ul {
            left:			auto; /* match ul width */
            top:			0;
        }
        ul.sf-menu li li:hover li ul,
        ul.sf-menu li li.sfHover li ul {
            top:			-999em;
        }
        ul.sf-menu li li li:hover ul,
        ul.sf-menu li li li.sfHover ul {
            left:			10em; /* match ul width */
            top:			0;
        }



        a.button-slider {
            padding: 18px 25px;
            font-size: 0.8em;
            text-align: center;
            border: 2px solid #3F87AB;
            margin: 0px 10px 0px 0;
        }

        a.button-slider.button-reversed {
            border-color: #999;
        }

        a.button-slider i { padding-right: 5px; }

        img {
            max-width: 100%;
            height: auto;
        }

        #body {
            margin: 0 auto;
            padding: 0;
            clear: both;
        }

        .with-right-sidebar {
            margin-right: 2%;
        }

        .with-left-sidebar {
            margin-left: 2%;
        }










        .sidebar ul.blocklist li a,
        .sidebar ul.blocklist li a:hover {
            border-bottom: 0;
            display: block;
            padding: 12px 10px;
            border-radius: 10px;
        }

        .sidebar ul.blocklist li a.selected,
        .sidebar ul.blocklist li a.selected:hover {
            background:#5DA1C3;
            border-bottom: 1px solid #80B1CB;
            color: #FFFFFF;
            font-weight: bold;
        }

        .sidebar ul.blocklist li a:hover {
            background-color: #1E2124;
            color: #A0A8B0;
        }
        .sidebar li ul.blocklist li li {
            font-size: 1.0em;
        }

        .sidebar li ul.blocklist ul {
            margin-top: 0;
        }

        .sidebar li ul.blocklist li li a,
        .sidebar li ul.blocklist li li a:hover {
            padding-left: 25px;
        }

        .sidebar ul.newslist li {
            padding: 20px 0px;
        }

        .sidebar ul.newslist p {
            line-height: 2.1em;
            margin-bottom: 0;
        }

        .sidebar ul.newslist span.newslist-date {
            background-color: #5DA1C3;
            color: #fff;
            padding: 5px 10px;
        }




        .clear {
            clear: both;
        }



        div.social-icons a {
            border-bottom: none;
            margin-right: 15px;
        }
    </style>
</head>
<body>
<div>
    <header>
        <div class="width">

            <h1><a href="http://localhost:8000/">deiform</a></h1>


        </div>

        <div class="clear"></div>


    </header>
</div>
<hr>
<div style="padding:40px;">
    <h4>Click here to reset your password: </h4><h6><a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a></h6>
</div>
<hr>
<div><center>Click here if you think this message was sent to you by mistake</center></div>
</body>
</html>