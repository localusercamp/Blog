@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="create-post-app">
        <conteiner id="show_form" class="login-container regform">

            @include('includes.modal.logreg')

            <div>
                <div class="input-block" v-on:click="alert()"> 
                    <label>Заголовок: @{{ post.title }} </label>
                </div>

                <div class="textarea-block"> 
                    <label>Текст поста:</label>
                </div>

                <div class="input-block"> 
                    <textarea readonly class="textarea-post">@{{ post.text }}</textarea>
                </div>

                <div v-if="currentUser.id == post.user.id" v-on:click="deletePost()" class="controlButton">
                    Удалить
                </div>

                <div v-if="currentUser.id == post.user.id" v-on:click="editPost()" class="controlButton">
                    Изменить
                </div>

                <div class="row main-text" style="padding:0 20px 0 20px">
                    <div v-on:click="showUser(post.user.id)" class="inline" style="margin-right:auto">@{{ post.user.email }}</div>
                    <div id="like" :class="{'red-like' : post.liked}" class="like-container border-block" v-on:click="toggleLike($event)">
                        <i class="like-icon fas fa-heart"></i>
                        <div class="like-number"> @{{ post.users_count }} </div>
                    </div>
                </div>
            </div>

            <div class="row main-text" style="padding:20px 20px 0 20px">
                <div v-for="commentary in post.commentaries" class="commentary"> 
                    <div class="row extra-pad">
                        <div v-on:click="showUser(commentary.user.id)" class="user-link"> 
                            @{{commentary.user.email}} 
                        </div>
                        <div class="date"> 
                            @{{commentary.created_at}} 
                        </div>
                    </div>
                    <hr>
                    <div> 
                        @{{commentary.text}} 
                    </div>
                </div>
            </div>

            <div v-if="isCreatingCommentary" class="input-block"> 
                <textarea v-model="commentary" class="textarea-commentary"></textarea>
            </div>

            <div v-if="!isCreatingCommentary" v-on:click="startCreatingCommentary()" class="text-center">
                <div class="addbutton">
                    + Комментировать
                </div>
            </div>

            <div v-if="isCreatingCommentary" v-on:click="createCommentary()" class="text-center">
                <div class="addbutton">
                    Готово
                </div>
            </div>

        </conteiner>
            
    </div>
</div>

<script>
    const showPost = new Vue({
        el: '#show_form',
        data: {
            post: null,
            showModal: false,
            isCreatingCommentary: false,
            commentary: "",
            currentUser: null
        },
        methods: {
            deletePost: function(){
                let config = {
                    headers: {
                        "postId": this.post.id,
                    }
                }
                axios.post('/post/destroy', null, config).then(()=>{
                    window.location.replace(document.referrer);
                });
            },
            editPost: function(){
                window.location.href = '/post/edit/'+this.post.id;
            },
            getUser: function(){
                axios.post('/api/get-current-user').then((response)=>{
                    this.currentUser = response.data.user;
                });
            },
            loadPost: function(){
                let currentURL = window.location.href.split('/');
                let config = {
                    headers: {
                        "postId": currentURL[currentURL.length-1]
                    }
                }
                axios.post('/api/get-post', null, config).then((response)=>{
                    this.post = response.data.post;
                    console.log(response);
                });
            },
            createCommentary: function(){
                if(this.commentary.length > 0){
                    this.isCreatingCommentary = false;

                    let config = {
                        headers: {
                            'postId': this.post.id,
                            'text': this.commentary
                        }
                    }

                    this.commentary = '';

                    axios.post('/commentary/store', null, config).then(function(response){
                        showPost.loadPost();
                    });
                }
            },
            toggleLike: function(event){
                let postId = event.currentTarget.id.split('like')[1];
                let clickedElement = document.getElementById("like" + postId);

                let config = {
                    headers: {
                        'postId': this.post.id
                    }
                }

                axios.post('/api/like', null, config).then(function(response){
                    switch(response.data.answer){
                        case 'wasLiked':
                            clickedElement.classList.toggle('red-like');
                            showPost.post.users_count -= 1;
                            break;
                        case 'wasntLiked':
                            clickedElement.classList.toggle('red-like');
                            showPost.post.users_count += 1;
                            break;
                        case 'noLogin':
                            showPost.showModal = true;
                            break;
                    }
                });
            },
            showUser: function(id){
                window.location.href = '/user/show/'+id;
            },
            redirectToLogin:  function(){
                window.location.href = '/login';
            },
            redirectToRegister:  function(){
                window.location.href = '/register';
            },
            startCreatingCommentary: function(){
                axios.post('/check-if-logged').then((response) => { // проверка залогинен ли пользователь
                    if(response.data.IsLogged == true){
                        this.isCreatingCommentary = true;
                    }
                    else{
                        this.showModal = true;
                    }
                });
            }
        },
        beforeMount() {
            this.loadPost();
            this.getUser();
        },
    });
</script>

@stop