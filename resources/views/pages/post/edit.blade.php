@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="create-post-app">
        <form id="create_form" method="POST" class="regform">
            <conteiner class="login-container">

                <div class="input-block"> 
                    <label>Категория</label>
                    <select v-model="selected">
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
                        @{{text}}
                    </textarea>
                </div>
        
                <transition name="fade">
                    <div class="errorholder" v-if="!noerror">
                        <div style="color: red;">Заполните все поля</div>
                    </div>
                </transition>
        
                <div v-on:click="validate" class="acceptbutton">Сохранить</div>
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
            text: "",
            selected: null
        },
        methods: {
            loadCategories: function(){
                axios.post('/api/categories-list').then((response)=>{
                    createPost.categories = response.data.categories;
                });
            },
            savePost: function(){
                this.$refs['category'].forEach(function(item){
                    if(item.selected){
                        this.choosenCategory = item.text;
                    }
                });
                let currentURL = window.location.href.split('/');
                let config = {
                    headers: {
                        'category': choosenCategory,
                        'title': createPost.title,
                        'text': createPost.text,
                        "postId": currentURL[currentURL.length-1]
                    }
                };
                axios.post('/post/update', null, config);
            },
            validate: function(){
                if(createPost.title.length > 0 && createPost.text.length > 0){
                    this.savePost();
                    return true;
                }
                else{
                    this.noerror = false;
                }
            },
            preloadValues: function(){
                let currentURL = window.location.href.split('/');
                let config = {
                    headers: {
                        "postId": currentURL[currentURL.length-1]
                    }
                }
                axios.post('/api/get-post', null, config).then((response)=>{
                    this.text =  response.data.post.text;
                    this.title = response.data.post.title;
                    this.selected = response.data.post.category.name;
                });
            }
        },
        beforeMount(){
            this.loadCategories();
            this.preloadValues();
        }
    });
</script>

@stop