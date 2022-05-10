import { Injectable } from '@angular/core';
import {Observable, of} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class AquariumDataService {

  private aquariums=[
    {
      number:1,
      form:'square',
      size:130,
      isBackLight:true,
      fishs: [
        {
          nameOfType: 'Stingray',amount:1,numberOfAquarium:1
        }
      ]
    },
    {
      number:2,
      form:'circle',
      size:260,
      isBackLight:false,
      fishs:[{
        nameOfType:'Shark', amount:1
      }]
    },
  ]
 constructor() { }
  getAquariums():any{
    return this.aquariums;
  }
  getFishs(number:number):Observable<any[]>{
    return of(this.aquariums[number-1].fishs)
  }
  getAqua():Observable<any[]>{
    return of(this.aquariums)
  }
  addAquarium(aquarium:any){
    this.aquariums.push(aquarium)
  }
  deleteAquarium(index:number){
    this.aquariums.splice(index,1)
  }
  addFish(numberOfAquarium:number,fish:any){
    this.aquariums[numberOfAquarium].fishs.push(fish);
  }
  deleteFish(numberOfAquarium:number,index:number){
    this.aquariums[numberOfAquarium].fishs.splice(index,1)
  }
}
