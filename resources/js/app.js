import './bootstrap';

// import axios from 'axios';
//
// axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from 'alpinejs';

Alpine.start();

// import Echo from "laravel-echo"
// import io from 'socket.io-client';
//
// const options = {
//     broadcaster: 'socket.io',
//     client: io,
//     authEndpoint: import.meta.env.VITE_PUSHER_APP_URL + '/api/broadcasting',
//     host: import.meta.env.VITE_PUSHER_APP_URL + ':6001', // this is laravel-echo-server host
//     encrypted: true,
//     csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//     auth: {
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//             'API-TOKEN': document.querySelector('meta[name="api-token"]').getAttribute('content')
//         }
//     }
// };
//
// let echo = new Echo(options);
//
// let channel = echo.join(`game.party.id`);
//
// channel.joining((user) => {
//         console.log("Joining Presence Channel")
//         console.log(user.name);
//     })
//     .leaving((user) => {
//         console.log(user.name);
//     })
//     .error((error) => {
//         console.error(error);
//     });


// axios.get('/test_auth', {}).then(r => {
//     console.log(r);
// })

