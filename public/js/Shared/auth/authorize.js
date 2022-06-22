(async () => {
  if (!(await Session.getProfile())) {
    window.location.href = "http://localhost/generic-taskapp/public/login.html";
  }
})();
