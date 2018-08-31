
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from '../auth/_guards/auth.guard';

// Buns Routes Imports
import { BunDetailComponent } from './bun-detail/bun-detail.component';
import { BunListComponent } from './bun-list/bun-list.component';

const routes: Routes = [
  {
    path: 'buns',
    children: [
      {
        path: '',
        component: BunListComponent
      },
      {
        path: ':id',
        component: BunDetailComponent,
        canActivate: [AuthGuard]
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BunsRoutingModule { }
