/*Notifier tomará la responsabilidad de realizar acciones entre la Network
del web service y el resto
*/

class Notifier {
  static async send(params = new FormData()) {
    let response = await fetch(
      'http://localhost/generic-taskapp/webservice/Network/task/send.php',
      {
        method: 'POST',
        body: params,
      }
    );

    let body = await response.json();

    //debug
  }

  static async list(initial, items) {
    let response = await fetch(
      `http://localhost/generic-taskapp/webservice/Network/task/list.php?initial=${initial}&items=${items}`
    );

    let body = await response.json();

    console.log(body);

    return body;
  }

  static async search(search) {
    let response = await fetch(
      `http://localhost/generic-taskapp/webservice/Network/task/search.php?search=${search}`
    );

    let body = await response.json();

    return body;
  }

  static async checkRows() {
    let response = await fetch(
      'http://localhost/generic-taskapp/webservice/Network/task/rows.php'
    );

    let body = await response.json();

    return body;
  }

  //no deberia ser post ni get, sino delete pero hay que chequearlo con la api.
  static async remove(id) {
    let data = new FormData();
    data.set('taskId', id);

    let response = await fetch(
      'http://localhost/generic-taskapp/webservice/Network/task/remove.php',
      {
        method: 'POST',
        body: data,
      }
    );
    let body = await response.json();
  }
}
