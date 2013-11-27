<div id="registration">
    <form id="regForm" method="POST" onsubmit="return validate('update')">
        <input type="hidden" name="login" value="<?php echo($data['login']);?>">
        <input type="hidden" name="id" value="<?php echo($data['id']);?>">
        <span class="err" id="error"></span><br />
        <label for="fname">Имя:</label> <br />
        <input name="fname" type="text" value="<?php echo($data['fname']);?>"><br />
        <span class="err" id="fname"></span> <br />
        <label for="sname">Фамилия:</label> <br />
        <input name="sname" type="text" value="<?php echo($data['sname']);?>"><br />
        <span class="err" id="sname"></span> <br />
        <label for="email">E-mail:</label> <br />
        <input name="email" type="text" value="<?php echo($data['email']);?>"><br />
        <span class="err" id="email"></span> <br />
        <hr>
        <label for="pwd">Новый пароль:</label> <br />
        <input name="pwd" type="password"><br />
        <span class="err" id="pwd"></span> <br />
        <label for="pwdre">Пароль еще раз:</label> <br />
        <input name="pwdre" type="password"> <br />
        <hr>
        <label for="bdate">Дата рождения:</label> <br />
        <input id="datepicker" name="bdate" type="text" readonly="readonly"  value="<?php echo($data['birthdate']);?>"><br />
        <span class="err" id="bdate"></span> <br />
        <label for="phone">Номер телефона:</label> <br />
        <input name="phone" type="text"  value="<?php echo($data['phone']);?>"><br />
        <span class="err" id="phone"></span> <br />
        <input type="submit" name="submit">
    </form>
</div>

    

    