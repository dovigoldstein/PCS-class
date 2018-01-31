import { Component, Input } from '@angular/core';
import { Person } from '../shared/person';
// import { Address } from '../shared/address';

@Component({
  selector: 'app-person',
  templateUrl: './person.component.html',
  styleUrls: ['./person.component.css']
})
export class PersonComponent {
  @Input()
  person: Person;
}
