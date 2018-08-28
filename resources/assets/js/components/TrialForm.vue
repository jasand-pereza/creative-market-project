<template>
    <div class="container">
        <form :action="formAction" method="POST">
            <div class="form-group">
                <label for="emailAddress" class="sr-only">Enter your address here</label>
                <input id="emailAddress" type="email" class="form-control" v-model="email" name="email" placeholder="Enter your Emaill Address">
            </div>
            <button type="submit" class="btn btn-secondary btn-lg" @click.prevent="submitTrialForm">Start your free trial </button>
            
            <slot></slot>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            formAction: {
                type: String,
                default: '/users/user-exists'
            }
        },
        data() {
            return {
                email: null,
            }
        },
        methods: {
            submitTrialForm(e) {
                axios.post(this.formAction, { email: this.email }).then((response) => {
                    this.formResponse(response.data);
                });
            },
            formResponse(responseData) {
                if(responseData.response_code == 2) {
                    alert('user exists');
                    return;
                }
                if(responseData.response_code == 3) {
                    alert('user does not exists');
                    return;
                }
                if(responseData.response_code == 4 || responseData.response_code == 1) {
                    alert('There was a problem with the email you specified. Please check to make sure you entered it correctly.');
                    return;
                }
            }
        }
    }
</script>
