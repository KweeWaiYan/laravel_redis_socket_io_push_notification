<template>
<div>
    <div class="form-row">
        <div class="col-md-6">
            <label for="transfer-username">Username</label>
            <input type="text" v-model="receiver" name="username" placeholder="Username" class="form-control" autofocus id="transfer-username">
        </div>
        <div class="col-md-6">
            <label for="transfer-amount">Amount:</label>
            <input type="number" v-model="amount" class="form-control" name="amount" step="0.01" min="0.01" placeholder="0.01" id="transfer-amount">
        </div>
    </div>
    <hr />
    <div id="errors" class="form-group d-none">
        <div class="alert alert-danger">
            <ul id="errorList">
            </ul>
        </div>
    </div>
    <div class="alert alert-success d-none" id="success">
    </div>
    <button type="button" class="btn btn-primary" @click="sendTransfer">
        <strong>Send!</strong>
    </button>
</div>
</div>
</template>

<script>
export default {
    data() {
        return {
            amount: '',
            receiver: ''
        };
    },
    created() { // called after the component is created
    },
    methods: {
        sendTransfer() {
            axios.post(`/ajax/process-transfer`, {
                username: this.receiver,
                amount: this.amount
            }).catch(error => {
                return error.response;
            }).then(this.setResponse);
        },
        setResponse(response) {
            $("#errors").addClass('d-none');
            $("#success").addClass('d-none');
            if (response.status != 200 && response.data.errors) {
                this.setErrors(response.data.errors);
            } else {
                $("#success").empty();
                $("#userAmount").html(response.data.emitter_amount.toString());
                $("#success").append("The transfer was successful").removeClass('d-none');
            }
        },
        setErrors(errors) {
            $("#errors").removeClass('d-none');
            $("#errorList").empty();
            $.each(errors, function(key, val) {
                $("#errorList").append("<li>" + val + "</li>");
            });
        }
    }
};
</script>
