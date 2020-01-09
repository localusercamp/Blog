@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="reg-log-app">
        <form id="create_form" method="POST" class="regform">
            <conteiner class="login-container">
                <div class="input-block"> 
                    <label>Название роли</label>
                    <input type="text" v-model="roleName">
                </div>
        
                <transition name="fade">
                    <div class="errorholder" v-if="!noerror">
                        <div style="color: red;">Введите имя</div>
                    </div>
                </transition>
        
                <div v-on:click="validate" class="acceptbutton">Создать</div>
            </conteiner>
        </form>
    </div>
</div>

<script>
    const createRole = new Vue({
        el: '#create_form',
        data: {
            noerror: true,
            roleName: ""
        },
        methods: {
            validate: function(){
                if(this.roleName.length > 0){
                    let config = {
                        headers:{
                            'name': this.roleName
                        }
                    }
                    axios.post('/role/store', null, config);
                    return true;
                }
                else{
                    this.noerror = false;
                }
            }
        }
    });
</script>

@stop