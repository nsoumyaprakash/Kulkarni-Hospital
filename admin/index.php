<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lakshmi Maternity Admin</title>
    <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link href="assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="assets/plugins/toastify-js/src/toastify.css" rel="stylesheet">

    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/toastify-js/src/toastify.js"></script>
    <script src="js/utilityFunctions.js"></script>
    <style>
    @import url("https://fonts.googleapis.com/css?family=Ubuntu:700&display=swap");

    /*CSS Reset*/
    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    font,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    button,
    form,
    fieldset,
    input,
    textarea {
        margin: 0;
        padding: 0;
        outline: 0;
        border: 0;
        background: transparent;
        vertical-align: baseline;
        font-size: 100%;
    }

    body {
        line-height: 1;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: normal;
    }

    ol,
    ul {
        list-style: none;
    }

    blockquote,
    q {
        quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: "";
        content: none;
    }

    /* remember to define focus styles! */
    :focus {
        outline: 0;
    }

    /* remember to highlight inserts somehow! */
    ins {
        text-decoration: none;
    }

    del {
        text-decoration: line-through;
    }

    /* tables still need 'cellspacing="0"' in the markup */
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }

    address,
    caption,
    cite,
    code,
    dfn,
    em,
    strong,
    var {
        font-weight: normal;
        font-style: normal;
    }

    caption,
    th {
        text-align: left;
        font-weight: normal;
        font-style: normal;
    }

    body {
        /* background: linear-gradient(to right, #00f, #952929, #fff); */
        background: rgba(230, 229, 229, 0.69);
        background-size: 600% 100%;
        /* animation: smoothGradient 15s linear infinite; */
        min-height: 100%;
        height: 100%;
        font-weight: lighter;
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        -webkit-font-smoothing: subpixel-antialiased;
    }

    a {
        color: #b1c;
        text-decoration: none;
    }

    p {
        display: block;
        width: 300px;
        margin-left: -180px;
        margin-top: -5px;
    }

    p a {
        color: #2f2e2e;
        font-size: 0.9rem;
        text-decoration: none;
    }

    p a:hover {
        color: #3a60a7;
        border-bottom: 1px solid gray;
    }

    #warp {
        position: relative;
        margin: 50px auto 0;
        width: 400px;
        text-align: center;
        color: white;
    }

    form {
        display: block;
        width: 400px;
        height: 300px;
    }

    h1 {
        color: #b6b6b6;
        font-weight: bolder;
        font-size: 60px;
    }

    .admin {
        height: 300px;
        float: left;
        width: 200px;
        border-right: 1px solid #333333;
        text-align: left;
        left: 0;
        top: 0;
        transition: all 200ms ease-in 100ms;
    }

    .cms {
        height: 300px;
        top: 70px;
        left: -62px;
        float: right;
        width: 150px;
        text-align: right;
        transition: all 200ms ease-in 100ms;
    }

    .admin,
    .cms {
        position: relative;
        display: block;
        overflow: hidden;
        transform: rotate(30deg);
    }

    .cms h1 {
        margin-left: -10px;
        color: #838385;
    }

    .roti,
    .rota {
        position: relative;
        display: block;
        transform: rotate(-30deg);
    }

    .admin:hover h1,
    .cms:hover h1 {
        color: #3a60a7;
    }

    .rota {
        margin-top: 80px;
        margin-left: 35px;
    }

    .roti {
        margin-top: 80px;
        margin-right: 55px;
    }

    input,
    button {
        margin: 4px;
        padding: 8px 6px;
        width: 350px;
        background: white;
        color: black;
        font-size: 0.9rem;
        transition: all 1s ease-out;
    }

    button {
        margin-left: -230px;
        background: #303030;
        color: white;
        text-align: right;
        cursor: pointer;
        transition: all 1s ease-out;
    }

    button:hover {
        background: #3a60a7;
        transition: all 0.3s ease-in;
    }

    input:hover {
        box-shadow: inset 0 0 5px rgba(190, 29, 204, 0.6);
    }

    input:focus {
        background: gray;
        color: white;
    }

    .up {
        top: 100px;
        left: -60px;
    }

    .down {
        top: -100px;
        left: 60px;
    }

    @keyframes smoothGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
    </style>

</head>

<body>
    <div class="d-flex justify-content-center" id="errorMessage"></div>

    <div id="warp">
        <form id="loginForm" action="controllers/login-controller.php" autocomplete="off">
            <div class="admin">
                <div class="rota">
                    <h1>ADMIN</h1>
                    <input id="username" type="text" name="username" placeholder="Email" required /><br />
                    <input id="password" type="password" name="password" placeholder="Password" required />
                </div>
            </div>
            <div class="cms">
                <div class="roti">
                    <h1>CMS</h1>
                    <button id="loginBtn" type="submit">Login</button><br />
                    <p><a href="#">Forgot Password</a></p>
                </div>
            </div>
        </form>
    </div>

    <script>
    $("#loginForm").on("submit", (e) => {
        e.preventDefault();
        $(".admin").addClass("up").delay(100).fadeOut(100);
        $(".cms").addClass("down").delay(150).fadeOut(100);

        $.ajax({
            url: 'controllers/login-controller.php',
            type: 'POST',
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(response) {
                const parsedResponse = JSON.parse(response);
                if (parsedResponse.result.status.statusCode == "0") {
                    if (parsedResponse.role == "SuperAdmin") {
                        window.location.href = "pages/users.php";
                    } else {
                        window.location.href = "pages/dashboard.php";
                    }
                } else {
                    sweetAlert("error", parsedResponse.result.status.errorMessage);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                sweetAlert("error", error);
            }
        });

        setTimeout(() => {
            $(".admin").removeClass("up").fadeIn(100);
            $(".cms").removeClass("down").fadeIn(100);
        }, 1000);
    });
    </script>
</body>

</html>