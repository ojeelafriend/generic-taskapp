const taskState = {
  todoList: [],
  setTodoList: (item) => {
    taskState.todoList.push(item);
  },
};

const taskIdState = {
  taskId: [1],
  increment: () => {
    let { taskId } = taskIdState;
    taskIdState.taskId.push(taskId[taskId.length - 1] + 1);
  },
};

const template = () => {
  if (taskState.todoList.length < 1) {
    return `<p> No tasks found </p>`;
  }

  let todos = taskState.todoList
    .map(({ id, title, text, tag }) => {
      return `
            <li id="${id}">
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
};

const render = () => {
  console.log(taskState.todoList[0]);
  console.log(taskState.todoList.length);

  let list = document.querySelector("#todo-list");
  list.innerHTML = template();
};

document.addEventListener("submit", async (e) => {
  if (!e.target.matches("#todo-form")) return false;
  e.preventDefault();

  await Notifier.send(new FormData(document.getElementById("todo-form")));

  /*
  const inputTitle = document.getElementById("title").value;
  const inputText = document.getElementById("text").value;
  const inputTag = document.getElementById("tag").value;

  const { taskId, increment } = taskIdState;

  let wrapper = {
    id: taskId[taskId.length - 1],
    title: inputTitle,
    text: inputText,
    tag: inputTag,
  };
  increment();

  taskState.setTodoList(wrapper);
  render();*/
});
