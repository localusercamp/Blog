@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="create-post-app">
        <conteiner id="show_form" class="login-container regform">
            <div v-if="post = {{ $post }}">
                <div class="input-block"> 
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
                        <div class="like-number"> @{{ likes }} </div>
                    </div>
                </div>
            </div>

        <div class="row main-text" style="padding:0 20px 0 20px">
            <div class="input-block"> 
                <textarea readonly class="textarea-comment"></textarea>
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
            likes: 0
        },
        methods: {
            toggleLike: function(event){
                showPost.likes = showPost.post.users_count;
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
                            showPost.likes -= 1;
                            break;
                        case 'wasntLiked':
                            clickedElement.classList.toggle('red-like');
                            showPost.likes += 1;
                            break;
                    }
                });
            },
            loadCommentaries: function(){

            },
        }
    });
</script>

@stop