import {Component, Input, OnInit, Output,EventEmitter} from '@angular/core';
import {AquariumDataService} from "../services/aquarium-data.service";

@Component({
  selector: 'app-aquarium-list',
  templateUrl: './aquarium-list.component.html',
  styleUrls: ['./aquarium-list.component.scss']
})
export class AquariumListComponent implements OnInit {

  aquariums!:any[];
  constructor(private aquariumService:AquariumDataService) {
    aquariumService.getAqua().subscribe((aquariums)=>this.aquariums=aquariums);
  }

  ngOnInit(): void {
  }
  addAquarium(aquarium:any){
    this.aquariumService.addAquarium(aquarium);
  }


}
