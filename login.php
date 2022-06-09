<?php
if (!empty($_POST)) {
    if ($_POST['status'] == 'pass') {
        $params = "username=" . $_POST['login']['username'] . "&pass=" . $_POST['login']['pass'];
        $redirectParams = base64_encode($params);
        header("Location: route.php?params=" . $redirectParams . "&login=1");
    }
}
?>


<div class="login-bg">
    <div class="login-container">
        <div class="login-logo">
            <h1>Ticket Monitoring System</h1>
            <p style="font-size: 9px;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam officiis labore nostrum corrupti.</p>
        </div>
        <form id="tms-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <!-- <input type="text" placeholder="Username" name="username"> -->
            <div class="login-group-input">
                <div class="login-group">
                    <i class="fa-solid fa-user-astronaut"></i>
                    <input type="text" placeholder="Username" id="username" name="login[username]">
                </div>
                <div class="login-group">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input type="password" placeholder="Password" id="password" name="login[pass]">
                </div>
            </div>
            <div class="login-actions">
                <input type="button" value="Log in" id="loginBtn" onclick="login()">
                <a href="">Forgot password</a>
            </div>

        </form>
    </div>

</div>
<input type="text" hidden id="status" name="status">
<script>
    let form = document.querySelector('#tms-login')

    const login = () => {
        const username = $('#username')
        const pass = $('#password')
        if (username.val() == '' || pass.val() == '') {
            alert("Please fill all the input fields")


        } else {
            fetch('controller/clsLogin.php', {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/x-www-form-urlencoded'
                    },
                    body: $('#tms-login').serialize() + '&method=login'
                })
                .then((res) => res.json())
                .then((res) => {
                    if (res) {
                        let input = $('#status')
                            .attr('type', 'hidden')
                            .val('pass')
                        form.append(input[0])
                        form.submit()
                    } else {
                        alert('Invalid Login')
                    }
                })
        }

    }

    function formObject(form) {
        let items = {};
        let formElements = form.elements

        for (let i = 0; i < formElements.length; i++) {
            if (formElements[i].type != 'button' && formElements[i].type != 'submit') {
                items[formElements[i].name] = formElements[i].value
            }
        }
        return items
    }
</script>