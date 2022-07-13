const taskState = {
  todoList: [],
  setTodoList: function (items = [{ id_task, title, text, tag }]) {
    this.todoList = [];
    if (!items || items == 0) return;

    items.map((item) => {
      this.todoList.push(item);
    });
  },
};

class TaskComponent {
  static async template(numberPage, search = false) {
    let initial = (numberPage - 1) * config.itemForPage;
    let tasks;

    //valida si notifier debe usarse como un alldata o un search específico.
    if (!search) {
      tasks = await Notifier.list(initial, config.itemForPage);
    } else {
      tasks = await Notifier.search(search);
    }

    if (CurrentPage.getPage() == 1 && !tasks)
      return '<h3>There are no tasks yet</h3>';

    taskState.setTodoList(tasks);

    let todos = taskState.todoList
      .map(({ id_task, title, text, tag }) => {
        return `
            <div class="box media-box-item">
              <div class="media" id="${id_task}">
                  <div class="media-content"> 
                      <div class="content">
                        <p>
                          <strong>${title}</strong> <small>@${tag}</small>
                          <br/>
                          ${text} 
                        </p>
                      </div>
                      <a class="delete-icon" onclick="submitRemoveTask(${id_task})">
                        <i class="fa-regular fa-rectangle-xmark"></i>
                      </a>
                  </div>
              </div>
            </div>
        `;
      })
      .join('');

    return todos;
  }

  static async render(numberPage, search) {
    let list = document.querySelector('#todo-list');
    list.innerHTML = await this.template(numberPage, search);
  }
}
