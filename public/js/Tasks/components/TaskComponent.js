const taskState = {
  todoList: [],
  setTodoList: function (items = [{ id_task, title, text, tag }]) {
    this.todoList = [];

    if (!items) return;

    items.map((item) => {
      this.todoList.push(item);
    });
  },
};

class TaskComponent {
  static async template(numberPage) {
    let initial = (numberPage - 1) * config.itemForPage;

    const tasks = await Notifier.list(initial, config.itemForPage);

    if (CurrentPage.getPage() == 1 && !tasks)
      return "<h3>Tasks dont exists</h3>";

    taskState.setTodoList(tasks);

    let todos = taskState.todoList
      .map(({ id_task, title, text, tag }) => {
        return `
              <li id="${id_task}">
                  <article>
                      <h4>${title}</h4>
                      <p>${text}</p>
                      <a href="#">${tag}</a>
                      <br/>
                      <a class="delete-icon" onclick="submitRemoveTask(${id_task})">
                        <i class="fa-regular fa-rectangle-xmark"></i>
                      </a>
                  </article>
              </li>
        `;
      })
      .join("");

    return todos;
  }

  static async render(numberPage) {
    let list = document.querySelector("#todo-list");
    list.innerHTML = await this.template(numberPage);
  }
}
