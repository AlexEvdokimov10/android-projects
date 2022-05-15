import { Component, OnInit } from '@angular/core';
import {DataGetterService, Fish} from '../service/data-getter.service';
import {ActivatedRoute} from '@angular/router';
import {of} from "rxjs";

@Component({
  selector: 'app-fishs',
  templateUrl: './fishs.page.html',
  styleUrls: ['./fishs.page.scss'],
})
export class FishsPage implements OnInit {

  id: number;
  numb: number;

  fishs: Fish[];
  showNew = false;
  showEdit = -1;

  constructor(private dataGetter: DataGetterService, private route: ActivatedRoute) {
    this.id = +this.route.snapshot.paramMap.get('id');
    this.numb = +this.route.snapshot.paramMap.get('numb');
    this.dataGetter.getFishs(this.numb).subscribe(
      (data)=>{
        this.fishs=data;
      }
    );
  }

  ngOnInit() {

  }

  add() {
    this.showNew = true;
  }

  delete(fish) {
    this.dataGetter.deleteFish(fish).subscribe(
      res => {
        this.dataGetter.getFishs(this.numb).subscribe(
          (data) => {
            this.fishs = data;
          }
        );
      }
    );
  }

  addFish(fish) {
    this.dataGetter.addFish(fish).subscribe(
      res => {
        this.dataGetter.getFishs(this.numb).subscribe(
          (data) => {
            this.fishs = data;
          }
        );
      }
    );
  }
}
