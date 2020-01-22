@extends('layouts.default')
@section('content')

<div id="main" class="row reg-log-container">
    <div class="create-post-app">
        <conteiner id="show_form" class="login-container regform">
            <div>
                <div class="user-block"> 
                    <label>@{{ user.role }} @{{ user.email }}</label>
                </div>

                <div class="date-block"> 
                    <label>ВБлоге с @{{ user.created_at }} </label>
                </div>

                <div class="textarea-block"> 
                    <label>Всего постов: @{{ user.posts_count }}</label>
                </div>

                <div class="textarea-block"> 
                    <label>Всего лайков: @{{ user.users_count }}</label>
                </div>

                <div class="textarea-block"> 
                    <label>Всего комментариев: @{{ user.commentaries_count }}</label>
                </div>    

                <div class="textarea-block"> 
                    <span v-if="!user.self">
                        <label v-if="!posts">У пользователя пока нет записей</label>
                        <label v-else>Посты</label>
                    </span>
                    <span v-else>
                        <label v-if="!posts">У вас пока нет записей</label>
                        <label v-else>Ваши посты</label>
                    </span>
                </div>

                <div class="bubble-posts-container">
                    <div v-for="post in user.posts" class="bubble-block">
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
            user: null
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
                    console.log(response);
                });
            },
            // showUser: function(id){
            //     window.location.href = '/user/show/'+id;
            // },
            // redirectToLogin:  function(){
            //     window.location.href = '/login';
            // },
            // redirectToRegister:  function(){
            //     window.location.href = '/register';
            // },
        },
        beforeMount() {
            this.loadUser();
        }
    });
</script>

@stop