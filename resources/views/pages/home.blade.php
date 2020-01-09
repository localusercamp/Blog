@extends('layouts.default')
@section('content')

<div id="category-holder" class="category-holder">
    <div v-for="item in categories" class="category-button"> @{{ item }} </div>
</div>


<script>
    const categoryApp = new Vue({
        el: "#category-holder",
        data: {
            categories: []
        },
        methods:{
            loadCategories: function(){
                axios.post('/api/categories-list').then(function(response){
                    console.log(response);
                    categoryApp.categories = response.data.categories;
                });
            }
        },
        beforeMount(){
            this.loadCategories();
        }
    });
</script>
@stop