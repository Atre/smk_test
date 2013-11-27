<div id="registration">
    <form id="regForm" method="POST" onsubmit="return validate()">
        <span class="err" id="error"></span><br />
        <label for="fname">Имя:</label> <br />
        <input name="fname" type="text"><br />
        <span class="err" id="fname"></span> <br />
        <label for="sname">Фамилия:</label> <br />
        <input name="sname" type="text"><br />
        <span class="err" id="sname"></span> <br />
        <label for="email">E-mail:</label> <br />
        <input name="email" type="text"><br />
        <span class="err" id="email"></span> <br />
        <hr>
        <label for="login">Логин:</label> <br />
        <input name="login" type="text"><br />
        <span class="err" id="login"></span> <br />
        <label for="pwd">Пароль:</label> <br />
        <input name="pwd" type="password"><br />
        <span class="err" id="pwd"></span> <br />
        <label for="pwdre">Пароль еще раз:</label> <br />
        <input name="pwdre" type="password"> <br />
        <hr>
        <label for="bdate">Дата рождения:</label> <br />
        <input id="datepicker" name="bdate" type="text" readonly="readonly"><br />
        <span class="err" id="bdate"></span> <br />
        <label for="phone">Номер телефона:</label> <br />
        <input name="phone" type="text"><br />
        <span class="err" id="phone"></span> <br />
        <input type="submit" name="submit">
    </form>
</div>


