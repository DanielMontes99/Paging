const app = {
    routes : {
        'inicio' : '/RepoPaging/resources/views/home.php',
        'login' : '/RepoPaging/resources/views/auth/login.php',
        'logi' : '/RepoPaging/app/app.php',
        'logout' : '/RepoPaging/app/app.php?logout',
        'profile' : '/RepoPaging/resources/views/profile.php',
        'post' : '/RepoPaging/app/app.php',
        'like' : '/RepoPaging/app/app.php?like',
    },

    view : function(route){
        location.replace(this.routes[route]);
    }
}