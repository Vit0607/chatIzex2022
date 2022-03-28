$(document).ready(function () {
    //ВСТАВКА ДАННЫХ ФОРМЫ В БД:
    $('button.send').on('click', function () {
        // let loginValue = $('input.login').val();
        // let messageValue = $('textarea.message').val();
        let form_data = $('#main_form').serializeArray();

        $.ajax({
            method: 'POST',
            url: "/insert.php",
            dataType: 'json',
            // data: {
            //     login: loginValue,
            //     message: messageValue
            // }
            data: form_data
        }).done(function (msg) {
            alert("Data Saved: " + msg);
            // alert(loginValue);
            // alert(messageValue);
        });

        $('input.login').val('');
        $('textarea.message').val('');
    })


    function getNewMessage() {
        let last_id = $('#list .note').eq(-1).data('id') || 0;
               console.log('last_id = ' + last_id);
        $.ajax({
            method: "POST",
            url: "new.php",
            dataType: 'JSON',
            data: {
                last_id: last_id
            }
        })
            .done(function (response_from_server) {

                //                    console.log(data);
                let blocks = '';
                $(response_from_server).each(function (index, msg) {

                    blocks += `<div class="note" data-id="` + msg.id + `">
                                    <p>
                                    <span class="date">` + msg['date'] + `</span>
                                    <span class="name">` + msg['login'] + `</span>
                                    </p>
                                    <p>
                                    ` + msg['message'] + `
                                    </p>
                                    <a href="?del=` + msg['id'] + `" class="delete"></a>
                                    </div>`;
                })
                $("#list").append(blocks);
                if (blocks != '') {
                    scroll();
                }
            });
    }

    setInterval(getNewMessage, 1000);


    $('body').on('click', '.delete', function (e) {
        e.preventDefault();
        var id = $(this).parents('.note').data('id');
        //        alert(id);
        $.ajax({
            method: "POST",
            url: "del.php",
            dataType: 'JSON',
            data: {
                id: id
            }
        })
            .done(function (data) {

                //                    console.log(data);

                $('.note[data-id="' + id + '"]').remove();
            }).fail(function (e, e1) {
            alert(e1);
        })
    })


    //    var container = $('#list').html();
    //    container[0].scrollTop = container[0].scrollHeight;


    $('button.send').on('click', function () {
        scroll();
    });

    function scroll() {
        $('#list').animate({
            scrollTop: 100000
        }, 1000);
    }

});