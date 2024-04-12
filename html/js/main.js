$(function(){

    function addError(input,text){
        input.addClass('is-invalid');
        input.after('<div class="h6 text-danger">'+text+'</div>');
    }

    function removeError(input){
        input.removeClass('is-invalid');
        $(input.siblings('div.h6')).remove();
    }

    log = function(data)
    {
          $.ajax({
            url: "index.php?c=login", 
            type: "post",
            data: data,
            success: function (response) {
                response = JSON.parse(response);
                if (!(response === undefined || response.length == 0)){
                    $('.log button[type=submit]').after('<div class="h6 text-danger">'+response['message']+'</div>');
                }
            },
            error: function (error) {
                alert("Ошибка при отправке данных: ", error);
            },
        });        
    }

    $('.log').on('submit',function(e){
        e.preventDefault();
        $('.log button[type=submit] ~ div.h6').remove();
        const data = {
            login: $('.log input[name=login]').val(),
            password: $('.log input[name=password]').val()
          };
        log(data);
    })
    // Register form validation
    $('.reg').on('submit',function(e){
        e.preventDefault();
        var email = $('.reg input[name="email"]');
        var login = $('.reg input[name="login"]');
        var password = $('.reg input[name="password"]');
        var passwordConf = $('.reg input[name="password-confirm"]');
        var name = $('.reg input[name="name"]');
        var ok = true;

        // validation
        $('.reg div.h6').html('');

        $.each($('.reg input'),function(){
            $(this).removeClass('is-invalid');
            removeError($(this));
            if($(this).val()=="")
                $(this).addClass('is-invalid');                
        });

        if(email.val()=="" || login.val()=="" || password.val()=="" || passwordConf.val()=="" || name.val()==""){
            $('.reg div.h6').html('Заполните все поля');
            return false;
        }

        if (password.val().length<7){
            addError(password,'Пароль меньше 7 символов');
            ok = false;
        }

        if (password.val()!=passwordConf.val()){
            addError(password,'Пароли не совпадают');
            addError(passwordConf,'Пароли не совпадают');
            ok = false;
        }

        if (login.val().length<6){
            addError(login,'Логин меньше 6 символов');
            ok = false;
        }

        if (name.val().length<2){
            addError(name,'Имя меньше 2 символов');
            ok = false;
        }
        
        if (name.val().length>10){
            addError(name,'Имя больше 10 символов');
            ok = false;
        }

        if(!ok)
            return false;

        const data = {
            login: login.val(),
            password: password.val(),
            email: email.val(),
            name: name.val()
        };

        $.ajax({
            // url: "ajax-helper/register.php", 
            url: "index.php?c=register", 
            type: "post",
            data: data,
            success: function (response) {
                response = JSON.parse(response);
                for (key in response){
                    switch(key){
                        case 'login': addError(login,response[key]);break;
                        case 'password': addError(password,response[key]);break;
                        case 'name': addError(name,response[key]);break;
                        case 'email': addError(email,response[key]);break;
                    }
                }
            },
            error: function (error) {
                alert("Ошибка при отправке данных: ", error);
            },
        });        
    });
    // END Register form validation

})