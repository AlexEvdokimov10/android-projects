import { Component, OnInit } from '@angular/core';
import {AquariumsDataService} from "../services/aquariums-data.service";
import {ActivatedRoute} from "@angular/router";

@Component({
  selector: 'app-aquarium-list',
  templateUrl: './aquarium-list.component.html',
  styleUrls: ['./aquarium-list.component.scss']
})
export class AquariumListComponent implements OnInit {
  aquariums!:any[];
  constructor(private aquariumService:AquariumsDataService) {
    // @ts-ignore
    aquariumService.getAquariums().subscribe((aquariums)=>this.aquariums=aquariums);
  }

  ngOnInit(): void {
  }

}
