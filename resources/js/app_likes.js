const app_likes = {

    url : "/RepoPaging/app/app.php",

    likePost : function(pid) {
        console.log(pid);
        fetch(this.url + "?like&pid=36&uid=15")
            .then( response => response.json() )
            .then( likeresp => {
                console.log(likeresp.r);
            }).catch( err => console.log( err ));
    }
}