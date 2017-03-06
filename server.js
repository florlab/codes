var app = require('express')();
var server =  require('http').Server(app);
var io = require('socket.io')(server);

server.listen(5858);
var user_list={};

io.on('connection', function (socket) {
    console.log(socket.id);
    socket.on('disconnect', function (){
        console.log('user ' + user_list[socket.id] + ' disconnected');
        delete user_list[socket.id];
        io.emit('load user channel',{
            user_list : user_list
        });
    });

    socket.on("user channel", function(data){
        socket.join(data.username)

        user_list[socket.id] = data.username;
        //user_list.push(data.username);

        io.emit('load user channel',{
            user_list : user_list
        });

    });

    socket.on("update messages", function(data) {
        if(data.friend==''){
            io.emit('load messages',{
                message : data.message
            });
        }
        socket.broadcast.to(data.friend).emit('load messages',{
            message : data.message
        });
        console.log('messages' + data.message);
    });
});