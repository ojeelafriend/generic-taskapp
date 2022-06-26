async function getProfile() {
  let profile = await fetch(
    'http://localhost/generic-taskapp/webservice/Network/session.php'
  );
  return await profile.json();
}

async function removeProfile() {
  await fetch('http://localhost/generic-taskapp/webservice/Network/logout.php');
}
