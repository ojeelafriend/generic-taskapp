/*Notifier tomará la responsabilidad de realizar acciones entre la Network
del web service y el resto
*/

class Notifier {
  static async send(params = new FormData()) {
    let response = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/task/send.php",
      {
        method: "POST",
        body: params,
      }
    );

    let body = await response.json();

    //debug
    console.log(body);
  }

  static async list(initial, items) {
    let data = new FormData();

    data.set("initial", initial);
    data.set("items", items);

    let response = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/task/list.php",
      { method: "POST", body: data }
    );

    let body = await response.json();

    return body;
  }

  static async checkRows() {
    let response = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/task/rows.php"
    );

    let body = await response.json();

    console.log("checkRows method notifier: " + body);
    return body;
  }

  static async remove(id) {
    let data = new FormData();
    data.set("taskId", id);

    let response = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/task/remove.php",
      {
        method: "POST",
        body: data,
      }
    );
    let body = await response.json();
    console.log(body);
  }
}
