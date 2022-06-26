(async () => {
  const profile = await getProfile();

  if (profile) {
    window.location.href =
      'http://localhost/generic-taskapp/public/taskapp.html';
  }
})();
