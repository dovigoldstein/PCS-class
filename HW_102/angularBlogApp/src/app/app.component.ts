import { Component } from '@angular/core';
import { Blog } from './shared/blog';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';

  myBlogs: Blog[] = [
    {
      id: 1,
      name: 'Dovi Goldstein',
      website: 'dovigoldstein.com',
      company: 'Google',
      posts: [{ id: 1, title: 'Dovis Rant', body: 'lorem ipsum', comments: [{ id: 1, body: 'dont like it' }] }]
    },
    {
      id: 2,
      name: 'Abe Lincoln',
      website: 'freedom.com',
      company: 'IRS',
      posts: [{ id: 2, title: 'Gettysburgh Address', body: 'Four score....', comments: [{ id: 2, body: 'Awesome speech!' }] }]
    }
  ]
}
