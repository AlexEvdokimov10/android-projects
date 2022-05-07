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

  numb: number  ;

  fishs: Fish[];
  showNew=false;
  showEdit=-1;
  constructor(private dataGetter: DataGetterService,private route: ActivatedRoute) {

  }

  ngOnInit() {
    this.numb =+ this.route.snapshot.paramMap.get('numb');
    this.getFishs();
  }
  add(){
    this.showNew=true;
  }
  delete(index: number){
    this.dataGetter.deleteFish(index,this.numb);
    this.getFishs();
  }
  addFish(fish){
    this.dataGetter.addFish(fish,this.numb);
    this.showNew=false;
    this.getFishs();

  }
  getFishs(){
    of(this.dataGetter.getFishs(this.numb)).subscribe(data => {
      this.fishs = data;
    });
  }

}
