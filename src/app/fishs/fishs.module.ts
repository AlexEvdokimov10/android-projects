import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FishsPageRoutingModule } from './fishs-routing.module';

import { FishsPage } from './fishs.page';
import {FishNewComponent} from "../components/fish-new/fish-new.component";

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FishsPageRoutingModule
  ],
    declarations: [FishsPage, FishNewComponent]
})
export class FishsPageModule {}
