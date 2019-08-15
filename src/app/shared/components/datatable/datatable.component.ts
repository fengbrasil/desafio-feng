import { Component, OnInit, Input } from '@angular/core';
import { GridDataResult, DataStateChangeEvent, PageChangeEvent } from '@progress/kendo-angular-grid';
import { process, State } from '@progress/kendo-data-query';

@Component({
  selector: 'app-datatable',
  templateUrl: './datatable.component.html',
  styleUrls: ['./datatable.component.css']
})
export class DataTableComponent implements OnInit {
  @Input() data: GridDataResult;
  @Input() dataRes: any[] = [];

  // Recebe o formato do cabeçalho da grid, como nome, width, filtrable ou se é hidden.
  @Input() gridSchema = [];

  // Mostrar filtros ou não.
  @Input() showFilter: boolean;


  state: State = {
    skip: 0,
    take: 10,
  };

  constructor() { }

  ngOnInit() {
    console.log(this.data);
  }

  dataStateChange(state: DataStateChangeEvent): void {
    this.state = state;
    this.data = process(this.dataRes, this.state);
  }

  paginarGrid(evento: PageChangeEvent) {
    this.state.skip = evento.skip;
    this.state.take = evento.take;

    this.data = process(this.dataRes, this.state);
  }
}
