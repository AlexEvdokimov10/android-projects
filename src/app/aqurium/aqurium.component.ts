import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {AquariumsDataService} from "../services/aquariums-data.service";

@Component({
  selector: 'app-aqurium',
  templateUrl: './aqurium.component.html',
  styleUrls:['./aqurium.component.scss']
})
export class AquriumComponent implements OnInit {

  @Input() aquarium:any;
  @Input() aquIndex!:number;
  showInfo = false;

  constructor(private aquariumDataService:AquariumsDataService) {
  }

  ngOnInit(): void {

  }

  delAquarium(){
    this.aquariumDataService.deleteAquarium(this.aquIndex);
  }

}


