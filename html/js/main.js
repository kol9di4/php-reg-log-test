$(function(){

    function addError(input,text){
        input.addClass('is-invalid');
        input.after('<div class="h6 text-danger">'+text+'</div>');
    }

    function removeError(input){
        input.removeClass('is-invalid');
        $(input.siblings('div.h6')).remove();
    }

    $('.log').on('submit',function(e){
        // e.preventDefault();
        // var login = $('.reg input[name="login"]');
        // var password = $('.reg input[name="password"]');
        // if(login.val()=="")
        //     login.addClass('is-invalid');
        // else
        //     login.removeClass('is-invalid');
        // if(password.val()=="")
        //     password.addClass('is-invalid');
        // else
        //     password.removeClass('is-invalid');
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

        if (login.val().length<4){
            addError(login,'Логин меньше 4 символов');
            ok = false;
        }

        if (name.val().length<2){
            addError(name,'Имя меньше 2 символов');
            ok = false;
        }

        if(!ok)
            return false;
        const data = {
            login: logn.val(),
            password: password.val(),
            email: email.val(),
            name: name.val()
        };
        // $.ajax({
        //     url: "core/ajax-helper/register.php", 
        //     type: "post",
        //     data: data,
        //     success: function (response) {
        //         if(response){
        //             $('#regModal').modal('hide');
        //             log(data);
        //         }
        //         else
        //         {
        //             $('.reg button[type=submit] ~ div.h6').remove();
        //             $('.reg button[type=submit]').after('<div class="h6 text-danger">Пользователь с таким именем уже существует!</div>');
        //         }
        //     },
        //     error: function (error) {
        //         console.error("Ошибка при отправке данных: ", error);
        //     },
        // });

        
    });
    // END Register form validation

})