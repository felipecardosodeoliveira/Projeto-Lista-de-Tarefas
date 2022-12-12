function editar(id, tarefa) {

    let form = document.createElement('form');
    form.action = 'tarefa_controller.php?acao=editar';
    form.method = 'post';
    form.classList = 'd-flex';

    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'tarefa';
    input.className = 'form-control'

    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.className = 'form-control';
    inputId.value = id;

    let button1 = document.createElement('button');
    button1.type = 'submit';
    button1.className = 'btn btn-info ml-1 btn-sm';
    button1.innerHTML = 'Atualizar';

    let button2 = document.createElement('button');
    button2.type = 'button';
    button2.className = 'btn btn-danger ml-1 btn-sm';
    button2.innerHTML = 'Cancelar';

    form.appendChild(input);
    form.appendChild(inputId);

    form.appendChild(button1);
    form.appendChild(button2);

    let tarefaContainer = document.getElementById('tarefa_' + id);
    let conteudoTarefa = tarefaContainer.innerHTML;
    tarefaContainer.innerHTML = '';

    input.value = tarefa;
    tarefaContainer.appendChild(form);

    button2.addEventListener('click', function() {
        tarefaContainer.innerHTML = '';
        tarefaContainer.innerHTML = conteudoTarefa.trim();
    });

}

function remover (id) {
    let form = document.createElement('form');
    form.action = 'tarefa_controller.php?acao=excluir';
    form.method = 'post';

    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;

    form.appendChild(inputId);
    document.body.appendChild(form);

    if (confirm('Deseja excluir essa tarefa?')) {
        form.submit();
    }

}


function concluir (id) {
    let form = document.createElement('form');
    form.action = 'tarefa_controller.php?acao=concluir';
    form.method = 'post';

    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;

    form.appendChild(inputId);
    document.body.appendChild(form);
    form.submit();

}
