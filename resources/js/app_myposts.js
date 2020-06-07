const app_myposts = {

    url : "/RepoPaging/app/app.php",

    mp : $("#my-posts"), //document.querySelector("#my-posts");

    getMyPosts : function(uid){
        var html = "";
        this.mp.html("");//this.mp.innerHTML = "";

        fetch(this.url + "?mp&id=" + uid)
            .then( response => response.json())
            .then( mpresp => {
                for(let post of mpresp){
                    html += `
                        <tr>
                            <td>${ post.titulo }</td>
                            <td>${ post.fecha}</td>
                            <td>
                                <button type="button" onclick="" class="btn btn-link btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" onclick="" class="btn btn-link btn-sm text-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;
                }
                this.mp.html(html);
            }).catch( err => console.log( err ));

    }

};