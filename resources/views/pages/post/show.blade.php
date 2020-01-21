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

                <div class="row main-text" style="padding:0 20px 0 20px">
                    <div class="inline" style="margin-right:auto">@{{ post.user.email }}</div>
                    <div id="like" :class="{'red-like' : post.liked}" class="like-container border-block" v-on:click="toggleLike($event)">
                        <i class="like-icon fas fa-heart"></i>
                        <div class="like-number"> @{{ post.users_count }} </div>
                    </div>
                </div>
            </div>

        <div class="row main-text" style="padding:20px 20px 0 20px">
            <div v-for="commentary in post.commentaries" class="commentary"> 
                <div class="user-link"> 
                    @{{commentary.user.email}} 
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

        <div v-if="!isCreatingCommentary" v-on:click="isCreatingCommentary = true" class="text-center">
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
            commentary: ""
        },
        methods: {
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

                    axios.post('/', null, config).then(function(response){
                        this.loadPost();
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

                axios.post('/like', null, config).then(function(response){
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
        },
        beforeMount() {
            this.loadPost();
        }
    });
</script>

@stop