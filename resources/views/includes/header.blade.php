<header id="navigationbar">

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    
    <a class="navbar-brand mr-auto header-title" v-on:click="goHome">ВБлоге</a>
    
    <a v-if="islogged" class="navbar-brand header-link" v-on:click="showUser(user_id)"> @{{ user_email }} </a>
    <a v-if="isAdmin" class="navbar-brand header-link text-center" v-on:click="createRole">Роль<br>+</a>
    <a v-if="isAdmin" class="navbar-brand header-link text-center" v-on:click="createCategory">Категория<br>+</a>
    <a v-if="islogged" class="navbar-brand header-link text-center" v-on:click="createPost">Пост<br>+</a>
    <a v-if="islogged" class="navbar-brand header-link" v-on:click="logout">Выйти</a>
    <a v-else class="navbar-brand header-link" v-on:click="register">Зарегистрироваться</a>
    <a v-if="!islogged" class="navbar-brand header-link" v-on:click="login">Войти</a>
    
  </nav>
  
</header>

<script>
  const navbarVue = new Vue({
      el: '#navigationbar',
      data: {
        islogged: false,
        user_email: null,
        user_id: null,
        isAdmin: false
      },
      methods: {
        checkIsLogged: function(){
          axios.post('/check-if-logged').then(function(response){
              console.log(response);
              if(response.data.IsLogged == true){
                navbarVue.islogged = true;
                navbarVue.user_email = response.data.email;
                navbarVue.user_id = response.data.id;
                if(response.data.role == 'admin') 
                  navbarVue.isAdmin = true;
              }
          });
        },
        createPost: function(){
          window.location.href = '/post/create';
        },
        createRole: function(){
          window.location.href = '/role/create';
        },
        createCategory: function(){
          window.location.href = '/category/create';
        },
        logout: function(){
          axios.post('/logout').then(window.location.href = '/login');
        },
        register: function(){
          window.location.href = '/register';
        },
        login: function(){
          window.location.href = '/login';
        },
        showUser: function(id){
          window.location.href = '/user/show/'+id;
        },
        goHome: function(){
          window.location.href = '/home';
        }
      },
      beforeMount() {
        this.checkIsLogged();
      }
  });
</script>


