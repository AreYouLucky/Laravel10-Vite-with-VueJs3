<template>
    <div class="wrapper">
        <div class="container">
            <h3>Login Account</h3>
            <form @submit.prevent="submit">
                <label for="email"> Email: </label> 
                    <input type="text" name="email" v-model="credentials.email" class="email" id="email" autocomplete="email" /> <br>
                <label for="password"> Password: </label> 
                    <input id="password" v-model="credentials.password"  :type="showPassword ? 'text':'password'" /> <br>
                <input type="checkbox" v-model="showPassword" @input="togglePassword" id="showPassword"/>
                <span> Show Password</span> <br>
                <button type="submit"> Login</button>
            </form>
            <a href="/register">
                Don't have an account?
            </a>
        </div>

    </div>
    
</template>

<script>
    export default{
        data(){
            return {
                showPassword: false,
                credentials: {},
            };
        },
        methods: {
            togglePassword(){
                console.log('Password toggled');
                this.showPassword = !this.showPassword;
            },

            submit() {
                axios.post('/login', this.credentials)
                    .then(res => {
                        if(res.data.role === 'ADMIN'){
                            window.location = '/admin-dashboard';
                        }
                        else if(res.data.role === 'BUYER'){
                            window.location = '/buyer-dashboard';
                        }
                        else if(res.data.role === 'SELLER'){
                            window.location = '/seller-dashboard';
                        }
                    })
                    .catch(error => {
                        console.log('Error:', error);
                    // You might want to display an error message to the user
                    });
                }


        },
    }
</script>

<style scoped>
    .wrapper{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        width: 200vh;
    }
    .container{
        background-color: aliceblue;
        padding: 30px 20px 30px 20px;
        display: flex;
        flex-direction: column;
        border: 1px solid black;
    }
    input{
        margin: 10px 5px 10px 5px;
        border: 2px solid black;
    }
    .email{
        width: 190px;
    }
    form{
        margin: 0px 10px 20px 10px;
    }
    a{
        text-align: center;
        margin: 10px;
    }
    button{
        background-color: brown;
        color: white;
        padding: 5px 20px 5px 20px;
        margin: 10px 0px 0px 0px;
    }
</style>