@extends('layouts.default')
@section('content')

<div class="text-center">
    <div id="category-holder" class="category-holder">
        <div v-for="item in categories" v-on:click="call(item)" class="category-button"> @{{ item }} </div>
    </div>
</div>

<div>

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
                });
            }
        },
        beforeMount(){
            this.loadCategories();
        }
    });
</script>
@stop