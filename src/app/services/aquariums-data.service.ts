import { Injectable } from '@angular/core';
import {Observable, of} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class AquariumsDataService {
  private aquariums=[
    {
      number:1,
      form:'square',
      size:130,
      isBackLight:true
    },
    {
      number:2,
      form:'circle',
      size:260,
      isBackLight:false
    },
  ]
  private fishs=[
    {
      nameOfType:'Shark', amount:1,numberOfAquarium:5
    },
    {
      nameOfType: 'Clown Fish',amount: 4,numberOfAquarium:2
    },
    {
      nameOfType: 'Salmon',amount: 4,numberOfAquarium:1
    },
    {
      nameOfType: 'Fuga',amount: 6,numberOfAquarium:3
    },
    {
      nameOfType: 'Stingray',amount:1,numberOfAquarium:4
    }
  ]
  constructor() { }
  getAquariums(numberOfAquarium:number):Observable<any[]>{
    return of(this.fishs.filter(elem=>{
      return elem.numberOfAquarium==numberOfAquarium
    }));
  }
  addAquarium(aquarium:any){
    this.aquariums.push(aquarium)
  }
  deleteAquarium(index:number){
    this.aquariums.splice(index,1)

  }
}
