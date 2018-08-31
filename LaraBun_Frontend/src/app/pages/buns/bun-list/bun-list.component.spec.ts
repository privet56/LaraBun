import { RouterTestingModule } from '@angular/router/testing';
import { HttpClientModule } from '@angular/common/http';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { NO_ERRORS_SCHEMA } from '@angular/core';

// App imports
import { BunListComponent } from './bun-list.component';
import { BunSearchPipe } from '../_pipes/bun-search.pipe';
import { HttpErrorHandler } from './../../../shared/_services/http-handle-error.service';


describe('BunListComponent', () => {
  let component: BunListComponent;
  let fixture: ComponentFixture<BunListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      imports: [
        RouterTestingModule,
        HttpClientModule
      ],
      declarations: [
        BunListComponent,
        BunSearchPipe
      ],
      schemas: [NO_ERRORS_SCHEMA],
      providers: [HttpErrorHandler]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BunListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
