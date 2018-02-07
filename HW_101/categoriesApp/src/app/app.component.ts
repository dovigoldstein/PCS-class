import { Component, Input } from '@angular/core';
import { Category } from './shared/category';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  selectedCategory: Category;

  categories: Category[] = [{
    name: 'fruit',
    items: [
      { name: 'apples', price: 2.9 },
      { name: 'pears', price: 2.25 },
      { name: 'oranges', price: 3.5 }
    ]
  },
  {
    name: 'vegetables',
    items: [
      { name: 'cucumbers', price: 1.75 },
      { name: 'tomatoes', price: 3.99 },
      { name: 'peppers', price: 2.25 }
    ]
  },
  {
    name: 'computers'
  }
  ];
}
