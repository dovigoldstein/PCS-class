import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Contact } from './contact';
import { Observable } from 'rxjs/Observable';


const httpOptions = {
  headers: new HttpHeaders({
    "Content-Type": "application/json",
    Authorization: "my-auth-token",
    responseType: "text"
  })
};

@Injectable()
export class ContactsService {

  constructor(private httpClient: HttpClient) { }

  getContacts(): Observable<Contact[]> {
    return this.httpClient.get<Contact[]>('http://localhost:80/school_stuff/homework/HW_103/php/contacts.php');
  }


  addContact(contact: Contact): Observable<Contact> {
    console.log("made it to service", contact);
    return this.httpClient.post<Contact>(
      'http://localhost:80/school_stuff/homework/HW_103/php/addContact.php',
      contact
    );
  }
}
