const app = {
    routes : {
        'login' : '/RepoPaging/resources/views/auth/login.php',
        'logi' : '/RepoPaging/app/app.php',
        'logout' : '/RepoPaging/app/app.php?logout',
        'profile' : '/RepoPaging/resources/views/profile.php',
    },

    view : function(route){
        location.replace(this.routes[route]);
    }
}