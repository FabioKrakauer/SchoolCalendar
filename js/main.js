function onChangeInput(){
    let element = document.getElementById("button-newFile");
    element.classList.remove("btn-outline-primary");
    element.classList.add("btn-success");

    let label = document.getElementById("label-File");
    label.value = "Arquivo Carregado com sucesso";
}