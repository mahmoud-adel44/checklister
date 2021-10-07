window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
});

let onlineUsersLength = 0;
window.Echo.join(`online`)
    .here((users) => {
        onlineUsersLength = users.length;

        if (users.length > 1){
            $('#no-online-users').css('display', 'none');
        }


        let userId = $('meta[name=user-id]').attr('content');
        users.forEach(function (user) {

            if (user.id == userId) {
                return;
            }

            $('#online-users').append(`<li id="user-${user.id}" class="ml-3"><i class="fas fa-user text-success"></i> <span class="ml-3">${user.name}</span> </li>`)
        })
        console.log(users);
    })
    .joining((user) => {
        onlineUsersLength++;
        $('#no-online-users').css('display','none')
        $('#online-users').append(`<li id="user-${user.id}" class="ml-3"><i class="fas fa-user text-success"></i>  <span class="ml-3">${user.name} </span> </li> `)
    })
    .leaving((user) => {
        onlineUsersLength--;
        if (onlineUsersLength == 1){
            $('#no-online-users').css('display','block');
        }
        $('#user-' + user.id).remove()
    })
    .error((error) => {
        console.error(error);
    });

// $('#chat-text').keypress(function (e) {
//     if (e.which == 13) {
//         e.preventDefault();
//         let body = $(this).val();
//         let url = $(this).data('url');
//         let username = $('meta[name=user-name]').attr('content')
//         var msgList = document.getElementById("msg-list");
//         msgList.scrollTop = msgList.scrollHeight;
//         // console.log(url);
//         $(this).val('');
//         $('#chat').append(`
//         <div class="mt-4 w-50 text-white p-3 rounded bg-primary" >
//               <p>${ username }</p>
//               <p>${ body }</p>
//         </div>
//         `);
//         let data = {
//             '_token': $('meta[name=csrf-token]').attr('content'),
//             body: body
//         }
//         $.ajax({
//             url: url,
//             method: 'post',
//             data: data,
//         });
//         // console.log(data);
//     }
// });




const send = document.getElementById('send')
const inputData = document.getElementById('chat-text')
send.onclick = (e) => {
    e.preventDefault()
    //append message to chat
    let body = inputData.value;
    let url = inputData.getAttribute('data-url');
    let username = $('meta[name=user-name]').attr('content')
    inputData.value = '';

        $('#chat').append(`
        <div class="mt-4 w-50 text-white p-3 rounded bg-primary" >
              <p>${ username }</p>
              <p>${ body }</p>
        </div>
        `);
        //end of append message to chat
        let data = {
            '_token': $('meta[name=csrf-token]').attr('content'),
            body: body
        }
        $.ajax({
            url: url,
            method: 'post',
            data: data,
        });


}

window.Echo.channel(`chat-group`)
    .listen('MessageDelivered', (e) => {
        $('#chat').append(`
        <div class="mt-4 w-50 text-white p-3 rounded ml-auto bg-warning" >
              <p>${ e.message.user.name }</p>
              <p>${ e.message.body }</p>
        </div>
        `);

    });










//
// window.Echo.channel(`chat-group`)
//     .listen('MessageDelivered', (e) => {
//         $('#notifyMessage').append(`
//         <a href="#" class="dropdown-item">
//                     <!-- Message Start -->
//                     <div class="media">
//                         <div class="media-body">
//                             <h3 class="dropdown-item-title">
//                                 ${ e.message.user.name }
//                                 <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
//                             </h3>
//                             <p class="text-sm"><p>${ e.message.body }</p></p>
//                             <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> ${ new Date().getSeconds() } Seconds Ago</p>
//                         </div>
//                     </div>
//                     <!-- Message End -->
//                 </a>
//
//            <div class="dropdown-divider"></div>
//         `);
//
//     });
//
// //
// //
//
//
//
