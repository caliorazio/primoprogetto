import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from "@angular/forms";
import {DataService} from "../service/data.service";
import {Router} from "@angular/router";
import {ToastrService} from "ngx-toastr";


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
form!:FormGroup;
submitted=false;
data:any;
token:any;

  constructor(private dataService:DataService, private formBuilder:FormBuilder, private router:Router, private toastr:ToastrService) { }

  loginForm(){
    this.form = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
    });
  }



  ngOnInit(): void {
this.loginForm();

  }


  get f() {
return this.form.controls;
  }

  submit() {
    this.submitted = true;
    if (this.form.invalid) {
      return;
    }
    this.dataService.login(this.form.value).subscribe(res => {
      this.data = res;
      if(this.data.status === 1) {
        this.token = this.data.data.token;
        localStorage.setItem('token', this.token);
        this.router.navigate(['/edit']);
        this.toastr.success(JSON.stringify(this.data.message), JSON.stringify(this.data.code),
          {
            timeOut:2000,
            progressBar: true
          });

      } else if(this.data.status === 0){
        this.toastr.error(JSON.stringify(this.data.message), JSON.stringify(this.data.code),
          {
            timeOut:2000,
            progressBar: true
          });
      }
    });
  }
}

