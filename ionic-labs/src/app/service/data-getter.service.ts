import { Injectable } from '@angular/core';
import {Observable, of} from 'rxjs';

export  interface FishAquarium
{
  numb: number;
  size: number;
  form: string;
  isBackLight: boolean;
  fishs: Fish[];
}
export interface Fish {

  nameType: string;
  amount: number;
}

@Injectable({
  providedIn: 'root'
})

export class DataGetterService {
  private aquariums: FishAquarium[]=[
    {
      numb:1,
      size:244,
      form:`square`,
      isBackLight:true,
      fishs:[
        {
          nameType: 'Shark',
          amount:1,
        },
        {
          nameType: 'Salmon',
          amount:12,
        },
      ]

    },
    {
      numb:2,
      size:344,
      form:`square`,
      isBackLight:false,
      fishs:[{
        nameType:'Fuga',
        amount: 2,
      },
        {
          nameType: 'Clown Fish',
          amount:12,
        },
        {
          nameType: 'Stingray',
          amount:1,
        },
      ]
    }
  ];
  private  userName='';
  private users=[
    'Kripochek123','Alex','Younger','Saper'
  ];
  constructor() { }
  getAquariums(): Observable<FishAquarium[]>{
    return of(this.aquariums);
  }
  addAquarium(aquarium: FishAquarium){
    this.aquariums.push(aquarium);
  }
  deleteAquarium(index){
    this.aquariums.splice(index,1);
  }
  getUser(){
    return this.userName;
  }
  setUser(name: string){
    this.userName=name;
  }
  userExists(name: string): boolean{
    return this.users.indexOf(name) !== 1;
  }
  getFishs(numb: number): Fish[]{
    return this.aquariums[numb-1].fishs;
  }
  addFish(fish: Fish,numb: number){
    this.aquariums[numb-1].fishs.push(fish);
  }
  deleteFish(index,numb: number){
    this.aquariums[numb-1].fishs.splice(index,1);
  }
}
