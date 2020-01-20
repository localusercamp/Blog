<style>
    .errorholder {
        text-align: center;
        font-size: 15px;
        margin-bottom: 20px;
    }
    .login-container, .register-container {
        display: block;
        padding: 20px 20px 20px 20px;
        border: solid 1px rgb(190, 190, 190);
        border-radius: 7px;
        background-color: #d9d9d9;
    }
    .input-block {
        margin-bottom: 20px;
        font-size: 15px;
    }
    .login-container input, .register-container input {
        width: 100%;
    }
    .regform {
        box-sizing: border-box;
        margin: 0;
    }
    .create-post-app { 
        min-width: 500px;
        max-width: 500px;
        max-height: 400px;
        margin: auto;
    }
    .textarea-post {
        width: 100%;
        min-height: 200px;
    }
    .textarea-block {
        font-size: 15px;
    }
    .reg-log-app { 
        min-width: 280px;
        max-width: 280px;
        max-height: 220px;
        margin: auto;
    }
    .reg-log-container {
        height: 100%;
    }
    .acceptbutton {
        display: flex;
        justify-content: center;
        align-items: center;
        cursor:pointer;
        border: 0;
        outline: none;
        border-radius: 5px;
        font-family: Roboto;
        font-weight: bold;
        font-size: 15px;
        color: whitesmoke;
        height: 30px;
        width: 100%; 
        background: rgb(5,166,18);
        background: linear-gradient(0deg, rgba(5,166,18,1) 0%, rgba(0,255,8,1) 100%);
    }
    .fade-enter-active{ 
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
 
/*---FOOTER---*/

    .footer {
        bottom: 0;
        position: absolute;
        height: 100px;
        width: 100%;
    }
    .footer .footer-content {
        vertical-align: middle;
    }

/*------------*/

/*---LAYOUT---*/

    html, body {
        margin: 0;
        height: 100%;
    }
    .layout-body {
        background-color: #edeef0;
    }
    .btstrp-col {
        height: 100%;
    }
    
/*------------*/

/*---HEADER---*/
    
    .navbar {
        background-color: black;
        border-radius: 0px;
        padding: 0 25% 0 25%;
    }
    .header-link {
        font-family: Roboto;
        font-size: 15px;
        font-weight: bold;
        user-select: none;
        cursor: pointer;
    }
    .header-link:hover {
        background-color:darkgray;
    }
    .header-title {
        cursor: pointer;
        font-family: Roboto;
        font-size: 25px;
        font-weight: bold;
        user-select: none;
    }

/*------------*/

/*---ADMIN---*/

.sidebar {
    background-color: #343a40;
}
.sidebar-item {
    font-family: Roboto;
    font-weight: bold;
    font-size: 30px;
    color: white;
    cursor: pointer;
    align-self: center;
    align-items: center;
}
.sidebar div:hover {
    background-color: #454e54;
}
.no-mg {
    margin:0;
}

/*-----------*/

/*---HOME---*/

.category-holder {
    display: inline-block;
    padding: 10px 20px 10px 0px;
    border: solid 1px #dedede;
    border-radius: 7px;
    margin-top: 10%;
    background-color: #fff;
}
.category-button {
    padding: 3px 10px 0 10px;
    display: inline-block;
    justify-content: center;
    align-items: center;
    cursor:pointer;
    border: none;
    outline: none;
    border-radius: 5px;
    font-family: Roboto;
    font-weight: bold;
    font-size: 15px;
    color: rgb(52, 58, 64);
    height: 30px;
    width: auto; 
    background-color: #fff;
    margin-left: 20px;
}
.category-button:hover {
    background-color: #e0e0e0;
}
.posts-holder {
    margin-top: 1.5%;
}
.like-container {
    display: inline-block;
    user-select: none;
}
.like-icon {
    display: inline-block;
    font-size: 15px;
    user-select: none;
}
.like-number {
    display: inline-block;
    font-size: 15px;
    user-select: none;
}
.post-user-email {
    display: inline-block;
    font-family: Roboto;
    font-size: 15px;
    margin: 0 10px 0 0;
}
.post-title {
    display: inline-block;
    margin: 0 10px 0 0;
    font-family: Roboto;
    font-weight: bold;
    font-size: 15px;
    user-select: none;
}
.post-title-lg {
    margin: 0 0 10px 0;
    font-family: Roboto;
    font-weight: bold;
    font-size: 15px;
    user-select: none;
}
.border-block {
    border: solid 1px #dedede;
    border-radius: 15px;
    padding: 2px 10px 2px 10px;
    color: #343a40;
    cursor: pointer;
}
.border-block:hover {
    background-color: #e0e0e0;
}
.post-container {
    border: solid 1px #dedede;
    border-radius: 15px;
    margin-bottom: 10px;
    padding: 10px 15px 10px 15px;;
    display: inline-block;
    background-color: #fff;
}
.red-like {
    color: red;
}
.popup-span {
    width: 150px;
    height: 50px;
    background-color: black;
    margin: 0 0 20px 30px;
    padding: 0 0 0 10px;
    position: absolute;
}
.pop {
    background-color: red;
    height: 3px;
    width: 4px;
}
.disabled {
    background-color: #cccccc;
    color: #666666;
    pointer-events: none;
}

/*----------*/

/*---SHOW---*/

.inline {
    display: inline-block;
}
.main-text {
    font-family: Roboto;
    font-weight: bold;
    font-size: 15px;
}
.textarea-comment {
    width: 100%;
    min-height: 50px;
}

/*----------*/

/*---MODAL---*/
.modal-link {
    cursor: pointer;
    display: inline-block;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}
.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}
.modal-body {
  margin: 20px 0;
}
.modal-default-button {
  float: right;
}
.modal-enter {
  opacity: 0;
}
.modal-leave-active {
  opacity: 0;
}
.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

/*-----------*/
</style>