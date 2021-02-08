function login(event){
    event.preventDefault();
    let email = document.getElementById('email');
    let password = document.getElementById('pass');

    $.ajax({
        url: 'http://localhost/API_Server/home/auth',
        method: "POST",
        data: {
            email: email.value,
            password: password.value
        },
        success: (params)=>{
            if(params.data.indexOf('Exception:')){
                localStorage.setItem("token_jwt", params.data);
                window.location.href = "logado.html";
            }else{
                params = params.data.substring(11);
                start = params.indexOf('in ');
                params = params.substring(start, -1);
                let div = document.createElement('div');
                div.setAttribute("class", "status");
                let text = document.createTextNode(params);
                div.appendChild(text);
                document.body.appendChild(div);
            }
        },
        error: (params)=>{
            console.warn('Deu errado');
            console.log(params);
        }
    });
};

function getUsers(){
    $.ajax({
        url: "http://localhost/API_Server/user/get",
        method: "GET",
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token_jwt')}`
        },
        success: (params) => {
            if(Array.isArray(params.data)){
                document.write('<a href="logout.html">Sair</a><br>');
                for(let i = 0; i < params.data.length; i++){
                    document.write(params.data[i].name + " - " + params.data[i].email + "<br>");
                }
            }else{
                params = params.data.substring(11);
                start = params.indexOf('in ');
                params = params.substring(start, -1);
                let div = document.createElement('div');
                div.setAttribute("class", "status");
                let text = document.createTextNode(params);
                div.appendChild(text);
                document.body.appendChild(div);
            }
        },
        error: (params) => {
            console.log(params);
        }
    });
}