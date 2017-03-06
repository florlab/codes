<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script>
<div class="chatbox">
    <div class="message_reply">load messages</div>
    <input type="text" id="username">
    <button id="btnJoin">JOIN CHATROOM</button>

    <!--<input type="text" id="friend">-->
    <select id="friend">
        <option></option>
    </select>

    <input type="text" id="message">
    <button id="btnSend">SEND</button>
</div>

<script>
    $(document).ready(function(){
        var socket = io.connect('127.0.0.1:5858');

        $('#btnJoin').click(function(){
            socket.emit('user channel',{
                'username' : $('#username').val()
            });

            socket.on('load user channel', function(data){
                console.log(data);
                $('#friend .users-item').remove();
                $.each(data.user_list, function(index,item){
                    $('#friend').append('<option class="users-item" value="' + item + '">'+ item +'</option>');
                });
            });
        });

        $('#btnSend').click(function(){
            socket.emit('update messages',{
                'username' : $('#username').val(),
                'friend' : $('#friend').val(),
                'message' : $('#message').val()
            });
        });

        socket.on('load messages', function(data){
            //console.log(data.message);
            $('.chatbox').append(
                '<div class="message_reply">'+
                    data.message
                    +'</div>'
            )
        });
    });
</script>