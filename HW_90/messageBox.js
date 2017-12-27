var pcs = pcs || {};

pcs.messagebox = (function () {
    "use strict";

    var modalDiv;

    function createElement(type) {
        return document.createElement(type);
    }

    function show(msg) {
        var messageDiv = createElement("div");
        var span = createElement("span");
        var buttonDiv = createElement("div");
        var okButton = createElement("button");

        span.innerHTML = msg;
        messageDiv.appendChild(span);
        okButton.innerHTML = "OK";
        buttonDiv.appendChild(okButton);
        messageDiv.appendChild(buttonDiv);
        document.body.appendChild(messageDiv);

        messageDiv.style.backgroundColor = 'lightblue';
        messageDiv.style.padding = '20px';
        messageDiv.style.width = '400px';
        messageDiv.style.height = '250px';
        messageDiv.style.border = '1px solid blue';
        messageDiv.style.position = 'fixed';
        messageDiv.style.marginLeft = '-200px';
        messageDiv.style.marginTop = '-50px';
        messageDiv.style.boxSizing = 'border-box';
        messageDiv.style.display = 'inline-block';
        messageDiv.style.left = '50%';
        messageDiv.style.top = '50%';
        messageDiv.style.zIndex = '10001';
        buttonDiv.style.position = 'absolute';
        buttonDiv.style.bottom = '6px';
        buttonDiv.style.textAlign = 'center';
        buttonDiv.style.width = '100%';
        buttonDiv.style.marginLeft = '-20px';
        makeModal();

        okButton.addEventListener("click", function () {
            document.body.removeChild(messageDiv);
            messageDiv = null;
            document.body.removeChild(modalDiv);
        });
    }

    function makeModal() {
        modalDiv = createElement('div');
        modalDiv.style.height = '100%';
        modalDiv.style.width = '100%';
        modalDiv.style.position = 'absolute';
        modalDiv.style.zIndex = '10000';
        modalDiv.style.top = 0;
        modalDiv.style.backgroundColor = 'rgba(132, 132, 132, 0.67)';
        document.body.appendChild(modalDiv);
    }

    return {
        show: show
    };
}());