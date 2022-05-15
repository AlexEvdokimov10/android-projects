import { Injectable } from '@angular/core';
import {Observable, of} from 'rxjs';
import {HttpClient} from "@angular/common/http";

export  interface FishAquarium
{
  id: number;
  numb: number;
  size: number;
  form: string;
  isBackLight: boolean;
}
export interface Fish {
  id: number;
  nameOfType: string;
  amount: number;
  // eslint-disable-next-line @typescript-eslint/naming-convention
  aquarium_id: number;
}

@Injectable({
  providedIn: 'root'
})

export class DataGetterService {
  baseUrl='http://localhost/api/';

  private token='';

  private aquariums=[];
  private fishs=[];
  private  userName='';
  constructor(private http: HttpClient) { }
  getAquariums(){
    return this.http.get<any>(this.baseUrl+'?action=get-aquariums&token='+this.token);
  }
  addAquarium(aquarium){
    return  this.http.post<any>(
      this.baseUrl+'?action=add-aquarium&token='+this.token,aquarium
    );
  }
  deleteAquarium(aquarium){
    return this.http.post<any>(
      this.baseUrl+'?action=del-aquarium&token='+this.token,aquarium
    );
  }
  editAquarium(aquarium){
    return this.http.post<any>(
      this.baseUrl + '?action=edit-aquarium&token='+this.token,
      aquarium
    );
  }

  checkUser(user){
    return this.http.post<any>(this.baseUrl+'?action=login',user);
  }
  getUser(){
    return this.userName;
  }
  setUser(name: string){
    this.userName=name;
  }
  setToken(token: string){
    this.token=token;
  }


  getFishs(id: number){
    return this.http.get<any>(
      this.baseUrl+`?action=get-fishs&aquarium=${id}`+`&token=${this.token}`
    );
  }
  addFish(fish){
    return this.http.post<any>(
      this.baseUrl + '?action=add-fish&token='+this.token,fish
    );
  }
  deleteFish(fish){
    return this.http.post<any>(
      this.baseUrl+'?action=del-fish&token='+this.token,fish
    );
  }
  editFish(fish){
    return this.http.post<any>(
      this.baseUrl + '?action=edit-fish&token='+this.token,
      fish
    );
  }
}
