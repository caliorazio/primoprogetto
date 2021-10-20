import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {

  Lista: string[] = ["1 List", "2 List", "3 List"];

  constructor() { }

  ngOnInit(): void {
  }

}
