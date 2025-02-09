@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="reg-log-app">
        <form id="login_form" method="POST" class="regform">
            <conteiner class="login-container">
                <div class="input-block"> 
                    <label>Адрес электронной почты</label>
                    <input type="email" id="email" v-model="email">
                </div>
        
                <div class="input-block"> 
                    <label>Пароль</label>
                    <input type="password" id="password" v-model="password">
                </div>
        
                <transition name="fade">
                    <div class="errorholder" v-if="!noerror">
                        <div style="color: red;">Неверный email или пароль</div>
                    </div>
                </transition>
        
                <div v-on:click="validate" class="acceptbutton">Войти</div>
            </conteiner>
        </form>
    </div>
</div>

<script>
    const app = new Vue({
        el: '#login_form',
        data: {
            noerror: true,
            email: null,
            password: ""
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
                else{ // если валидация прошла успешно
                    let config = {
                        headers:{
                            'email': this.email,
                            'password': this.password
                        }
                    };
                    axios.post('/login', null, config).then((response)=>{
                        if(response.data.IsLogged == true)
                            window.location.href = '/home';
                        else
                            app.noerror = false;
                    });
                    this.password = "";
                }
                
                e.preventDefault();
            },
            validateEmail: function(email){
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return regex.test(email);
            }
        }
    });
</script>

@stop