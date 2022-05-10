import {Component, Input, OnInit, Output,EventEmitter} from '@angular/core';
import {AquariumDataService} from "../services/aquarium-data.service";

@Component({
  selector: 'app-aquarium',
  templateUrl: './aquarium.component.html',
  styles: [
  ]
})
export class AquariumComponent implements OnInit {

  @Input() aquarium:any;
  @Input() numberOfAquarium!:number;
  @Output()removeAquarium=new EventEmitter();
  @Output()onFormEdit=new EventEmitter();
  showInfo=false;

  constructor(private aquariumDataService:AquariumDataService) {


  }

  curFishIndex=0;
  curFish:any;

  ngOnInit(): void {

  }

  changeForm(){
    this.onFormEdit.emit(new Date());
  }
  isOld(){
    return (+this.aquarium.number.toString()[0])>2;
  }
  delAquarium(){
    this.aquariumDataService.deleteAquarium(this.numberOfAquarium)
  }


}
