document.addEventListener("submit", async (evt) => {
  if (!evt.target.matches("#todo-form")) return false;

  evt.preventDefault();

  await Notifier.send(new FormData(document.getElementById("todo-form")));
});

async function submitRemoveTask(id) {
  await Notifier.remove(id);
  await TaskComponent.render();
  await PageNumber.render();
}
