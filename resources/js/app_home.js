const app_home = {

    url : "/RepoPaging/app/app.php",

    pp : $("#previous-posts"),
    gl : $("#libro"),

    previousPosts : function() {
        var html = "";
        this.pp.html(""); //innerhtml pero de JQuery
        fetch(this.url + "?pp")
            .then( response => response.json())
            .then( ppresp => {
                for( let post of ppresp){
                    if (post.stars == 4){
                        html += `
                                <div class="card">
                                    <div class="card-header">
                                        <div class="justify-content-between border-bottom">
                                            
                                            <div class="container">
                                                <i id="cinco" class="material-icons-outlined float-right">grade</i>
                                                <i id="cuatro" class="material-icons float-right">grade</i>
                                                <i id="tres" class="material-icons float-right">grade</i>
                                                <i id="dos" class="material-icons float-right">grade</i>
                                                <i id="uno" class="material-icons float-right">grade</i>
                                            </div>

                                            <h4 class="card-title">${ post.titulo}</h4>
                                            <small class="" ><i class="fas fa-user"></i> <b>${ post.user_Alias }</b></small>
                                            <small class="float-right"><i class="fa fa-calendar"></i> ${ post.fecha }</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>${ post.review }</p>
                                        <button class="btn btn-primary btn-round">Comentar</button>
                                        <button class="btn btn-primary btn-fab btn-round float-right" >
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                `;
                    } else if (post.stars == 3) {
                        html += `
                                <div class="card">
                                    <div class="card-header">
                                        <div class="justify-content-between border-bottom">
                                            
                                            <div class="container">
                                                <i id="cinco" class="material-icons-outlined float-right">grade</i>
                                                <i id="cuatro" class="material-icons-outlined float-right">grade</i>
                                                <i id="tres" class="material-icons float-right">grade</i>
                                                <i id="dos" class="material-icons float-right">grade</i>
                                                <i id="uno" class="material-icons float-right">grade</i>
                                            </div>

                                            <h4 class="card-title">${ post.titulo}</h4>
                                            <small class="" ><i class="fas fa-user"></i> <b>${ post.user_Alias }</b></small>
                                            <small class="float-right"><i class="fa fa-calendar"></i> ${ post.fecha }</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>${ post.review }</p>
                                        <button class="btn btn-primary btn-round">Comentar</button>
                                        <button class="btn btn-primary btn-fab btn-round float-right" >
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                `;
                    } else if (post.stars == 2) {
                        html += `
                                <div class="card">
                                    <div class="card-header">
                                        <div class="justify-content-between border-bottom">
                                            
                                            <div class="container">
                                                <i id="cinco" class="material-icons-outlined float-right">grade</i>
                                                <i id="cuatro" class="material-icons-outlined float-right">grade</i>
                                                <i id="tres" class="material-icons-outlined float-right">grade</i>
                                                <i id="dos" class="material-icons float-right">grade</i>
                                                <i id="uno" class="material-icons float-right">grade</i>
                                            </div>

                                            <h4 class="card-title">${ post.titulo}</h4>
                                            <small class="" ><i class="fas fa-user"></i> <b>${ post.user_Alias }</b></small>
                                            <small class="float-right"><i class="fa fa-calendar"></i> ${ post.fecha }</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>${ post.review }</p>
                                        <button class="btn btn-primary btn-round">Comentar</button>
                                        <button class="btn btn-primary btn-fab btn-round float-right" >
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                `;
                    } else if (post.stars == 1) {
                        html += `
                                <div class="card">
                                    <div class="card-header">
                                        <div class="justify-content-between border-bottom">
                                            
                                            <div class="container">
                                                <i id="cinco" class="material-icons-outlined float-right">grade</i>
                                                <i id="cuatro" class="material-icons-outlined float-right">grade</i>
                                                <i id="tres" class="material-icons-outlined float-right">grade</i>
                                                <i id="dos" class="material-icons-outlined float-right">grade</i>
                                                <i id="uno" class="material-icons float-right">grade</i>
                                            </div>

                                            <h4 class="card-title">${ post.titulo}</h4>
                                            <small class="" ><i class="fas fa-user"></i> <b>${ post.user_Alias }</b></small>
                                            <small class="float-right"><i class="fa fa-calendar"></i> ${ post.fecha }</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>${ post.review }</p>
                                        <button class="btn btn-primary btn-round">Comentar</button>
                                        <button class="btn btn-primary btn-fab btn-round float-right" >
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                `;
                    } else {
                        html += `
                                <div class="card">
                                    <div class="card-header">
                                        <div class="justify-content-between border-bottom">
                                            
                                            <div class="container">
                                                <i id="cinco" class="material-icons float-right">grade</i>
                                                <i id="cuatro" class="material-icons float-right">grade</i>
                                                <i id="tres" class="material-icons float-right">grade</i>
                                                <i id="dos" class="material-icons float-right">grade</i>
                                                <i id="uno" class="material-icons float-right">grade</i>
                                            </div>

                                            <h4 class="card-title">${ post.titulo}</h4>
                                            <small class="" ><i class="fas fa-user"></i> <b>${ post.user_Alias }</b></small>
                                            <small class="float-right"><i class="fa fa-calendar"></i> ${ post.fecha }</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>${ post.review }</p>
                                        <button class="btn btn-primary btn-round">Comentar</button>
                                        <button class="btn btn-primary btn-fab btn-round float-right" >
                                            <i class="material-icons">favorite</i>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                `;
                    }
                    
                    
                }
                this.pp.html(html);
            }).catch( err => console.log( err ));
    },

    getLibros : function() {
        var html = "";
        this.gl.html("");
        fetch(this.url + "?gl")
            .then( response => response.json() )
            .then( glresp => {
                for(let libro of glresp){
                    html += `
                        <option value="" selected disabled hidden>Selecciona un libro</option>
                        <option value="${ libro.ISBN }">${ libro.titulo }</option>
                    `;
                }
                this.gl.html(html);
            }).catch( err => console.log( err ));
    }
}