<template>
    <div class="container">

        <div v-if="!successUserExists && !failedErrorState">
            <slot name="before"></slot>

            <form :action="formAction" method="POST">
                <div class="form-group">
                    <label for="emailAddress" class="sr-only">Enter your address here</label>
                    <input id="emailAddress" type="email" :class="(isEmailValid) ? 'form-control valid-email' : 'form-control'" v-model="email" name="email" placeholder="Enter your Emaill Address">
                </div>
                <button :disabled="!isEmailValid" type="submit" class="btn btn-secondary btn-lg" @click.prevent="submitTrialForm">Start your free trial</button>
                
            </form>

            <slot name="after"></slot>
        </div>

        <slot v-if="successUserExists" name="success-user-exists"></slot>

        <div v-if="failedErrorState">
            <slot name="failed-error-state"></slot>
            <button @click.prevent="failedErrorState=false" class="btn btn-secondary btn-lg">Try it again.</button>
        </div>

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
                successUserExists: false,
                failedErrorState: false,
                attempedEmails: []
            }
        },
        computed: {
            isEmailValid() {
                let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(this.email);
            }
        },
        methods: {
            submitTrialForm(e) {
                if(this.attempedEmails.find(e => e == this.email)) {
                    this.failedErrorState = true;
                    return;
                }
                axios.post(this.formAction, { email: this.email }).then((response) => {
                    this.formResponse(response.data);
                });
            },
            formResponse(responseData) {
                if(responseData.response_code == 2) {
                    this.successUserExists = true;
                    return;
                }
                if(responseData.response_code == 3) {
                    window.location = 'https://pro.creativemarket.com/sign-up';
                }
                if(responseData.response_code == 4 || responseData.response_code == 1) {
                    this.attempedEmails.push(this.email);
                    this.fail();
                    return;
                }
            },
            fail() {
                this.failedErrorState = true;
                this.email = null;
            }
        }
    }
</script>
