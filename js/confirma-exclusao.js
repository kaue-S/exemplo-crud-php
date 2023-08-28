// selecionando os links de excluir através da classe ".excluir"
const links = document.querySelectorAll( ".excluir" );

/* Percorrendo cada link selecionado anteriormente */
for(const link of links){
    // adicionando um evento de clique para o link excluir
    link.addEventListener("click", function(event){

        //anulando o comportamento padrão do link que é redirecionar para algum lugar
        event.preventDefault();

        // usando o confirm() para capturar a respota do usuario, que pode ser ok/sim (true) ou cancelar/não (false) 
        let resposta = confirm("Deseja realmente excluir este registro?");

        //se a resposta for true, então redirecionamos para o destino original de cada link, ou seja, para a página php de exclusão
        if(resposta){
            location.href =  this.href;
        }
    })
}