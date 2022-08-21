import './bootstrap';

import Alpine from 'alpinejs';

Alpine.start();

import Echo from "laravel-echo"
import io from 'socket.io-client';

let echo = new Echo({
    broadcaster: 'socket.io',
    client: io,
    host: window.location.hostname + ':6001' // this is laravel-echo-server host
});

let channel = echo.channel('test');

channel.listen('.TestEvent', (e) => {
    alert("What");
    console.log(e);
});
