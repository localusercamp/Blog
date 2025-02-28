@extends('layouts.default')
@section('content')

<div class="text-center">
    <div id="category-holder" class="category-holder">
        <div v-for="item in categories" v-on:click="call(item)" class="category-button"> @{{ item }} </div>
        <hr style="margin-left:20px">
        <div v-on:click="changeFilter($event)" class="category-button">By date</div>
        <div v-on:click="changeFilter($event)" class="category-button">By likes</div>
    </div>
</div>

<div class="text-center">
    <div id="posts-container" class="posts-holder">
        
        @include('includes.modal.logreg')
        
        <div v-for="(item, index) in showPosts" :id="item.id">
            <div class="post-container">
                <p :class="{'post-title-lg' : item.title.length > 17, 'post-title' : item.title.length <= 17}" v-on:click="showPost(item.id)" class="border-block"> @{{item.title}} </p>
                <p v-on:click="showUser(item.user.id)" class="post-user-email border-block"> @{{item.user.email}} </p>
                <div :id="'like'+item.id" :class="{'red-like' : item.liked || item.clicked}" class="like-container border-block" v-on:click="toggleLike($event, index)">
                    <i class="like-icon fas fa-heart"></i>
                    <div class="like-number"> @{{item.users_count}} </div>
                </div>
            </div>
        </div>
        <div>
            <div class="post-container">
                <p class="post-title border-block" id="prev-button" v-on:click="scrollPage($event)">Назад</p>
                <p class="post-title border-block" id="next-button" v-on:click="scrollPage($event)">Далее</p>
            </div>
        </div>
    </div>
</div>

<script>
const categoryApp = new Vue({
    el: "#category-holder",
    data: {
        categories: [],
        filtername: null,
        category: null
    },
    methods:{
        loadCategories: function(){
            axios.post('/api/categories-list').then(function(response){
                categoryApp.categories = response.data.categories;
            });
        },
        call: function(category){
            this.category = category;
            let config = {
                headers: {
                    'category': category,
                    'filter': postsLoadApp.filter
                }
            };
            axios.post('/api/posts-by-filter-category', null, config).then(function(response){
                postsLoadApp.posts = response.data.posts;
                postsLoadApp.paginationDefine();
            });
        },
        changeFilter: function(event){
            
            switch(event.target.innerText){
                case 'By likes':
                    postsLoadApp.filter = 'like';
                    break;
                default:
                    postsLoadApp.filter = 'date';
            }
            postsLoadApp.loadPosts();
        },
    },
    beforeMount(){
        this.loadCategories();
    }
});
</script>

<script>

const postsLoadApp = new Vue({
    el: "#posts-container",
    data: {
        filter: "date",
        posts: [],
        postsByPage: 6,
        postsPages: [],
        showPosts: [],
        pageIndex: 0,
        showModal: false,
        show: false
    },
    methods: {
        loadPosts: function(){
            let config = {
                headers: {
                    'filter': this.filter
                }
            }
            if(categoryApp.category){
                config.headers['category'] = categoryApp.category;
            }
            
            axios.post('/api/posts-by-filter-category', null, config).then((response)=>{
                postsLoadApp.posts = response.data.posts;
            }).then(()=>{
                this.paginationDefine();
            });
        },
        paginationDefine: function(){
            this.postsPages = [];
            this.showPosts = [];
            this.pageIndex = 0;
            let N = Object.keys(this.posts).length / this.postsByPage >> 0;
            let Y = Object.keys(this.posts).length % this.postsByPage;
            for(let i = 0; i < N; i++){ // заполнение массива страниц
                let array = [];
                for(let j = 0; j < this.postsByPage; j++){
                    array.push(this.posts[j+this.postsByPage*i]);
                }
                this.postsPages.push(array);
            }
            let array = [];
            for(let i = 0; i < Y; i++){ // заплатка
                array.push(this.posts[i+this.postsByPage*N]);
            }
            this.postsPages.push(array);

            this.updatePage();
            this.updatePaginatorButtons();
        },
        updatePage: function(){
            this.showPosts = this.postsPages[this.pageIndex];
        },
        updatePaginatorButtons: function(){
            if(this.pageIndex == this.postsPages.length -1)
                document.getElementById("next-button").classList.add("disabled");
            else
                document.getElementById("next-button").classList.remove("disabled");
            if(this.pageIndex == 0)
                document.getElementById("prev-button").classList.add("disabled");
            else
                document.getElementById("prev-button").classList.remove("disabled");
        },
        scrollPage: function(event){
            let target = event.currentTarget;
            if(target.id == "next-button"){
                this.pageIndex += 1;
                this.updatePage();
            }
            else if(target.id == "prev-button"){
                this.pageIndex -= 1;
                this.updatePage();
            }
            this.updatePaginatorButtons();
        },
        toggleLike: function(event, index){
            let postId = event.currentTarget.id.split('like')[1];
            let clickedElement = document.getElementById("like" + postId);

            let config = {
                headers: {
                    'postId': postId
                }
            }

            axios.post('/api/like', null, config).then(function(response){
                switch(response.data.answer){
                    case 'wasLiked':
                        postsLoadApp.posts[index].clicked = false;
                        postsLoadApp.posts[index].liked = false;
                        postsLoadApp.posts[index].users_count -= 1;
                        break;
                    case 'wasntLiked':
                        postsLoadApp.posts[index].clicked = true;
                        postsLoadApp.posts[index].users_count += 1;
                        break;
                    case 'noLogin':
                        postsLoadApp.showModal = true;
                        break;
                }
            });
        },
        showPost: function(id){
            window.location.href = '/post/show/'+id;
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
        this.loadPosts();
    }
});

</script>
@stop