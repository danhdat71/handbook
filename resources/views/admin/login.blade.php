<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');

        * {
            font-family: 'Open Sans', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .main-container {
            width: 100%;
            height: 100vh;
            background: url('https://images.pexels.com/photos/176851/pexels-photo-176851.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');
            transition: 0.4s linear;
        }

        .box {
            width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .8);
            padding: 40px;
            box-sizing: border-box;
            box-shadow: 0px 15px 25px rgba(0, 0, 0, .5);
            border-radius: 10px;
        }

        .box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .box p {
            margin-bottom: 0;
        }

        .box p:nth-child(even) {
            margin-top: 0;
        }

        .box a {
            color: #9a9d9e;
            font-size: 14px;
            text-decoration: none;
        }

        .box .input-box {
            position: relative;
        }

        .box .input-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            margin-bottom: 30px;
            color: #fff;
            border: 1px solid #fff;
            border: none;
            border-bottom-style: solid;
            outline: none;
            letter-spacing: 1px;
            background: transparent;
        }

        .box .input-box label {
            position: absolute;
            color: #fff;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }

        .box .input-box input:focus~label,
        .box .input-box input:valid~label {
            top: -18px;
            left: 0;
            color: #03a9f4;
            font-size: 12px;
        }

        .box input[type=submit] {
            background: transparent;
            border: none;
            outline: none;
            background: #03a9f4;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        #logged-in {
            width: 100%;
            height: auto;
            text-align: center;
            margin: auto;
            position: absolute;
            top: 50px;
            display: none;
        }

        .login-true {
            opacity: 0;
        }

    </style>
</head>

<body>
    <div id="main" class="main-container">
        <div class="box">
            <h2>Login</h2>
            <form id="form-login">
                <div class="input-box">
                    <input id="user-name" type="text" name="email">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input id="user-pass" type="password" name="password">
                    <label>Password</label>
                </div>
                <input id="submit" type="submit" name="" value="Submit">
            </form>
            <p id="failed-message" style="font-style:italic;color:red;padding-top:0;padding-bottom:10px"></p>
        </div>
    </div>
    <div id="logged-in">
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('#submit').click(function(e){
        e.preventDefault();
        let formData = new FormData($('#form-login')[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            url: 'login',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            type: 'post',
            success: function(res) {
                let failedMsg = $('#failed-message');
                if(res.status == false){
                    failedMsg.text(res.messages);
                }else{
                    failedMsg.text('');
                    location.href = "config";
                }
            }
        });
    });
</script>

</html>
