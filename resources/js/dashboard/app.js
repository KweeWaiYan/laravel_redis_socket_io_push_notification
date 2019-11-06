/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./../bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('transfer-block', require('./components/TransferSent.vue'));
Vue.component('bell-refresh', require('./components/BellRefresh.vue'));


const app = new Vue({
    el: '#app',
    data: {
        userId: $('#user-id').val()
    },
    created() {
        window.Echo.private('user.' + this.userId)
            .notification((response) => {
                this.setUpModal('Trasfer received!');
                this.incUnreadNotifs();
                $("#layoutModalBody").html("You received a transfer!");
                $("#userAmount").html(response.receiver_amount);
            });
    },
    methods: {
        setUpModal(title) {
            $("#layoutModalTitle").empty();
            $("#layoutModalTitle").html(title);
            $("#layoutModalBody").empty();
            $("#layoutModal").modal("show");
        },
        incUnreadNotifs() {
            let unread = parseInt($("#unread_notifs").html());
            $("#unread_notifs").html(unread + 1);
        },
        transactionsClick() {
            $("#unread_notifs").html(0);
            $.ajax({
                url: "/ajax/dropdown-notifs",
                method: "GET"
            }).done(function(data){
                $("#dropd_transactions").find('a.transaction-item').remove();
                data.reverse().forEach(function(elm){
                    $("#dropd_transactions").prepend('<a class="dropdown-item transaction-item" href="/transactions">'+elm.emitter+' '+elm.amount+' '+elm.created_at+'</a>');
                });
            });
        }
    }
});


