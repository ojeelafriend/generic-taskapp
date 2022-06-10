/*Notifier tomará la responsabilidad de realizar acciones entre la Network
del web service y el resto
*/

class Notifier {
  static async send(params = new FormData()) {
    let request = await fetch(
      "http://localhost/generic-taskapp/webservice/Network/task/send.php",
      {
        method: "POST",
        body: params,
      }
    );

    let body = await request.json();
    console.log(body);
  }
}
