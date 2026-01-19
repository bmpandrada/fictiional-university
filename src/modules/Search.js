import $ from "jquery";

class Search {
  //1. describe and create/initiate our object
  constructor() {
    this.resultsDiv = $("#search-overlay__results");
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.searhField = $("#search-term");
    this.searchOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.typingTimer;
    this.previousValue;

    this.events();
  }

  //2. events that will be happening
  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searhField.on("keyup", this.typingLogic.bind(this));
  }

  //3. methods (functions, actions...) that we need
  typingLogic() {
    if (this.searhField.val() != this.previousValue) {
      // for optimization to avoid multiple ajax calls
      clearTimeout(this.typingTimer);

      // reset timer
      if (this.searhField.val()) {
        //load spinner before results
        if (!this.isSpinnerVisible) {
          this.resultsDiv.html("<div class='spinner-loader'></div>");
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
      } else {
        this.resultsDiv.html("");
        this.isSpinnerVisible = false;
        return;
      }
    }

    this.previousValue = this.searhField.val();
  }

  getResults() {
    this.resultsDiv.html("<h2>Search Results</h2>");
    this.isSpinnerVisible = false;
  }

  keyPressDispatcher(e) {
    if (e.keyCode == 83 && !this.searchOverlayOpen && !$("input, textarea").is(":focus")) {
      this.openOverlay();
    }
    if (e.keyCode == 27 && this.searchOverlayOpen) {
      this.closeOverlay();
    }
  }

  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    $("body").addClass("body-no-scroll");
    this.searchOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $("body").removeClass("body-no-scroll");
    this.searchOverlayOpen = false;
  }
}

export default Search;
