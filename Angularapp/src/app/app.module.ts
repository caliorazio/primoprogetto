import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PostsComponent } from './components/posts/posts.component';
import { HomeComponent } from './home/home.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { HttpClientModule } from '@angular/common/http';
import { PostEditComponent } from './components/post-edit/post-edit.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {MatTableModule} from "@angular/material/table";
import {MatInputModule} from "@angular/material/input";
import {MatButtonModule} from '@angular/material/button';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import {AuthGuard} from "./auth.data";
import {ToastrModule} from "ngx-toastr";

const routes: Routes = [
  { path: '', component:LoginComponent,
  canActivate: [AuthGuard] },

  { path: 'edit/:id', component:PostEditComponent },
  { path: 'login', component:LoginComponent},
  { path: 'register', component:RegisterComponent}
];


@NgModule({
  declarations: [
    AppComponent,
    PostsComponent,
    HomeComponent,
    SidebarComponent,
    PostEditComponent,
    LoginComponent,
    RegisterComponent,


  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(routes),
    AppRoutingModule,
    BrowserAnimationsModule,
    MatTableModule,
    MatInputModule,
    MatButtonModule,
    FormsModule,
    ReactiveFormsModule,
    ToastrModule.forRoot(),
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
