//<script>
// Client-side form validation
function validate($update) {   
    var fname = document.forms[0].fname.value;
    var sname = document.forms[0].sname.value;
    var email = document.forms[0].email.value;

    var pwd = document.forms[0].pwd.value;
    var pwdre = document.forms[0].pwdre.value;
    var bdate = document.forms[0].bdate.value;
    var phone = document.forms[0].phone.value;
    var login = document.forms[0].login.value;
    var hasErrors = false;
    $(".err").text('');

    var arr = {'fname': fname, 'login': login, 'sname': sname, 'email': email, 'pwd': pwd, 'pwdre': pwdre,
    'bdate': bdate, 'phone': phone};

    // if changin profile
    if($update === 'update') {
        arr['update'] = true;
        arr['id'] = document.forms[0].id.value;
    }

$.get("ajax/ajax.php", {json: JSON.stringify(arr)}).success(function(data) {
    $("#error").html(data);
    });

if(fname.length == 0) {
    $("#fname").html("Введите имя<br/>");
    return false;
    }
if(sname.length == 0) {
    $("#sname").html("Введите фамилию<br/>");
    return false;
    }
if(email.length == 0) {
    $("#email").html("Введите email<br/>");
    return false;
    }
var reg = /\S+@\S+\.\S+/;
if (!reg.test(email)) {
    $("#email").html("Введите корректный email<br/>");
    return false;
    }
if(login.length == 0) {
    $("#login").html("Введите логин<br/>");
    return false;
    }
if(pwd.length == 0) {
    $("#pwd").html("Введите пароль<br/>");
    return false;
    }
if(pwd.length < 6 || pwd.length > 16) {
    $("#pwd").html("Пароль не может быть меньше 6 и больше 16 символов<br/>");
    return false;
    }
if(pwd !== pwdre) {
    $("#pwd").html("Пароли не совпадают<br/>");
    return false;
    }
if(bdate.length == 0) {
    $("#bdate").html("Введите дату рождения<br/>");
    }
if(phone.length == 0) {
    $("#phone").html("Введите корректный номер телефона<br/>");
    }
var phoneReg = /^\+?[0-9]{3}-?[0-9]{7}$/;
if (!phoneReg.test(phone)) {
    $("#phone").html("Введите корректный номер телефона (***-*******)<br/>");
    return false;
    }
else {
    return false;
}
    //return false;
    
}
    
//</script>