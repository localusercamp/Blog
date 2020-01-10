@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="create-post-app">
        <form id="create_form" method="POST" class="regform">
            <conteiner class="login-container">

                <div class="input-block"> 
                    <label>Категория</label>
                    <select >
                        <option ref="category" v-for="item in categories" :value="item">@{{item}}</option>
                    </select>
                </div>
                
                <div class="input-block"> 
                    <label>Заголовок</label>
                    <input type="text" v-model="title">
                </div>

                <div class="textarea-block"> 
                    <label>Текст поста</label>
                </div>
                <div class="input-block"> 
                    <textarea class="textarea-post" v-model="text">

                    </textarea>
                </div>
        
                <transition name="fade">
                    <div class="errorholder" v-if="!noerror">
                        <div style="color: red;">Заполните все поля</div>
                    </div>
                </transition>
        
                <div v-on:click="validate" class="acceptbutton">Создать</div>
            </conteiner>
        </form>
    </div>
</div>

<script>
    const createPost = new Vue({
        el: '#create_form',
        data: {
            noerror: true,
            categories: [],
            choosenCategory: "",
            title: "",
            text: ""
        },
        methods: {
            loadCategories: function(){
                axios.post('/api/categories-list').then(function(response){
                    createPost.categories = response.data.categories;
                });
            },
            createPost: function(){
                this.$refs['category'].forEach(function(item){
                    if(item.selected){
                        createPost.choosenCategory = item.text;
                    }
                });
                let config = {
                    headers: {
                        'category': choosenCategory,
                        'title': createPost.title,
                        'text': createPost.text
                    }
                };
                axios.post('/post/store', null, config);
            },
            validate: function(){
                // if(this.categoryName.length > 0){
                //     let config = {
                //         headers:{
                //             'name': this.categoryName
                //         }
                //     }
                //     axios.post('/category/store', null, config);
                //     return true;
                // }
                // else{
                //     this.noerror = false;
                // }
            }
        },
        beforeMount(){
            this.loadCategories();
        }
    });
</script>

@stop