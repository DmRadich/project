<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<form id="formID">
    <input type="text" id="login" placeholder="login"><br/>
    <input type="text" id="password" placeholder="password"><br/>
    <button type="sumbit">Login</button>
</form>

<script>
    $(document).ready(function () {
        $('#formID').submit(function () {
            let login = $('#login').val();
            let password = $('#password').val();

            $.ajax({
                url: 'api.php',
                method: 'POST',
                data: JSON.stringify(
                    {
                        login: login,
                        password: password
                    }
                )
            }).done(function (e) {
                if (e === 'true') {
                    window.location.replace('/');
                } else {
                    alert('not ok');
                }
            });

            return false;
        });
    });
</script>