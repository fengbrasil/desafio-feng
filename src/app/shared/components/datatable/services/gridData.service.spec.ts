/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { GridDataService } from './gridData.service';

describe('Service: GridData', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [GridDataService]
    });
  });

  it('should ...', inject([GridDataService], (service: GridDataService) => {
    expect(service).toBeTruthy();
  }));
});
