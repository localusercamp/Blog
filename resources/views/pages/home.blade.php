@extends('layouts.default')
@section('content')

<div class="text-center">
    <div id="category-holder" class="category-holder">
        <div v-for="item in categories" v-on:click="call(item)" class="category-button"> @{{ item }} </div>
    </div>
</div>

<div class="text-center">
    <div id="posts-container" class="posts-holder">
        <div v-for="item in posts" :id="item.id">
            <div class="post-container">
                <p class="post-title border-block"> @{{item.title}} </p>
                <p class="post-user-email border-block"> @{{item.user.email}} </p>
                <div class="like-container border-block">
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
                axios.post('/api/posts-of-category', null, config).then(function(response){
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
            axios.post("/api/all-posts-by-filter", null, config).then(function(response){
                console.log(response);
                postsLoadApp.posts = response.data.posts;
            });
        }
    },
    beforeMount() {
        this.loadPosts();
    }
});

</script>
@stop