<div v-if="showModal" type="text/x-template" id="modal-template">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">
  
            <div class="main-text modal-header">
              <slot name="header">
                Вы не вошли!
              </slot>
            </div>
  
            <div class="main-text modal-body">
              <slot name="body">
                <div class="modal-link" v-on:click="redirectToLogin()">Войти</div>
                <br>
                <div class="modal-link" v-on:click="redirectToRegister()">Зарегистрироваться</div>
              </slot>
            </div>
  
            <div class="modal-footer">
              <slot name="footer">
                <button class="acceptbutton" v-on:click="showModal=false">
                  OK
                </button>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </transition>
</div>