<template>
    <div class="container">
        <form action="/user-exists" method="POST">
            <slot></slot>
            <label for="emailAddress">Sign up for a free trial</label>
            <input id="emailAddress" type="email" v-model="email" name="email" placeholder="Enter you address here">
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
