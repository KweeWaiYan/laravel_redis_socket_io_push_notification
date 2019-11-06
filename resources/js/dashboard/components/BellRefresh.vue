<template></template>

<script>
export default {
    data() {
        return {};
    },
    created() { // called after the component is created
        $(window).on('load', function() {
            $("#unread_notifs").html('0');
        });
    }
};
</script>
