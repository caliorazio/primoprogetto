import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import {DataService} from "../../service/data.service";
import { Post } from "../../post";

@Component({
  selector: 'app-post-edit',
  templateUrl: './post-edit.component.html',
  styleUrls: ['./post-edit.component.css']
})
export class PostEditComponent implements OnInit {
id: any;
data: any;
  posts: any;
  post = new Post();
  constructor(private route:ActivatedRoute, private dataService: DataService) { }

  ngOnInit(): void {

    /*
    console.log(this.route.snapshot.params.id);
*/
    this.id = this.route.snapshot.params.id;
    this.getData();

  }

  getData(){
   this.dataService.getPostById(this.id).subscribe(res => {
     /*console.log(res); */
     this.data = res;
     this.post = this.data;
   })

  }

  updatePost(){
    this.dataService.updateData(this.id, this.post).subscribe((res: any) => {
       this.data = res;
       this.post = this.data;



    });
  }

}

