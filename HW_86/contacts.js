/*global $*/
(function () {
    "use strict";

    var contactTable = $("#contactTable tbody"),
        contacts = [];

    function addContact(contact) {
        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.empty();
        }

        contactTable.append(
            '<tr>' +
            '<td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '</tr>'

        );
    }

    var firstNameInput = $("#first");
    var lastNameInput = $("#last");
    var emailInput = $("#email");
    var phoneInput = $("#phone");
    var addContactForm = $("#addContactForm");

    function hideAddContactForm() {
        addContactForm.slideUp();
        addContactForm[0].reset();
    }

    addContactForm.on("submit", function (event) {
        var newContact = {
            firstName: firstNameInput.val(),
            lastName: lastNameInput.val(),
            email: emailInput.val(),
            phone: phoneInput.val()
        };
        addContact(newContact);
        hideAddContactForm();
        event.preventDefault();
    });

    $("#cancel").click(hideAddContactForm);

    $("#add").click(function () {
        addContactForm.slideDown();
    });

    $('#loadFromJSON').click(function () {
        $.get('contacts.json', function (loadedContacts) {
            loadedContacts.forEach(function (element) {
                addContact(element);
            });
        }).fail(function (xhr, statusCode, statusText) {
            console.log(xhr, statusCode, statusText);
        });
    });
    $('#loadFromDB').click(function () {
        $.get('contacts.php', function (loadedContacts) {
            JSON.parse(loadedContacts).forEach(function (element) {
                addContact(element);
            });
        }).fail(function (xhr, statusCode, statusText) {
            console.log(xhr, statusCode, statusText);
        });
    });
}());