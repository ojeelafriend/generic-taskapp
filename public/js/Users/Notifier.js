class Notifier {
  static async send(data = new FormData()) {
    let response = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/user/send.php",
      { method: "POST", body: data }
    );

    return await response.json();
  }

  static async login(data = new FormData()) {
    let response = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/user/login.php",
      { method: "POST", body: data }
    );

    return await response.json();
  }
}
