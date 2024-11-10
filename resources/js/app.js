import './bootstrap';

let channel = Echo.private(`App.Models.User.${userId}`);
channel.notification( function(data) {
    alert(data.body);
    console.log(data);
});
