document.addEventListener('submit', async (evt) => {
  evt.preventDefault();
});

async function findTask() {
  let data = new FormData(document.getElementById('search-form'));
  console.log(data.get('search'));
  await TaskComponent.render(CurrentPage.getPage(), data.get('search'));
}

async function submitSendTask() {
  await Notifier.send(new FormData(document.getElementById('todo-form')));
  await submitPage(1);
  await PageNumber.render();
}

async function submitPage(pageNumber) {
  await TaskComponent.render(CurrentPage.setPage(pageNumber));
}

async function submitRemoveTask(itemId) {
  await Notifier.remove(itemId);
  await submitPage(CurrentPage.getPage());
  await PageNumber.render();
}

async function logout() {
  await removeProfile();
  window.location.reload();
}
