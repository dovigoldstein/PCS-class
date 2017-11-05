(function () {
    "use strict";

    var contactTable = get("contactTable");
    function get(id) {
        return document.getElementById(id);
    }

    function addContact() {
        var contact = {
            firstName: get('firstName').value,
            lastName: get('lastName').value,
            email: get('email').value,
            phone: get('phone').value
        };

        if (document.getElementById("contactTable").rows[1].innerHTML.trim() === "<td>No contacts</td>") {
            contactTable.deleteRow(1);
        }
        var row = contactTable.insertRow();

        Object.keys(contact).forEach(function (key) {
            var theCell = row.insertCell();
            theCell.innerHTML = contact[key];
            get(key).value = '';
        });
    }

    get("add").addEventListener("click", addContact);
}());