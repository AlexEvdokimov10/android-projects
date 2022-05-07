import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import {AuthGuard} from './guards/auth.guard';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule),
    canActivate:[AuthGuard]
  },
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full'
  },
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'fishs',
    loadChildren: () => import('./fishs/fishs.module').then( m => m.FishsPageModule)
  },
  {
    path :'fishs/:numb',
    loadChildren: ()=>import('./fishs/fishs.module').then(m=>m.FishsPageModule),
    canActivate:[AuthGuard]
  },
  {
    path: 'data-sender',
    loadChildren: () => import('./data-sender/data-sender.module').then( m => m.DataSenderPageModule)
  },

];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
