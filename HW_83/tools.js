var pcs = pcs || {};

pcs.tools = (function () {
    "use strict";

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(elem, property, value) {
        elem.style[property] = value;
    }

    return {
        wrap: function (id) {
            var elem = get(id);
            var display;
            return {
                setCss: function (property, value) {
                    setCss(elem, property, value);
                    return this;
                },
                pulsate: function () {
                    var fontSize = 31,
                        i = 1,
                        //that = this,
                        interval = setInterval(function () {
                            if (i <= 5 || i > 15) {
                                fontSize += 5;
                            } else {
                                fontSize -= 5;
                            }

                            //that.setCss("fontSize", fontSize + 'px');
                            setCss(elem, "fontSize", fontSize + 'px');

                            if (i++ === 17) {
                                clearInterval(interval);
                            }
                        }, 100);

                    return this;
                },
                click: function (callback) {
                    elem.addEventListener("click", callback);
                    return this;
                },
                hide: function () {
                    display = getComputedStyle(elem).getPropertyValue("display");
                    setCss(elem, "display", "none");
                    return this;
                },
                show: function () {
                    this.setCss("display", display);
                    return this;
                }
            };
        }
    };
}());