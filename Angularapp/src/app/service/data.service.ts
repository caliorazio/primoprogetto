import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


 @Injectable({
  providedIn: 'root'
})
export class DataService {

   constructor(private httpClient: HttpClient) {
   }

   getData(q: string) {

     return this.httpClient.get('http://127.0.0.1:8001/api/posted', { params: {q}}) ;

   }




   insertData(data: any) {
     return this.httpClient.post('http://127.0.0.1:8001/api/addPost', data);

   }



   getPostById(id:any) {
     return this.httpClient.get('http://127.0.0.1:8001/api/post/' + id);

   }

   updateData(id:any, data:any) {
     return this.httpClient.put('http://127.0.0.1:8001/api/updatePost/' + id, data);

   }


   deleteData(id:any) {
     return this.httpClient.delete('http://127.0.0.1:8001/api/deletePost/' + id);

   }

   register(data:any ) {
     return this.httpClient.post('http://127.0.0.1:8001/api/register', + data);

   }

   login(data:any ) {
     return this.httpClient.post('http://127.0.0.1:8001/api/login', data);

   }
 }
