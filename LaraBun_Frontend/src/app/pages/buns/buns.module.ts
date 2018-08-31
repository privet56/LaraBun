import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';


import { BunsRoutingModule } from './buns-routing.module';
import { BunsComponent } from './buns.component';
import { BunDetailComponent } from './bun-detail/bun-detail.component';
import { BunListComponent } from './bun-list/bun-list.component';
import { HttpClientModule } from '@angular/common/http';
import { BunSearchPipe } from './_pipes/bun-search.pipe';

@NgModule({
  imports: [
    CommonModule,
    BunsRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    NgbModule
  ],
  declarations: [BunsComponent, BunDetailComponent, BunListComponent, BunSearchPipe]
})
export class BunsModule { }
