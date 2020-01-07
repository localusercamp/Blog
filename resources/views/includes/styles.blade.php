<style>
    html, body {
        margin: 0;
        height: 100%;
    }
    .login-container, .register-container {
        display: block;
        margin: 0px 20px 20px 20px;
    }
    .input-block {
        margin-top: 20px;
    }
    .login-container input, .register-container input {
        width: 100%;
    }
    .regform {
        box-sizing: border-box;
        margin: 0;
    }
    .regapp { 
        border: solid 1px rgb(190, 190, 190);
        border-radius: 7px;
        padding: 10;
        min-width: 280px;
        max-width: 280px;
        margin: 0 auto 0 auto;
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
        color: whitesmoke;
        height: 30px;
        width: 100%; 
        margin-top: 20px;
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

    .layout-borders{
        background-color: #EEAA7B;
        height: 100%;
    }
    
/*------------*/

</style>