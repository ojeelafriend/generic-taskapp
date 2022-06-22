class Session {
  static async getProfile() {
    let profile = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/session.php"
    );

    return await profile.json();
  }

  static async removeProfile() {
    await fetch(
      "http://localhost/generic-taskapp/webservice/Network/logout.php"
    );
  }
}
