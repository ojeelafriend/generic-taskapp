class CurrentPage {
  static init() {
    localStorage.setItem("page", 1);
    return localStorage.getItem("page");
  }

  static setPage(numberPage) {
    localStorage.setItem("page", numberPage);
    return localStorage.getItem("page");
  }

  static getPage() {
    return localStorage.getItem("page");
  }

  static clearCurrentPage() {
    localStorage.removeItem("page");
  }
}
