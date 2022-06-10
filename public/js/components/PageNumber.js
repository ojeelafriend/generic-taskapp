const pageState = {
  pages: [1],
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

    let pages = Math.ceil(rows / config.itemForPage);

    pageState.setPage(pages);

    return pageState.pages
      .map((number) => {
        return `
          <a id="current-page" href=?page=${number}>${number}</a>
        `;
      })
      .join("");
  }

  static async render() {
    //! lograr que esto se repita una sola vez
    let divPageSelector = document.querySelector(".page-selector");
    divPageSelector.innerHTML = await this.template();
  }
}
