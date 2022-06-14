document.addEventListener("submit", async (evt) => {
  if (!evt.target.matches("#current-page")) return false;

  console.log("hihi");

  document.getElementById(TaskComponent.checkPage() + 1).click();
});

async function submitSendTask() {
  await Notifier.send(new FormData(document.getElementById("todo-form")));
  await TaskComponent.render();
  await PageNumber.render();
  document.getElementById(TaskComponent.checkPage() + 1);
}

async function submitRemoveTask(id) {
  await Notifier.remove(id);
  await TaskComponent.render();
  await PageNumber.render();
}
