import { Component } from '@angular/core';
import {AquariumDataService} from "./services/aquarium-data.service";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  aquariums!:any[];

  constructor(private aquariumDataService:AquariumDataService) {
  }
}
