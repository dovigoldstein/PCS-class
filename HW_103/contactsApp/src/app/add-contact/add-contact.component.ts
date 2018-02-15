import { Component, OnInit } from '@angular/core';
import { NgForm } from "@angular/forms";
import { Contact } from '../shared/contact';
import { ContactsService } from '../shared/contacts.service';
import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'app-add-contact',
  templateUrl: './add-contact.component.html',
  styleUrls: ['./add-contact.component.css']
})
export class AddContactComponent implements OnInit {

  contact: Contact;
  sub: Subscription;

  addContact(form: NgForm) {
    console.log('hit');
    this.contact = {
      id: null,
      firstName: form.value.first,
      lastName: form.value.last,
      email: form.value.email,
      phone: form.value.phone
    };

    this.sub = this.ContactsService
      .addContact(this.contact)
      .subscribe(
      () => console.log("Successfully added contact"),
      err =>
        console.error("Something went wrong with adding the contact ", err),
      () => console.log("Completed adding the contact")
      );
  }



  constructor(private ContactsService: ContactsService) { }

  ngOnInit() {
  }
  ngOnDestroy() {
    if (this.sub) {
      this.sub.unsubscribe();
    }
  }

}
