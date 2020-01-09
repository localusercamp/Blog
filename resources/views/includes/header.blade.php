<header id="navigationbar">

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    
    <a class="navbar-brand mr-auto">ВБлоге</a>
    
    <a class="navbar-brand"> @{{ user_email }} </a>
    <a v-if="islogged" class="navbar-brand" v-on:click="logout">Выйти</a>
    <a v-else class="navbar-brand">Войти</a>

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
              if(response.data.IsLogged == 'True'){
                navbarVue.islogged = true;
                navbarVue.user_email = response.data.email;
              }
          });
        },
        logout: function(){
          axios.post('/logout');
        }
      },
      beforeMount() {
        this.checkIsLogged();
      }
  });
</script>


