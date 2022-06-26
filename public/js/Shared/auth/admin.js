(async () => {
  const profile = await getProfile();

  if (!profile || profile.rank !== 1) {
    window.location.href = 'http://localhost/generic-taskapp/public/login.html';
  }

  const { username } = profile;

  alert(`Welcome ${username}`);
})();
