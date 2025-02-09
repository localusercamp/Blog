@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="reg-log-app">
        <form id="register_form" method="POST" class="regform">
            <conteiner class="register-container">
                <div class="input-block"> 
                    <label>Адрес электронной почты</label>
                    <input type="email" id="email" v-model="email">
                </div>

                <div class="input-block"> 
                    <label>Пароль</label>
                    <input type="password" id="password" v-model="password">
                </div>

                <transition name="fade">
                    <div class="errorholder" v-if="!noerror" style="text-align: center;">
                        <div style="color: red;">Неверный email или пароль</div>
                    </div>
                </transition>

                <transition name="fade">
                    <div class="errorholder" v-if="showEmailError" style="text-align: center;">
                        <div style="color: red;">Этот адрес электронной почты уже используется</div>
                    </div>
                </transition>

                <div v-on:click="validate" class="acceptbutton">Зарегистрироваться</div>
            </conteiner>
        </form>
    </div>
</div>

<script>
    const app = new Vue({
        el: '#register_form',
        data: {
            noerror: true,
            email: null,
            password: "",
            showEmailError: false
        },
        methods: {
            validate: function(e){
                this.noerror = true;
                if(
                    !this.email || 
                    !this.validateEmail(this.email) ||
                    this.password == null ||
                    this.password.length < 6 
                    
                ){ 
                    this.noerror = false;
                }
                else{ 
                    let config = {
                        headers:{
                            'email': this.email,
                            'password': this.password
                        }
                    }
                    var badEmail = false;
                    axios.post('/register', null, config).then((response)=>{
                        console.log(response);
                        if(response.data['answer'] == 'badEmail'){
                            this.showEmailError = true;
                            badEmail = true;
                        }
                        else{
                            this.showEmailError = false;
                            badEmail = false;
                        }
                        if(!badEmail){
                            axios.post('/login', null, config).then((response)=>{
                                window.location.href = '/home'
                            });
                        }
                    })
                    this.password = "";
                }
                
                e.preventDefault();
            },
            validateEmail: function(email){
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return regex.test(email);
            }
        },
    })
</script>

@stop