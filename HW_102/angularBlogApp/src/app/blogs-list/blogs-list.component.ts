import { Component, OnInit, Input } from '@angular/core';
import { Blog } from '../shared/blog';

@Component({
  selector: 'app-blogs-list',
  templateUrl: './blogs-list.component.html',
  styleUrls: ['./blogs-list.component.css']
})
export class BlogsListComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  @Input()
  blogs: Blog[];

  selectedBlog: Blog;

  getPosts(blog: Blog) {
    this.selectedBlog = blog;
  }

}
