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

    if (CurrentPage.getPage() == 1 && rows < config.itemForPage + 2) return "";

    let pages = Math.ceil(rows / config.itemForPage);

    pageState.setPage(pages);

    return pageState.pages
      .map((number) => {
        return `
          <button onclick="submitPage(${number})">${number}</button>
        `;
      })
      .join("");
  }

  static async render() {
    let divPageSelector = document.querySelector(".page-selector");
    divPageSelector.innerHTML = await this.template();
  }
}
