<template>
    <div class="container">
        <form :action="formAction" method="POST">
            <slot></slot>
            <label for="emailAddress">Sign up for a free trial</label>
            <input id="emailAddress" type="email" v-model="email" name="email" placeholder="Enter you address here">
            <button type="submit" @click.prevent="submitTrialForm">Submit</button>
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
