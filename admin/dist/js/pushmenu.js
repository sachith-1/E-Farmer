var PushMenu = (function($) {
  /**
   * JQuery Pushmenu Plugin v2.03
   * ====================================================
   */
  var NAME = "PushMenu";
  var DATA_KEY = "lte.pushmenu";
  var EVENT_KEY = "." + DATA_KEY;
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var Event = {
    COLLAPSED: "collapsed" + EVENT_KEY,
    SHOWN: "shown" + EVENT_KEY
  };
  var Default = {
    autoCollapseSize: false,
    enableRemember: false,
    noTransitionAfterReload: true
  };
  var Selector = {
    TOGGLE_BUTTON: '[data-widget="pushmenu"]',
    SIDEBAR_MINI: ".sidebar-mini",
    SIDEBAR_COLLAPSED: ".sidebar-collapse",
    BODY: "body",
    OVERLAY: "#sidebar-overlay",
    WRAPPER: ".wrapper"
  };
  var ClassName = {
    SIDEBAR_OPEN: "sidebar-open", //change the body classes to sidebar-collapse when click the btn,and when again click the btn will change to sidebar-open
    COLLAPSED: "sidebar-collapse",
    OPEN: "sidebar-open"
  };
  /**
   * Class Definition
   * ====================================================
   */

  var PushMenu =
    /*#__PURE__*/
    (function() {
      function PushMenu(element, options) {
        this._element = element;
        this._options = $.extend({}, Default, options);

        if (
          !$(Selector.BODY).hasClass(ClassName.COLLAPSED) &&
          !$(Selector.BODY).hasClass(ClassName.OPEN)
        ) {
          $(Selector.BODY).addClass(ClassName.OPEN);
        }

        if (!$(Selector.OVERLAY).length) {
          this._addOverlay();
        }

        this._init();
      } // Public

      var _proto = PushMenu.prototype;

      _proto.show = function show() {
        $(Selector.BODY)
          .addClass(ClassName.OPEN)
          .removeClass(ClassName.COLLAPSED);

        if (this._options.enableRemember) {
          localStorage.setItem("remember" + EVENT_KEY, ClassName.OPEN);
        }

        var shownEvent = $.Event(Event.SHOWN);
        $(this._element).trigger(shownEvent);
      };

      _proto.collapse = function collapse() {
        $(Selector.BODY)
          .removeClass(ClassName.OPEN)
          .addClass(ClassName.COLLAPSED);

        if (this._options.enableRemember) {
          localStorage.setItem("remember" + EVENT_KEY, ClassName.COLLAPSED);
        }

        var collapsedEvent = $.Event(Event.COLLAPSED);
        $(this._element).trigger(collapsedEvent);
      };

      _proto.toggle = function toggle() {
        if ($(Selector.BODY).hasClass(ClassName.OPEN)) {
          this.collapse();
        } else {
          this.show();
        }
      };

      _proto.autoCollapse = function autoCollapse() {
        if (this._options.autoCollapseSize) {
          if ($(window).width() <= this._options.autoCollapseSize) {
            if ($(Selector.BODY).hasClass(ClassName.OPEN)) {
              this.toggle();
            }
          } else {
            if (!$(Selector.BODY).hasClass(ClassName.OPEN)) {
              this.toggle();
            }
          }
        }
      };

      _proto.remember = function remember() {
        if (this._options.enableRemember) {
          var toggleState = localStorage.getItem("remember" + EVENT_KEY);

          if (toggleState == ClassName.COLLAPSED) {
            if (this._options.noTransitionAfterReload) {
              $("body")
                .addClass("hold-transition")
                .addClass(ClassName.COLLAPSED)
                .delay(50)
                .queue(function() {
                  $(this).removeClass("hold-transition");
                  $(this).dequeue();
                });
            } else {
              $("body").addClass(ClassName.COLLAPSED);
            }
          } else {
            if (this._options.noTransitionAfterReload) {
              $("body")
                .addClass("hold-transition")
                .removeClass(ClassName.COLLAPSED)
                .delay(50)
                .queue(function() {
                  $(this).removeClass("hold-transition");
                  $(this).dequeue();
                });
            } else {
              $("body").removeClass(ClassName.COLLAPSED);
            }
          }
        }
      }; // Private

      _proto._init = function _init() {
        var _this = this;

        this.remember();
        this.autoCollapse();
        $(window).resize(function() {
          _this.autoCollapse();
        });
      };

      _proto._addOverlay = function _addOverlay() {
        var _this2 = this;

        var overlay = $("<div />", {
          id: "sidebar-overlay"
        });
        overlay.on("click", function() {
          _this2.collapse();
        });
        $(Selector.WRAPPER).append(overlay);
      }; // Static

      PushMenu._jQueryInterface = function _jQueryInterface(operation) {
        return this.each(function() {
          var data = $(this).data(DATA_KEY);

          var _options = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new PushMenu(this, _options);
            $(this).data(DATA_KEY, data);
          }

          if (operation === "toggle") {
            data[operation]();
          }
        });
      };

      return PushMenu;
    })();
  /**
   * Data API
   * ====================================================
   */

  $(document).on("click", Selector.TOGGLE_BUTTON, function(event) {
    event.preventDefault();
    var button = event.currentTarget;

    if ($(button).data("widget") !== "pushmenu") {
      button = $(button).closest(Selector.TOGGLE_BUTTON);
    }

    PushMenu._jQueryInterface.call($(button), "toggle");
  });
  $(window).on("load", function() {
    PushMenu._jQueryInterface.call($(Selector.TOGGLE_BUTTON));
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME] = PushMenu._jQueryInterface;
  $.fn[NAME].Constructor = PushMenu;

  $.fn[NAME].noConflict = function() {
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return PushMenu._jQueryInterface;
  };

  return PushMenu;
})(jQuery);

exports.PushMenu = PushMenu;
