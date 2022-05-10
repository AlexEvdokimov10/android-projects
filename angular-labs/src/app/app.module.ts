import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { AquariumComponent } from './aquarium/aquarium.component';
import { AquariumListComponent } from './aquarium-list/aquarium-list.component';
import { FishListComponent } from './fish-list/fish-list.component';
import { NewAquariumComponent } from './new-aquarium/new-aquarium.component';
import {FormsModule} from "@angular/forms";
import {RouterModule, Routes} from "@angular/router";
const routes:Routes=[
  {
    path:'aquariums',component:AquariumListComponent
  },
  {
    path:"fishs/:numberOfAquarium",component:FishListComponent
  },
  {
    path:'',redirectTo:'aquariums',pathMatch:'full'
  }
]
@NgModule({
  declarations: [
    AppComponent,
    AquariumComponent,
    AquariumListComponent,
    FishListComponent,
    NewAquariumComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    RouterModule.forRoot(routes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
