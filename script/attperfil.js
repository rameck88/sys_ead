$(function(){
    $("button#btnAtt").on("click", function(e){
        e.preventDefault();
        
        var campoNome = $("form#formularioAtt #nomeCadastro").val();
        var campoEmail = $("form#formularioAtt #emailCadastro").val();
        var campoSenha = $("form#formularioAtt #senhaCadastro").val();

        if(campoEmail.trim() == "" || campoSenha.trim() == "" || campoNome.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acoes/attPerfil.php",
                type: "POST",
                data: {
                    type: "att",
                    email: campoEmail,
                    senha: campoSenha,
                    nome: campoNome
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "perfil.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    $("button#btnAtt1").on("click", function(e){
        e.preventDefault();
       
        var campoCpf = $("form#formularioAtt1 #cpfAtt").val();
        var campoNasc = $("form#formularioAtt1 #nascDateAtt").val();
        var campoTel = $("form#formularioAtt1 #telAtt").val();
        var campoprof = $("form#formularioAtt1 #profissaoAtt").val();

        if(campoCpf.trim() == "" || campoNasc.trim() == "" || campoTel.trim() == "" || campoprof.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acoes/attPerfil.php",
                type: "POST",
                data: {
                    type: "att1",
                    cpf: campoCpf,
                    dNasc: campoNasc,
                    tel: campoTel,
                    profissao:campoprof
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "perfil.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });
    
    $("button#btnAtt2").on("click", function(e){
        e.preventDefault();

        var campoBairro = $("form#formularioAtt2 #bairroAtt").val();
        var campoCid = $("form#formularioAtt2 #cidAtt").val();
        var campoEnd = $("form#formularioAtt2 #endAtt").val();
        var campoEstado = $("form#formularioAtt2 #estadoAtt").val();
        var campoNum = $("form#formularioAtt2 #numAtt").val();
        var campoCep = $("form#formularioAtt2 #cepAtt").val();
        var campoComplem = $("form#formularioAtt2 #complemAtt").val();

        if(campoBairro.trim() == "" || campoCid.trim() == "" || campoEnd.trim() == "" || campoEstado.trim() == "" || campoNum.trim() == "" || campoCep.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acoes/attPerfil.php",
                type: "POST",
                data: {
                    type: "att2",
                    bairro: campoBairro,
                    cidade: campoCid,
                    endereco: campoEnd,
                    estado:campoEstado,
                    numero: campoNum,
                    cep: campoCep,
                    complemento: campoComplem
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "perfil.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });
});