@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="create-post-app">
        <conteiner id="show_form" class="login-container regform">
            <div>
                <div class="user-block"> 
                    <label>@{{ role }} @{{ user.email }}</label>
                </div>

                <div class="date-block"> 
                    <label>ВБлоге с @{{ user.created_at }} </label>
                </div>

                <div class="textarea-block"> 
                    <label>Всего постов: @{{ user.owned_posts_count }}</label>
                </div>

                <div class="textarea-block"> 
                    <label>Всего лайков: @{{ user.users_count }}</label>
                </div>

                <div class="textarea-block"> 
                    <label>Всего комментариев: @{{ user.commentaries_count }}</label>
                </div>    

                <div class="textarea-block"> 
                    <span v-if="!user.self">
                        <label v-if="!user.owned_posts.length > 0">У пользователя пока нет постов</label>
                        <label v-else>Посты</label>
                    </span>
                    <span v-else>
                        <label v-if="!user.owned_posts.length > 0">У вас пока нет постов</label>
                        <label v-else>Ваши посты</label>
                    </span>
                </div>

                <div class="bubble-posts-container">
                    <div v-for="post in user.owned_posts" v-on:click="showPost(post.id)" class="bubble-block">
                        @{{ post.title }}
                    </div>
                </div>

        </conteiner>
            
    </div>
</div>

<script>
    const showUser = new Vue({
        el: '#show_form',
        data: {
            user: null,
            role: null,
            showModal: false
        },
        methods: {
            loadUser: function(){
                let currentURL = window.location.href.split('/');
                let config = {
                    headers: {
                        "userId": currentURL[currentURL.length-1]
                    }
                }
                axios.post('/api/get-user', null, config).then((response)=>{
                    this.user = response.data.user;
                    if(this.user.role.name == 'blogger')
                        this.role = 'Блоггер'
                    console.log(response);
                });
            },
            showPost: function(id){
                window.location.href = '/post/show/'+id;
            },
        },
        beforeMount() {
            this.loadUser();
        }
    });
</script>

@stop