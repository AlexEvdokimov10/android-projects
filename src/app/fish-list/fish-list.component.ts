import { Component, OnInit } from '@angular/core';
import {AquariumsDataService} from "../services/aquariums-data.service";
import {ActivatedRoute} from "@angular/router";

@Component({
  selector: 'app-fish-list',
  templateUrl: './fish-list.component.html',
  styleUrls: ['./fish-list.component.scss']
})
export class FishListComponent implements OnInit {

  fishs!:any[];
  numberOfAquarium!:string;
  constructor(private aquariumService:AquariumsDataService,private activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this.activatedRoute.params.subscribe(
      params=>{
        this.numberOfAquarium=params['aquaId'];
        this.getFishs(this.numberOfAquarium);
      }
    );
  }
  getFishs(numb:string){
    const numbAqua=+numb;
    this.aquariumService.getAquariums(numbAqua).subscribe(
      (fishs)=>{
        this.fishs=fishs
      }
    )
  }

}
