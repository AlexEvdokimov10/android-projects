import { Component } from '@angular/core';
import {DataGetterService, Fish, FishAquarium} from '../service/data-getter.service';
import {ActivatedRoute, Router} from "@angular/router";

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  userName: string;
  aquariums: FishAquarium[];
  showNew=false;
  showEdit=-1;
  extraData: string;
  fishs: Fish[];
  constructor(private dataGetter: DataGetterService,private router: Router, private route: ActivatedRoute) {
    this.extraData=this.route.snapshot.paramMap.get('from-data-sender');
    this.dataGetter.getAquariums().subscribe(
      (data)=>{
        this.aquariums=data;
      }
    );

    this.userName=this.dataGetter.getUser();
  }
  add(){
    this.showNew=true;
  }
  delete(index: number){
    this.dataGetter.deleteAquarium(index);
  }
  addAquarium(aquarium){
    this.dataGetter.addAquarium(aquarium);
    this.showNew=false;
  }
  sendData(){
    this.router.navigate(['/data-sender',{'extra-data':this.extraData}]);
  }

}
