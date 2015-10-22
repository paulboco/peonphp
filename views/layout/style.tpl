<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/simplex/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/styles/default.min.css">
<link rel="stylesheet" type="text/css" href="/css/railscasts.css">
<style type="text/css">
    @font-face {
        font-family: museo-thick;
        src: url(/fonts/museo_sans_900.woff2);
    }
    @font-face {
        font-family: museo-medium;
        src: url(/fonts/museo_sans_500.woff2);
    }
    @font-face {
        font-family: museo;
        src: url(/fonts/museo_300.woff2);
    }
    * {
        font-size: 17px;
        line-height: 2;
    }
    html {
        overflow-y: scroll;
    }
    body {
        margin-top: 60px;
    }
    h1.page-header {
        border-bottom: none;
    }
    h1, h2, h3, h4 {
        font-family: museo-medium;
        border-bottom: dotted 2px #ccc;
        text-shadow: 1px 1px 2px #888;
        padding: 10px 0;
    }
    h1.page-header>small {
        text-shadow: none;
    }
    a {
        color: #008;
    }
    footer {
        margin-top: 50px;
        padding-top: 50px;
        padding-bottom: 50px;
        color: gray;
    }
    code {
        background-color: #fff;
        color: #a00;
        font-size: 15px;
    }
    div.target {
        margin-top: 70px;
        height: 100px;
    }
    div.function-definition {
        border-radius: 9px;
        border: solid 1px #ccc;
        margin-bottom: 50px;
        padding: 60px 20px;
        background-color: #F0F7FF;
        box-shadow: 3px 3px 5px #ccc;
    }
    div.function-definition h3 {
        font-weight: bold;
        margin-top: 0;
    }
    div.function-definition h3,
    div.function-definition h4 {
        padding-bottom: 10px;
        color: #700;
    }
    div.function-definition p {
        padding: 0 0 15px;
    }
    div.function-definition figure.function {
        margin: 15px 0 30px;
        padding: 15px;
        border: solid 1px #bbb;
        border-radius: 7px;
        font-family: monospace;
        font-weight: bold;
        background-color: #fff;
        color:#007;
    }
    div.function-definition dt {
        color:#007;
    }
    div.function-definition dd {
        padding: 0 20px 20px;
    }
    em.hint {
        cursor:help;
        border-bottom: dashed 1px #ccc;
    }
    pre {
        margin-bottom: 30px;
    }
    th.center, td.center {
        text-align: center;
    }
    th.right, td.right {
        text-align: right;
    }
    ul.nav-compact {
        list-style-type: none;
        list-style-position: inside;
        padding-bottom: 50px;
        padding-left: 10px;
    }
    ul.nav-compact a {
        display: block;
        padding-left: 10px;
    }
    ul.nav-compact a:hover {
        background-color: #eee;
    }
    a#back-to-top {
        position:fixed;
        bottom: 0;
        right: 20px;
        text-decoration: none;
    }
    a#back-to-top span {
        display: none;
        font-size: 30px;
        color: gray;
    }
    .navbar-inverse {
        background-color: #AA0000;
        box-shadow: 4px 2px 15px #000;
    }
    .navbar-inverse .navbar-brand {
        font-size: 130%;
        font-weight: bold;
        text-transform: uppercase;
        font-family: museo-thick;
        letter-spacing: .3em;
        color: #eee;
    }
    .navbar-inverse .navbar-nav>.active>a,
    .navbar-inverse .navbar-nav>.active>a:hover {
        background-color: rgba(0, 0, 0, 0.12);
    }
    .navbar-inverse .navbar-nav>li>a {
        color: #e0e0e0;
    }
    .popover-title {
        font-size: larger;
    }
    .popover-content {
        font-size: 108%;
    }
</style>
