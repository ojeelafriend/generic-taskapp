const pageState = {
  pages: [],
  setPage: function (count) {
    this.pages = [];
    for (let i = 1; i <= count; i++) {
      this.pages.push(i);
    }
  },
};

class PageNumber {
  static async template() {
    let rows = await Notifier.checkRows();

    console.log('1) cuantas filas existen: ' + rows);

    let pages = Math.ceil(rows / config.itemForPage);

    pageState.setPage(pages);

    console.log(pageState.pages.length);

    //cuando detecte el this.component que solo existe la página uno
    //hará render del taskcomponent para no perder los datos.
    if (pageState.pages == 1) {
      TaskComponent.render(1);
      return '';
    }

    return pageState.pages
      .map((number) => {
        return `
          <button class="pagination" onclick="submitPage(${number})">${number}</button>
        `;
      })
      .join('');
  }

  static async render() {
    let divPageSelector = document.querySelector('.page-selector');
    divPageSelector.innerHTML = await this.template();
  }
}
