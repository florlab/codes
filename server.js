var app = require('express')();
var server =  require('http').Server(app);
var io = require('socket.io')(server);

server.listen(3000);
io.on('connection', function (socket) {
    console.log('A user connected');

    //Whenever someone disconnects this piece of code executed
    socket.on('disconnect', function () {
        console.log('A user disconnected');
    });

    socket.on("message", function(data) {
        io.emit('message', data);
        console.log(data);
    });
});