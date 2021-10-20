import { Component, OnInit } from '@angular/core';
import { DataService } from "src/app/service/data.service";
import { Post } from "../../post";

@Component({
  selector: 'app-posts',
  templateUrl: './posts.component.html',
  styleUrls: ['./posts.component.css']
})
export class PostsComponent implements OnInit {
  posts: any;
  post = new Post();
  displayedColumns: string[] = ['position', 'name', 'weight', ];
  filtro: string="";





  constructor(private dataService:DataService) {

  }


  ngOnInit(): void {
    this.getPostData();


  }

getPostData() {

  this.dataService.getData(this.filtro).subscribe(res => {
  console.log(res);

    this.posts = res;

  });


}


    insertData() {
      this.dataService.insertData(this.post).subscribe(res => {
        this.getPostData();
      })

    }


  deleteData(id: any) {
   this.dataService.deleteData(id).subscribe(res => {
     this.getPostData();
   })
  }


  applyFilter(filterValue: any) {
    this.filtro = filterValue;
this.getPostData();
}
}

