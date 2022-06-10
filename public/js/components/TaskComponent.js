const taskState = {
  todoList: [],
  setTodoList: function (items = [{ id_task, title, text, tag }]) {
    this.todoList = [];

    items.map((item) => {
      this.todoList.push(item);
    });
  },
};

class TaskComponent {
  static async template() {
    let initial = (this.checkPage() - 1) * config.itemForPage;

    //code smells
    if (initial === 0) {
      initial = 1;
    }

    const tasks = await Notifier.list(initial, config.itemForPage);

    taskState.setTodoList(tasks);

    let todos = taskState.todoList
      .map(({ id_task, title, text, tag }) => {
        return `
              <li id="${id_task}">
                  <article>
                      <h4>${title}</h4>
                      <p>${text}</p>
                      <a href="#">${tag}</a>
                  </article>
              </li>
        `;
      })
      .join("");

    return todos;
  }

  static async render() {
    let list = document.querySelector("#todo-list");
    list.innerHTML = await this.template();
  }

  static checkPage() {
    return /\d/.exec(window.location.href)[0];
  }
}
