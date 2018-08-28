<template>
    <div class="container">

        <pulse-loader :loading="progressIndicator" color="#f57077" size="1.5rem"></pulse-loader>

        <transition :duration="300" name="fade">
            <div v-if="!successUserExists && !failedErrorState && !progressIndicator">
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
        </transition>

        <transition :duration="1000" name="fade">
            <slot v-if="successUserExists" name="success-user-exists"></slot>
        </transition>

        <transition :duration="100" name="fade">>
            <div v-if="failedErrorState">
                <slot name="failed-error-state"></slot>
                <button @click.prevent="goBackToForm" class="btn btn-secondary btn-lg">Try it again.</button>
            </div>
        </transition>

    </div>
</template>

<script>
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
    
    export default {
        props: {
            formAction: {
                type: String,
                default: '/users/user-exists'
            }
        },
        components: {
            PulseLoader
        },
        data() {
            return {
                email: null,
                successUserExists: false,
                failedErrorState: false,
                progressIndicator: false,
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

                setTimeout(() => {
                    this.progressIndicator = true;
                }, 200);

                if(this.attempedEmails.find(e => e == this.email)) {
                    this.failedErrorState = true;
                    this.progressIndicator = false;
                    return;
                }
                axios.post(this.formAction, { email: this.email }).then((response) => {
                    
                    setTimeout(() => {
                        this.formResponse(response.data);
                    }, 1000);
                    
                });
            },
            formResponse(responseData) {
                if(responseData.response_code == 2) {
                    this.successUserExists = true;
                    this.progressIndicator = false;
                    return;
                }
                if(responseData.response_code == 3) {
                    window.location = 'https://pro.creativemarket.com/sign-up';
                }
                if(responseData.response_code == 4 || responseData.response_code == 1) {
                    this.attempedEmails.push(this.email);
                    this.fail();
                    this.progressIndicator = false;
                    return;
                }
            },
            goBackToForm() {
                this.progressIndicator = true;
                this.failedErrorState = false;
                setTimeout(() => {
                    this.progressIndicator = false;
                }, 300);
            },
            fail() {
                this.failedErrorState = true;
                this.email = null;
            }
        }
    }
</script>

<style>
.v-spinner {
    position: absolute;
    top: 47%;
    left: 37%;
}
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to  {
    opacity: 0;
}
</style>