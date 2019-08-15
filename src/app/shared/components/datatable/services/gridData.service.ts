import { Injectable } from '@angular/core';
import { Subject, BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class GridDataService {
  public data: Subject<[]> = new Subject();

  constructor() { }

  setData(data) {
    this.data.next(data);
  }
}
