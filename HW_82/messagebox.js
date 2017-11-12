var pcs = pcs || {};

pcs.messagebox = (function () {
    "use strict";

    var modalDiv;
    var left = 49.7;
    var top = 49;
    var Zindex = 1;
    var isModal = false;
    // var buttonsArray = [];

    function createElement(type) {
        return document.createElement(type);
    }

    var input = createElement("input");
    var modalLabel = createElement("label");
    modalLabel.innerHTML = 'Modal';
    var checkbox = createElement("input");
    checkbox.type = 'checkbox';
    var showButton = createElement("button");
    showButton.innerHTML = 'Show Message';
    document.body.appendChild(input);
    document.body.appendChild(modalLabel);
    document.body.appendChild(checkbox);
    document.body.appendChild(showButton);

    // function addCustomButtons(buttons) {
    //     Object.keys(buttons).forEach(function (key) {
    //         buttonsArray.push(buttons[key]);
    //         buttons[key].addEventListener('click', function () {
    //             console.log('button' + key + 'was pressed');
    //         });
    //     });
    // }

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
        messageDiv.style.height = '100px';
        messageDiv.style.border = '1px solid blue';
        messageDiv.style.position = 'absolute';
        messageDiv.style.marginLeft = '-200px';
        messageDiv.style.marginTop = '-50px';
        messageDiv.style.boxSizing = 'border-box';
        messageDiv.style.display = 'inline-block';
        if (isModal) {
            messageDiv.style.left = '50%';
            messageDiv.style.top = '50%';
            messageDiv.style.zIndex = (Zindex++) + '';
        } else {
            messageDiv.style.left = left + '%';
            messageDiv.style.top = top + '%';
            messageDiv.addEventListener('click', function () {
                messageDiv.style.zIndex = (Zindex++) + '';
            });
        }
        buttonDiv.style.position = 'absolute';
        buttonDiv.style.bottom = '6px';
        buttonDiv.style.textAlign = 'center';
        buttonDiv.style.width = '100%';
        buttonDiv.style.marginLeft = '-20px';

        okButton.addEventListener("click", function () {
            document.body.removeChild(messageDiv);
            messageDiv = null;
            if (isModal) {
                document.body.removeChild(modalDiv);
                isModal = false;
            } else {
                top--;
                left -= 0.3;
            }
        });
    }

    function makeModal() {
        modalDiv = createElement('div');
        modalDiv.style.height = '100%';
        modalDiv.style.width = '100%';
        modalDiv.style.position = 'absolute';
        modalDiv.style.zIndex = (Zindex++) + '';
        modalDiv.style.top = 0;
        modalDiv.style.backgroundColor = 'rgba(132, 132, 132, 0.67)';
    }

    showButton.addEventListener("click", function () {
        if (input.value) {
            if (checkbox.checked) {
                if (!modalDiv) {
                    makeModal();
                }
                document.body.appendChild(modalDiv);
                isModal = true;
            }
            if (!isModal) {
                top++;
                left += 0.3;
            }
            show(input.value);
            // input.value = '';
        }
    });



    return {
        // addCustomButtons: addCustomButtons,
        show: show
    };
}());