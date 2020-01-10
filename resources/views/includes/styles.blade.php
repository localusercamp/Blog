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
    color: #a7a7a8;
    height: 30px;
    width: auto; 
    background-color: #fff;
    margin-left: 20px;
}
.category-button:hover {
    background-color: #e0e0e0;
}

/*----------*/


</style>