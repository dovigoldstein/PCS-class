import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ContactTableComponent } from './contact-table/contact-table.component';
import { AddContactComponent } from './add-contact/add-contact.component';

const routes: Routes = [
  {
    path: '',
    pathMatch: 'full',
    redirectTo: 'contact-table'
  },
  {
    path: 'contact-table',
    component: ContactTableComponent,
  },
  {
    path: 'add-contact',
    component: AddContactComponent,
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
