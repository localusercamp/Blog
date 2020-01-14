@extends('layouts.default')
@section('content')

<div class="text-center">
    <div id="category-holder" class="category-holder">
        <div v-for="item in categories" v-on:click="call(item)" class="category-button"> @{{ item }} </div>
    </div>
</div>

<div class="text-center">
    <div id="posts-container" class="posts-holder">
        <div v-for="(item, index) in posts" :id="item.id">
            <div class="post-container">
                <p :class="{'post-title-lg' : item.title.length > 17, 'post-title' : item.title.length <= 17}" class="border-block"> @{{item.title}} </p>
                <p class="post-user-email border-block"> @{{item.user.email}} </p>
                <div :id="'like'+item.id" :class="{'red-like' : item.liked}" class="like-container border-block" v-on:click="toggleLike($event, index)">
                    <i class="like-icon fas fa-heart"></i>
                    <div class="like-number"> @{{item.users_count}} </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const categoryApp = new Vue({
    el: "#category-holder",
    data: {
        categories: [],
        choosen: "",
        posts: []
    },
    methods:{
        loadCategories: function(){
            axios.post('/api/categories-list').then(function(response){
                categoryApp.categories = response.data.categories;
            });
        },
        call: function(category){
            let config = {
                headers: {
                    'category': category
                }
            };
            axios.post('/api/posts-by-filter-category', null, config).then(function(response){
                postsLoadApp.posts = response.data.posts;
            });
        }
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
        posts: []
    },
    methods: {
        loadPosts: function(){
            let config = {
                headers: {
                    "filter": this.filter
                }
            }
            axios.post("/api/posts-by-filter", null, config).then(function(response){
                console.log(response);
                postsLoadApp.posts = response.data.posts;
            });
        },
        popup: function(id){
            
        },
        toggleLike: function(event, index){
            let postId = event.currentTarget.id.split('like')[1];
            let clickedElement = document.getElementById("like" + postId);

            let config = {
                headers: {
                    'postId': postId
                }
            }

            axios.post('/like', null, config).then(function(response){
                switch(response.data.answer){
                    case 'wasLiked':
                        clickedElement.classList.toggle('red-like');
                        postsLoadApp.posts[index].users_count -= 1;
                        break;
                    case 'wasntLiked':
                        clickedElement.classList.toggle('red-like');
                        postsLoadApp.posts[index].users_count += 1;
                        break;
                    case 'noLogin':
                    
                        break;
                }
            });
            // if($(event.target).css('color', 'red') == 'red'){
            //     $(event.currentTarget).css('color','blue');
            //     $event.target.classList.push('default-like')
            //     alert("here");
            // }
            // else{
            //     $(event.currentTarget).css('color','red');
                
            // }
            
        }
    },
    beforeMount() {
        this.loadPosts();
    }
});

</script>
@stop