/*global $, pcs */
(function () {
    "use strict";

    var contactTable = $("#contactTable tbody"),
        selectedRow,
        contacts = [],
        addFirstInput = $("#addFirst"),
        addLastInput = $("#addLast"),
        addEmailInput = $("#addEmail"),
        addPhoneInput = $("#addPhone"),
        updateId = $("#updateId"),
        updateFirstInput = $("#updateFirst"),
        updateLastInput = $("#updateLast"),
        updateEmailInput = $("#updateEmail"),
        updatePhoneInput = $("#updatePhone"),
        selectedFirst,
        selectedLast,
        selectedEmail,
        selectedPhone,
        addContactForm = $("#addContactForm"),
        updateContactForm = $("#updateContactForm");

    function addContact(contact) {
        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.empty();
        }

        var theRow = $('<tr>' +
            '<td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '<td class="noEdit"><button id="delete">delete</button><button id="edit">edit</button></td>' +
            '</tr>'
        ).appendTo(contactTable);
        theRow.find('#delete')
            .click(function () {
                $.post("deleteContact.php", { id: contact.id }, function () {
                    theRow.remove();
                }).fail(function (jqxhr) {
                    pcs.messagebox.show("Error: " + jqxhr.responseText);
                });
            });
        theRow.find('#edit')
            .click(function () {
                selectedRow = $(this).closest('tr');
                updateId.val(contact.id);
                updateFirstInput.val(contact.firstName);
                updateLastInput.val(contact.lastName);
                updateEmailInput.val(contact.email);
                updatePhoneInput.val(contact.phone);
                selectedFirst = contact.firstName;
                selectedLast = contact.lastName;
                selectedEmail = contact.email;
                selectedPhone = contact.phone;
                updateContactForm.slideDown();
            });
    }

    function getContacts() {
        $.getJSON('contacts.php?callback=?', { method: 'jsonpCallback' }, function (loadedContacts) {
            loadedContacts.forEach(addContact);
        }).fail(function (xhr, statusCode, statusText) {
            console.log(xhr, statusCode, statusText);
        });
    }

    function hideAddContactForm(contactForm) {
        contactForm.slideUp();
        contactForm[0].reset();
    }

    addContactForm.on("submit", function (event) {
        var newContact = {
            firstName: addFirstInput.val(),
            lastName: addLastInput.val(),
            email: addEmailInput.val(),
            phone: addPhoneInput.val()
        };
        $.post("addContact.php", newContact, function (contactId) {
            newContact.id = JSON.parse(contactId);
            addContact(newContact);
            hideAddContactForm(addContactForm);
        }).fail(function (jqxhr) {
            pcs.messagebox.show("Error: " + jqxhr.responseText);
        });

        event.preventDefault();
    });

    updateContactForm.on("submit", function (event) {
        if (updateLastInput.val() &&
            (updateFirstInput.val() !== selectedFirst ||
                updateLastInput.val() !== selectedLast ||
                updateEmailInput.val() !== selectedEmail ||
                updatePhoneInput.val() !== selectedPhone)) {
            var updatedContact = {
                id: updateId.val(),
                firstName: updateFirstInput.val(),
                lastName: updateLastInput.val(),
                email: updateEmailInput.val(),
                phone: updatePhoneInput.val()
            };
            $.post("updateContact.php", updatedContact, function () {
                selectedRow.children(':not(.noEdit)').remove();
                selectedRow.prepend('<td>' + updatedContact.firstName + '</td>' +
                    '<td>' + updatedContact.lastName + '</td>' +
                    '<td>' + updatedContact.email + '</td>' +
                    '<td>' + updatedContact.phone + '</td>');
                hideAddContactForm(updateContactForm);
            }).fail(function (jqxhr) {
                pcs.messagebox.show("Error: " + jqxhr.responseText);
            });

        } else {
            hideAddContactForm(updateContactForm);
            pcs.messagebox.show("No changes were made");
        }
        event.preventDefault();
    });

    $("#cancelAdd").click(function () {
        hideAddContactForm(addContactForm);
    });

    $("#cancelUpdate").click(function () {
        hideAddContactForm(updateContactForm);
    });

    $("#add").click(function () {
        addContactForm.slideDown();
    });

    getContacts();
}());