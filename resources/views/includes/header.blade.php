<header id="navigationbar">

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    
    <a class="navbar-brand mr-auto header-title" v-on:click="goHome">ВБлоге</a>
    
    <a v-if="islogged" class="navbar-brand header-link" v-on:click="showUser"> @{{ user_email }} </a>
    <a v-if="islogged" class="navbar-brand header-link" v-on:click="logout">Выйти</a>
    <a v-else class="navbar-brand header-link" v-on:click="login">Войти</a>

    <!-- Links -->
    {{-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 3</a>
      </li>
    </ul> --}}
  </nav>
  
</header>

<script>
  const navbarVue = new Vue({
      el: '#navigationbar',
      data: {
        islogged: false,
        user_email: null
      },
      methods: {
        checkIsLogged: function(){
          axios.post('/check-if-logged').then(function(response){ // проверка залогинен ли пользователь
              console.log(response);
              if(response.data.IsLogged == true){
                navbarVue.islogged = true;
                navbarVue.user_email = response.data.email;
              }
          });
        },
        logout: function(){
          axios.post('/logout').then(window.location.href = '/login');
        },
        login: function(){
          window.location.href = '/login';
        },
        showUser: function(){
          //get на страничку юзера
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


