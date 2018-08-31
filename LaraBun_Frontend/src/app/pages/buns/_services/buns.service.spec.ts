import { TestBed, inject } from '@angular/core/testing';
import { HttpClientModule } from '@angular/common/http';

// App imports
import { BunsService } from './buns.service';
import { HttpErrorHandler } from '../../../shared/_services/http-handle-error.service';

describe('BunsService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [
        HttpClientModule
      ],
      providers: [
        BunsService,
        HttpErrorHandler
      ]
    });
  });

  it('should be created', inject([BunsService], (service: BunsService) => {
    expect(service).toBeTruthy();
  }));
});
