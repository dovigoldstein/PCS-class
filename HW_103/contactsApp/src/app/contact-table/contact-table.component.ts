import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Contact } from '../shared/contact';
import { ContactsService } from '../shared/contacts.service';

@Component({
  selector: 'app-contact-table',
  templateUrl: './contact-table.component.html',
  styleUrls: ['./contact-table.component.css']
})
export class ContactTableComponent implements OnInit {

  public contacts: Observable<Contact[]>;

  constructor(private ContactsService: ContactsService) { }

  ngOnInit() {
    this.contacts = this.ContactsService.getContacts();
  }

}
