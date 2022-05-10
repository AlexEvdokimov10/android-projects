import { Component, OnInit } from '@angular/core';
import {AquariumDataService} from "../services/aquarium-data.service";
import {ActivatedRoute} from "@angular/router";

@Component({
  selector: 'app-fish-list',
  templateUrl: './fish-list.component.html',
  styleUrls: ['./fish-list.component.scss']
})
export class FishListComponent implements OnInit {

  fishs!:any[];
  numberOfAquarium!:string;
  constructor(private aquariumService:AquariumDataService,private activatedRoute:ActivatedRoute) {
    this.activatedRoute.params.subscribe(
      params=>{
        this.numberOfAquarium=params['numberOfAquarium'];
        this.getFishs(this.numberOfAquarium);
      }
    );
  }

  ngOnInit(): void {

  }
  getFishs(numb:string){
    const numberOfAquarium=+numb;
    this.aquariumService.getFishs(numberOfAquarium).subscribe((fishs)=>{this.fishs=fishs});

  }

}
