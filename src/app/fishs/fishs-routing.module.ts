import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FishsPage } from './fishs.page';

const routes: Routes = [
  {
    path: '',
    component: FishsPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FishsPageRoutingModule {}
