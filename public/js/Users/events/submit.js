addEventListener('submit', (evt) => {
  evt.preventDefault();
});

async function signup() {
  let wrapper = new FormData(document.getElementById('signup'));

  if (wrapper.get('password') !== wrapper.get('passwordConfirm'))
    return alert('The password is not the same');

  await Notifier.send(wrapper);
}

async function signin() {
  let wrapper = new FormData(document.getElementById('signin'));

  if (!(await Notifier.login(wrapper)))
    return alert('Email or password incorrect');

  window.location.reload();
}
