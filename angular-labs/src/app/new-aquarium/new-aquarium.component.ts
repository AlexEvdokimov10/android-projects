import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {AquariumDataService} from "../services/aquarium-data.service";
import {patchTsGetExpandoInitializer} from "@angular/compiler-cli/ngcc/src/packages/patch_ts_expando_initializer";

@Component({
  selector: 'app-new-aquarium',
  templateUrl: './new-aquarium.component.html',
  styleUrls: ['./new-aquarium.component.scss']
})
export class NewAquariumComponent implements OnInit {

  @Output() aquarium:any;
  @Input() numberOfAquarium!:number;
  @Output() addNewAquarium=new EventEmitter();

  showInfo = false;
  showForm=false;

  constructor(private aquariumDataService:AquariumDataService) {

  }

  ngOnInit(): void {
    this.aquarium={
      number:null,
      form:'',
      size:null,
      isBackLight:false,
      fishs:[]
    }
  }


  onSubmit(myForm:any){

    this.showForm=true;
    this.aquarium.number=this.numberOfAquarium;
  }
  addAquarium(){
    this.aquarium.number=this.numberOfAquarium
    this.addNewAquarium.emit(this.aquarium)
  }




}
